import { Drawer } from 'expo-router/drawer';
import { DrawerContentScrollView, DrawerItemList, DrawerItem, DrawerContentComponentProps } from '@react-navigation/drawer';
import { useAuth } from '../_layout'; // Importamos el hook

import { GestureHandlerRootView } from 'react-native-gesture-handler';
import { FontAwesome } from '@expo/vector-icons';
import { Colors } from '../../constants/Colors';
import { View, Text, StyleSheet } from 'react-native';

function CustomDrawerContent(props: DrawerContentComponentProps) {
  const { logout } = useAuth(); // Obtenemos la función logout

  return (
    <DrawerContentScrollView {...props} contentContainerStyle={{ flex: 1 }}>
      {/* Renderiza las opciones automáticas*/}
      <View style={{ flex: 1 }}>
        <DrawerItemList {...props} />
      </View>

      {/* Botón Cerrar Sesión al final */}
      <DrawerItem
        label="Cerrar Sesión"
        labelStyle={{ color: Colors.input.dataRequiredText, fontWeight: 'bold' }}
        icon={({ color, size }) => (
          <FontAwesome name="sign-out" size={size} color={Colors.input.dataRequiredText} />
        )}
        onPress={() => logout()} // <--- Cambia isAutenticated a FALSE
      />
    </DrawerContentScrollView>
  );
}

export default function LayoutPrincipal() {
  return (
    <GestureHandlerRootView style={{ flex: 1 }}>
      <Drawer 
        drawerContent={(props) => <CustomDrawerContent {...props} />}
        screenOptions={{ 
          drawerActiveTintColor: Colors.button.background,
          headerTintColor: Colors.header.color,
          headerStyle: { backgroundColor: Colors.header.background }
        }}
      >
        <Drawer.Screen 
          name="index" 
          options={{ 
            drawerLabel: 'Inicio', 
            title: 'Bienvenida',
            drawerIcon: ({ color, size }) => (
              <FontAwesome name="home" size={size} color={color} />
            )
          }}
        />
        <Drawer.Screen 
          name="perfil" 
          options={{ 
            drawerLabel: 'Perfil', 
            title: 'Mi Perfil',
            drawerIcon: ({ color, size }) => (
              <FontAwesome name="user" size={size} color={color} />
            )
          }}
        />
        <Drawer.Screen 
          name="updateDataPerfil" 
          options={{ 
            drawerLabel: 'Editar Perfil', 
            title: 'Actualizar Datos',
            drawerIcon: ({ color, size }) => (
              <FontAwesome name="pencil-square-o" size={size} color={color} />
            )
          }}
        />
      </Drawer>
    </GestureHandlerRootView>
  );
}