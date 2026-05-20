import { Stack } from 'expo-router';
import { StatusBar } from 'expo-status-bar';

export default function RootLayout() {
  return (
    <>
      <StatusBar style="dark" backgroundColor="#ffffff" />
      <Stack
        screenOptions={{
          headerStyle: {
            backgroundColor: '#ffffff',
          },
          headerTintColor: '#1a2f5e',
          headerTitleStyle: {
            fontWeight: '700',
            fontSize: 18,
            color: '#1a2f5e',
          },
          headerShadowVisible: false,
          contentStyle: {
            backgroundColor: '#ffffff',
          },
          animation: 'slide_from_right',
        }}
      >
        <Stack.Screen
          name="index"
          options={{ headerShown: false }}
        />
        <Stack.Screen
          name="login"
          options={{ headerShown: false }}
        />
        <Stack.Screen
          name="perfil"
          options={{
            title: 'Mi Perfil',
            headerBackTitle: 'Atrás',
          }}
        />
        <Stack.Screen
          name="codigoAcceso"
          options={{
            title: 'Código de Acceso',
            headerBackTitle: 'Atrás',
          }}
        />
      </Stack>
    </>
  );
}