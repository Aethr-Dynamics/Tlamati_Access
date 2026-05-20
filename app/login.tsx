import React, { useState } from 'react';
import {
  View,
  Text,
  TextInput,
  Pressable,
  StyleSheet,
  Image,
  ActivityIndicator,
  Alert,
} from 'react-native';
import { useRouter } from 'expo-router';
import { login } from '../services/autenticar';

const NAVY = '#1a2f5e';
const TEAL = '#2a9d8f';
const TEAL_LIGHT = '#e8f5f3';

export default function LoginScreen() {
  const router = useRouter();
  const [email, setEmail]               = useState('');
  const [password, setPassword]         = useState('');
  const [loading, setLoading]           = useState(false);
  const [showPassword, setShowPassword] = useState(false);

  const handleLogin = async () => {
    if (!email || !password) {
      Alert.alert('Campos requeridos', 'Por favor ingresa tu email y contraseña.');
      return;
    }

    setLoading(true);
    try {
      const usuario = await login(email.trim().toLowerCase(), password);

      // Pasar los datos del usuario a la pantalla de perfil
      router.replace({
        pathname: '/perfil',
        params: { user: JSON.stringify(usuario) },
      });
    } catch (error: any) {
      // Traducir errores comunes de Firebase
      const msg = traducirError(error.code ?? error.message);
      Alert.alert('Error al iniciar sesión', msg);
    } finally {
      setLoading(false);
    }
  };

  return (
    <View style={styles.container}>

      <Image
        source={require('../assets/logo.png')}
        style={styles.logo}
        resizeMode="contain"
      />

      <Text style={styles.title}>Bienvenido</Text>
      <Text style={styles.subtitle}>Inicia sesión para continuar</Text>

      <View style={styles.card}>

        <Text style={styles.label}>Correo electrónico</Text>
        <TextInput
          style={styles.input}
          placeholder="ejemplo@correo.com"
          placeholderTextColor="#9db2bf"
          value={email}
          onChangeText={setEmail}
          keyboardType="email-address"
          autoCapitalize="none"
          autoCorrect={false}
          returnKeyType="next"
        />

        <Text style={styles.label}>Contraseña</Text>
        <View style={styles.passwordRow}>
          <TextInput
            style={[styles.input, styles.passwordInput]}
            placeholder="••••••••"
            placeholderTextColor="#9db2bf"
            value={password}
            onChangeText={setPassword}
            secureTextEntry={!showPassword}
            returnKeyType="done"
            onSubmitEditing={handleLogin}
          />
          <Pressable
            style={styles.eyeButton}
            onPress={() => setShowPassword(!showPassword)}
          >
            <Text style={styles.eyeText}>{showPassword ? '🙈' : '👁'}</Text>
          </Pressable>
        </View>

        <Pressable
          style={[styles.button, loading && { opacity: 0.7 }]}
          onPress={handleLogin}
          disabled={loading}
        >
          {loading
            ? <ActivityIndicator color="#fff" />
            : <Text style={styles.buttonText}>Iniciar sesión</Text>
          }
        </Pressable>

      </View>
    </View>
  );
}

// ─── Traduce códigos de error de Firebase al español ─────────────────────────
function traducirError(code: string): string {
  const errores: Record<string, string> = {
    'auth/user-not-found':        'No existe una cuenta con ese correo.',
    'auth/wrong-password':        'Contraseña incorrecta.',
    'auth/invalid-email':         'El formato del correo no es válido.',
    'auth/user-disabled':         'Esta cuenta ha sido deshabilitada.',
    'auth/too-many-requests':     'Demasiados intentos. Intenta más tarde.',
    'auth/network-request-failed':'Sin conexión a internet.',
    'auth/invalid-credential':    'Credenciales incorrectas.',
  };
  return errores[code] ?? 'Ocurrió un error inesperado. Intenta de nuevo.';
}

// ─── Estilos ──────────────────────────────────────────────────────────────────
const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#ffffff',
    justifyContent: 'center',
    padding: 28,
  },
  logo: {
    width: 150,
    height: 150,
    alignSelf: 'center',
    marginBottom: 12,
  },
  title: {
    fontSize: 28,
    fontWeight: '800',
    color: NAVY,
    textAlign: 'center',
    marginBottom: 4,
  },
  subtitle: {
    fontSize: 14,
    color: '#78909c',
    textAlign: 'center',
    marginBottom: 28,
  },
  card: {
    backgroundColor: '#f5f7fb',
    borderRadius: 20,
    padding: 20,
  },
  label: {
    fontSize: 13,
    fontWeight: '600',
    color: NAVY,
    marginBottom: 6,
  },
  input: {
    backgroundColor: '#ffffff',
    borderWidth: 1.5,
    borderColor: '#dce3ec',
    borderRadius: 12,
    padding: 13,
    fontSize: 15,
    color: NAVY,
    marginBottom: 16,
  },
  passwordRow: {
    position: 'relative',
    marginBottom: 16,
  },
  passwordInput: {
    marginBottom: 0,
    paddingRight: 48,
  },
  eyeButton: {
    position: 'absolute',
    right: 12,
    top: 12,
  },
  eyeText: {
    fontSize: 18,
  },
  button: {
    backgroundColor: NAVY,
    borderRadius: 14,
    padding: 16,
    alignItems: 'center',
    marginTop: 4,
  },
  buttonText: {
    color: '#ffffff',
    fontWeight: '700',
    fontSize: 16,
  },
});