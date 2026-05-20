import React, { useRef, useEffect, useState } from 'react';
import {
  View,
  Text,
  StyleSheet,
  Animated,
  TouchableOpacity,
} from 'react-native';
import { useRouter, useLocalSearchParams } from 'expo-router';
import QRCode from 'react-native-qrcode-svg';

const NAVY = '#1a2f5e';
const TEAL = '#2a9d8f';

// ─── Duración de cada ventana: 5 minutos ─────────────────────────────────────
const VENTANA_MS = 5 * 60 * 1000;

interface UserData {
  email:     string;
  matricula: string;
}

// Genera el token QR: matrícula (estática) + ventana de tiempo (dinámica)
// El lector solo necesita recalcular la ventana actual y comparar
function generarToken(matricula: string): string {
  const ventana = Math.floor(Date.now() / VENTANA_MS);
  return JSON.stringify({ matricula, ventana });
}

// Milisegundos hasta que cambia la ventana actual
function msHastaProximaVentana(): number {
  const ahora = Date.now();
  const ventanaActual = Math.floor(ahora / VENTANA_MS);
  return (ventanaActual + 1) * VENTANA_MS - ahora;
}

export default function CodigoAccesoScreen() {
  const router = useRouter();
  const params = useLocalSearchParams<{ user: string }>();

  let user: UserData | null = null;
  try {
    user = params.user ? JSON.parse(params.user) : null;
  } catch {
    user = null;
  }

  const matricula = user?.matricula ?? '';

  const [token, setToken]           = useState(() => generarToken(matricula));
  const [segundosRestantes, setSeg] = useState(() =>
    Math.ceil(msHastaProximaVentana() / 1000)
  );

  const fadeAnim = useRef(new Animated.Value(0)).current;

  // Tick cada segundo — actualiza countdown y rota token al expirar
  useEffect(() => {
    const interval = setInterval(() => {
      const ms   = msHastaProximaVentana();
      const secs = Math.ceil(ms / 1000);
      setSeg(secs);
      if (secs <= 1) {
        setToken(generarToken(matricula));
      }
    }, 1000);
    return () => clearInterval(interval);
  }, [matricula]);

  // Fade-in al montar
  useEffect(() => {
    Animated.timing(fadeAnim, {
      toValue: 1,
      duration: 500,
      useNativeDriver: true,
    }).start();
  }, []);

  const minutos = Math.floor(segundosRestantes / 60);
  const segundos = segundosRestantes % 60;
  const tiempoStr = `${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}`;

  const colorContador =
    segundosRestantes > 120 ? '#4caf50' :
    segundosRestantes > 60  ? '#ff9800' : '#f44336';

  const progreso = Math.min(segundosRestantes / (VENTANA_MS / 1000), 1);

  return (
    <View style={styles.container}>
      <Animated.View style={[styles.content, { opacity: fadeAnim }]}>

        <Text style={styles.title}>Código de acceso</Text>
        <Text style={styles.subtitle}>
          Presenta este QR en el lector de acceso
        </Text>

        {/* QR */}
        <View style={styles.qrCard}>
          <View style={[styles.corner, styles.cornerTL]} />
          <View style={[styles.corner, styles.cornerTR]} />
          <View style={[styles.corner, styles.cornerBL]} />
          <View style={[styles.corner, styles.cornerBR]} />
          <View style={styles.qrInner}>
            <QRCode
              value={token}
              size={220}
              color={NAVY}
              backgroundColor="#ffffff"
              quietZone={12}
            />
          </View>
        </View>

        {/* Countdown */}
        <View style={styles.countdownCard}>
          <Text style={styles.countdownLabel}>Expira en</Text>
          <Text style={[styles.countdownTime, { color: colorContador }]}>
            {tiempoStr}
          </Text>
          <View style={styles.progressBar}>
            <View
              style={[
                styles.progressFill,
                { width: `${progreso * 100}%`, backgroundColor: colorContador },
              ]}
            />
          </View>
          <Text style={styles.countdownHint}>
            Se genera un nuevo código automáticamente cada 5 minutos
          </Text>
        </View>

        <TouchableOpacity
          style={styles.backButton}
          onPress={() => router.back()}
          activeOpacity={0.85}
        >
          <Text style={styles.backButtonText}>← Volver al perfil</Text>
        </TouchableOpacity>

      </Animated.View>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#f5f7fb',
  },
  content: {
    flex: 1,
    paddingHorizontal: 28,
    paddingTop: 28,
    paddingBottom: 32,
    alignItems: 'center',
  },
  title: {
    fontSize: 26,
    fontWeight: '800',
    color: NAVY,
    letterSpacing: -0.5,
    marginBottom: 6,
    textAlign: 'center',
  },
  subtitle: {
    fontSize: 14,
    color: '#78909c',
    textAlign: 'center',
    marginBottom: 28,
    lineHeight: 20,
  },
  qrCard: {
    backgroundColor: '#ffffff',
    borderRadius: 28,
    padding: 28,
    alignItems: 'center',
    justifyContent: 'center',
    marginBottom: 20,
    shadowColor: NAVY,
    shadowOffset: { width: 0, height: 8 },
    shadowOpacity: 0.12,
    shadowRadius: 20,
    elevation: 8,
    position: 'relative',
  },
  corner: {
    position: 'absolute',
    width: 24,
    height: 24,
    borderColor: TEAL,
    borderWidth: 3,
  },
  cornerTL: { top: 14, left: 14, borderRightWidth: 0, borderBottomWidth: 0, borderTopLeftRadius: 6 },
  cornerTR: { top: 14, right: 14, borderLeftWidth: 0, borderBottomWidth: 0, borderTopRightRadius: 6 },
  cornerBL: { bottom: 14, left: 14, borderRightWidth: 0, borderTopWidth: 0, borderBottomLeftRadius: 6 },
  cornerBR: { bottom: 14, right: 14, borderLeftWidth: 0, borderTopWidth: 0, borderBottomRightRadius: 6 },
  qrInner: {
    padding: 8,
    backgroundColor: '#ffffff',
    borderRadius: 8,
  },
  countdownCard: {
    backgroundColor: '#ffffff',
    borderRadius: 20,
    padding: 20,
    width: '100%',
    alignItems: 'center',
    marginBottom: 16,
    shadowColor: NAVY,
    shadowOffset: { width: 0, height: 2 },
    shadowOpacity: 0.07,
    shadowRadius: 10,
    elevation: 2,
  },
  countdownLabel: {
    fontSize: 12,
    fontWeight: '700',
    color: '#90a4ae',
    textTransform: 'uppercase',
    letterSpacing: 1,
    marginBottom: 6,
  },
  countdownTime: {
    fontSize: 52,
    fontWeight: '800',
    letterSpacing: 4,
    marginBottom: 14,
  },
  progressBar: {
    width: '100%',
    height: 6,
    backgroundColor: '#eceff1',
    borderRadius: 3,
    overflow: 'hidden',
    marginBottom: 12,
  },
  progressFill: {
    height: '100%',
    borderRadius: 3,
  },
  countdownHint: {
    fontSize: 12,
    color: '#b0bec5',
    textAlign: 'center',
    lineHeight: 17,
  },
  backButton: {
    width: '100%',
    height: 50,
    alignItems: 'center',
    justifyContent: 'center',
    borderRadius: 16,
    borderWidth: 1.5,
    borderColor: '#dce3ec',
    backgroundColor: '#ffffff',
  },
  backButtonText: {
    color: '#78909c',
    fontSize: 14,
    fontWeight: '600',
  },
});