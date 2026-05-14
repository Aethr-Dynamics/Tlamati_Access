import { Stack, useRouter, useSegments } from "expo-router";
import { useState, useEffect, createContext, useContext } from "react";
import { GestureHandlerRootView } from 'react-native-gesture-handler';
import * as SplashScreen from 'expo-splash-screen'; // Importar Splash

// IMPORTAR LAS FUENTES
import { useFonts, Montserrat_400Regular, Montserrat_700Bold } from '@expo-google-fonts/montserrat';
import { Lato_400Regular } from '@expo-google-fonts/lato';
import { JetBrainsMono_400Regular } from '@expo-google-fonts/jetbrains-mono';

// Evita que la splash screen se oculte automáticamente
SplashScreen.preventAutoHideAsync();

const AuthContext = createContext({ isAutenticated: false, login: () => {}, logout: () => {} });
export const useAuth = () => useContext(AuthContext);

export default function RootLayout() {
  const [isAutenticated, setIsAutenticated] = useState(false);
  const [isReady, setIsReady] = useState(false); // Saber si el layout cargó
  const segments = useSegments();
  const router = useRouter();

  // Cargar fuentes
  const [fontsLoaded, fontError] = useFonts({
    'Montserrat-Regular': Montserrat_400Regular,
    'Montserrat-Bold': Montserrat_700Bold,
    'Lato': Lato_400Regular,
    'JetBrains': JetBrainsMono_400Regular,
  });

  const login = () => setIsAutenticated(true);
  const logout = () => setIsAutenticated(false);

  // Controlar Splash y Ready
  useEffect(() => {
    if (fontsLoaded || fontError) {
      SplashScreen.hideAsync();
      // Activarlo aquí mismo cuando las fuentes estén listas
      setIsReady(true);
    }
  }, [fontsLoaded, fontError]);

  // Monitor de navegación
  useEffect(() => {
    if (!isReady) return; 

    const inAuthGroup = segments[0] === "(auth)";

    if (!isAutenticated && !inAuthGroup) {
      router.replace("/login");
    } else if (isAutenticated && inAuthGroup) {
      router.replace("/(drawer)");
    }
  }, [isAutenticated, segments, isReady]);
  
  if (!fontsLoaded && !fontError) {
    return null;
  }

  return (
    <AuthContext.Provider value={{ isAutenticated, login, logout }}>
      <GestureHandlerRootView style={{ flex: 1 }}>
        <Stack screenOptions={{ headerShown: false }}>
          <Stack.Screen name="(auth)" options={{ headerShown: false }} />
          <Stack.Screen name="(drawer)" options={{ headerShown: false }} />
        </Stack>
      </GestureHandlerRootView>
    </AuthContext.Provider>
  );
}