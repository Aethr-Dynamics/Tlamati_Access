import React, { useRef, useEffect } from 'react';
import {
  View,
  Text,
  Image,
  TouchableOpacity,
  StyleSheet,
  ScrollView,
  Animated,
  Alert,
} from 'react-native';
import { useRouter, useLocalSearchParams } from 'expo-router';
import { cerrarSesion } from '../services/autenticar';

const NAVY = '#1a2f5e';
const TEAL = '#2a9d8f';
const TEAL_LIGHT = '#e8f5f3';
const NAVY_LIGHT = '#eef1f8';

interface UserData {
  uid:          string;
  email:        string;
  nombre:       string;
  apMaterno:    string;
  apPaterno:    string;
  sede:         string;
  licenciatura: string;
  departamento: string;
  estado:       string;
  matricula:    string;
  foto:         string;
  tipo:         'estudiante' | 'profesor';
}

function InfoRow({
  label,
  value,
  icon,
  delay,
}: {
  label: string;
  value: string;
  icon: string;
  delay: number;
}) {
  const fadeAnim = useRef(new Animated.Value(0)).current;
  const slideAnim = useRef(new Animated.Value(20)).current;

  useEffect(() => {
    Animated.parallel([
      Animated.timing(fadeAnim, {
        toValue: 1,
        duration: 400,
        delay,
        useNativeDriver: true,
      }),
      Animated.timing(slideAnim, {
        toValue: 0,
        duration: 400,
        delay,
        useNativeDriver: true,
      }),
    ]).start();
  }, []);

  return (
    <Animated.View
      style={[
        styles.infoRow,
        { opacity: fadeAnim, transform: [{ translateY: slideAnim }] },
      ]}
    >
      <View style={styles.infoIconBox}>
        <Text style={styles.infoIcon}>{icon}</Text>
      </View>
      <View style={styles.infoTextBox}>
        <Text style={styles.infoLabel}>{label}</Text>
        <Text style={styles.infoValue}>{value}</Text>
      </View>
    </Animated.View>
  );
}

export default function PerfilScreen() {
  const router = useRouter();
  const params = useLocalSearchParams<{ user: string }>();

  const fadeAnim = useRef(new Animated.Value(0)).current;
  const scaleAnim = useRef(new Animated.Value(0.8)).current;

  let user: UserData | null = null;
  try {
    user = params.user ? JSON.parse(params.user) : null;
  } catch {
    user = null;
  }

  useEffect(() => {
    Animated.parallel([
      Animated.timing(fadeAnim, {
        toValue: 1,
        duration: 500,
        useNativeDriver: true,
      }),
      Animated.spring(scaleAnim, {
        toValue: 1,
        tension: 60,
        friction: 8,
        useNativeDriver: true,
      }),
    ]).start();
  }, []);

  if (!user) {
    return (
      <View style={styles.errorContainer}>
        <Text style={styles.errorText}>No se pudo cargar el perfil.</Text>
        <TouchableOpacity onPress={() => router.replace('/login')}>
          <Text style={styles.errorLink}>Volver al inicio</Text>
        </TouchableOpacity>
      </View>
    );
  }

  const nombreCompleto = `${user.nombre} ${user.apPaterno} ${user.apMaterno}`;

  const handleGenerarCodigo = () => {
    router.push({
      pathname: '/codigoAcceso',
      params: { user: JSON.stringify(user) },
    });
  };

  const handleLogout = () => {
    Alert.alert('Cerrar sesión', '¿Deseas cerrar tu sesión?', [
      { text: 'Cancelar', style: 'cancel' },
      {
        text: 'Cerrar sesión',
        style: 'destructive',
        onPress: async () => {
          await cerrarSesion();
          router.replace('/login');
        },
      },
    ]);
  };

  return (
    <ScrollView
      style={styles.container}
      contentContainerStyle={styles.scroll}
      showsVerticalScrollIndicator={false}
    >
      {/* Header con foto y nombre */}
      <Animated.View
        style={[
          styles.headerCard,
          { opacity: fadeAnim, transform: [{ scale: scaleAnim }] },
        ]}
      >
        {/* Fondo decorativo */}
        <View style={styles.headerBg} />
        <View style={styles.headerBgCircle} />

        {/* si no hay ofto en la bd usa el avatar */}
        <View style={styles.avatarWrapper}>
          <Image
            source={{ uri: user.foto || 'https://i.pravatar.cc/200?img=12' }}
            style={styles.avatar}
          />
        </View>

        <Text style={styles.nombreCompleto}>{nombreCompleto}</Text>
        <Text style={styles.emailText}>{user.email}</Text>

        {/* rol: muestra si es Estudiante o Profesor */}
        <View style={[
          styles.rolBadge,
          {
            backgroundColor: user.tipo === 'profesor' ? '#fff3e0' : TEAL_LIGHT,
            borderColor:      user.tipo === 'profesor' ? '#ff9800' : TEAL,
          }
        ]}>
          <Text style={[
            styles.rolBadgeText,
            { color: user.tipo === 'profesor' ? '#e65100' : TEAL }
          ]}>
            {user.tipo === 'profesor' ? '🧑‍🏫 Profesor' : '🎒 Estudiante'}
          </Text>
        </View>
      </Animated.View>

      {/* Información del usuario */}
      <View style={styles.infoCard}>
        <Text style={styles.sectionTitle}>Información personal</Text>

        <InfoRow label="Nombre"           value={user.nombre}    icon="👤" delay={100} />
        <InfoRow label="Apellido paterno" value={user.apPaterno} icon="👤" delay={150} />
        <InfoRow label="Apellido materno" value={user.apMaterno} icon="👤" delay={200} />

        <View style={styles.divider} />
        <Text style={styles.sectionTitle}>Institución</Text>

        <InfoRow label="Sede"    value={user.sede}   icon="🏛" delay={230} />
        <InfoRow
          label={user.tipo === 'profesor' ? 'Departamento' : 'Licenciatura'}
          value={user.tipo === 'profesor' ? user.departamento : user.licenciatura}
          icon="🎓"
          delay={280}
        />
        
        <InfoRow label="Estado"    value={user.estado}    icon="✅" delay={340} />
      </View>

      {/* Boton para generar codigo */}
      <TouchableOpacity
        style={styles.codeButton}
        onPress={handleGenerarCodigo}
        activeOpacity={0.85}
      >
        <Text style={styles.codeButtonIcon}>📲</Text>
        <Text style={styles.codeButtonText}>Generar código de acceso</Text>
      </TouchableOpacity>

      {/* Botón para cerrar la sesión */}
      <TouchableOpacity
        style={styles.logoutButton}
        onPress={handleLogout}
        activeOpacity={0.85}
      >
        <Text style={styles.logoutText}>Cerrar sesión</Text>
      </TouchableOpacity>

      <View style={{ height: 32 }} />
    </ScrollView>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#f5f7fb',
  },
  scroll: {
    paddingHorizontal: 20,
    paddingTop: 20,
    paddingBottom: 20,
  },
  errorContainer: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
    backgroundColor: '#ffffff',
  },
  errorText: {
    color: '#546e7a',
    fontSize: 16,
    marginBottom: 12,
  },
  errorLink: {
    color: TEAL,
    fontWeight: '700',
    fontSize: 15,
  },

  // Header card
  headerCard: {
    backgroundColor: '#ffffff',
    borderRadius: 24,
    paddingTop: 32,
    paddingBottom: 28,
    alignItems: 'center',
    marginBottom: 16,
    overflow: 'hidden',
    shadowColor: NAVY,
    shadowOffset: { width: 0, height: 4 },
    shadowOpacity: 0.1,
    shadowRadius: 16,
    elevation: 4,
  },
  headerBg: {
    position: 'absolute',
    top: 0,
    left: 0,
    right: 0,
    height: 90,
    backgroundColor: NAVY,
  },
  headerBgCircle: {
    position: 'absolute',
    top: -30,
    right: -30,
    width: 140,
    height: 140,
    borderRadius: 70,
    backgroundColor: TEAL,
    opacity: 0.25,
  },
  avatarWrapper: {
    position: 'relative',
    marginBottom: 12,
  },
  avatar: {
    width: 96,
    height: 96,
    borderRadius: 48,
    borderWidth: 4,
    borderColor: '#ffffff',
  },
  nombreCompleto: {
    fontSize: 22,
    fontWeight: '800',
    color: NAVY,
    textAlign: 'center',
    letterSpacing: -0.3,
    marginBottom: 4,
    paddingHorizontal: 20,
  },
  emailText: {
    fontSize: 13,
    color: '#90a4ae',
    marginBottom: 12,
  },
  rolBadge: {
    backgroundColor: TEAL_LIGHT,
    paddingHorizontal: 16,
    paddingVertical: 6,
    borderRadius: 20,
    borderWidth: 1.5,
    borderColor: TEAL,
    marginBottom: 8,
  },
  rolBadgeText: {
    color: TEAL,
    fontWeight: '700',
    fontSize: 13,
    letterSpacing: 0.3,
  },
  // Info card
  infoCard: {
    backgroundColor: '#ffffff',
    borderRadius: 20,
    padding: 20,
    marginBottom: 16,
    shadowColor: NAVY,
    shadowOffset: { width: 0, height: 2 },
    shadowOpacity: 0.07,
    shadowRadius: 10,
    elevation: 2,
  },
  sectionTitle: {
    fontSize: 12,
    fontWeight: '700',
    color: TEAL,
    textTransform: 'uppercase',
    letterSpacing: 1,
    marginBottom: 12,
    marginTop: 4,
  },
  divider: {
    height: 1,
    backgroundColor: '#eceff1',
    marginVertical: 16,
  },
  infoRow: {
    flexDirection: 'row',
    alignItems: 'center',
    marginBottom: 12,
  },
  infoIconBox: {
    width: 38,
    height: 38,
    borderRadius: 10,
    backgroundColor: NAVY_LIGHT,
    alignItems: 'center',
    justifyContent: 'center',
    marginRight: 12,
  },
  infoIcon: {
    fontSize: 18,
  },
  infoTextBox: {
    flex: 1,
  },
  infoLabel: {
    fontSize: 11,
    color: '#90a4ae',
    fontWeight: '600',
    textTransform: 'uppercase',
    letterSpacing: 0.5,
    marginBottom: 2,
  },
  infoValue: {
    fontSize: 14,
    color: NAVY,
    fontWeight: '600',
  },

  // Botones
  codeButton: {
    backgroundColor: NAVY,
    borderRadius: 18,
    height: 58,
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'center',
    marginBottom: 12,
    shadowColor: NAVY,
    shadowOffset: { width: 0, height: 6 },
    shadowOpacity: 0.3,
    shadowRadius: 12,
    elevation: 6,
    gap: 10,
  },
  codeButtonIcon: {
    fontSize: 20,
  },
  codeButtonText: {
    color: '#ffffff',
    fontSize: 16,
    fontWeight: '700',
    letterSpacing: 0.3,
  },
  logoutButton: {
    borderRadius: 18,
    height: 50,
    alignItems: 'center',
    justifyContent: 'center',
    borderWidth: 1.5,
    borderColor: '#dce3ec',
  },
  logoutText: {
    color: '#90a4ae',
    fontSize: 14,
    fontWeight: '600',
  },
});