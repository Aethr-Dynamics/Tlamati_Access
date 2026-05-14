import { View, Text, StyleSheet, Image, ScrollView } from 'react-native';
import { Colors } from '../../constants/Colors';// Colores corporativos
import { styles } from '@/components/styles';// Estilos

export default function ProfileScreen() {
  
  const userData = [
    { label: 'Usuario', value: 'Manzur' },
    { label: 'Nombre', value: 'Manzur' },
    { label: 'Apellido', value: 'Ridríguez Cervantes' },
    { label: 'Correo', value: 'manzur@gmail.com' },
    { label: 'País', value: 'México' },
    { label: 'Registro', value: '16/03/2026', disabled: true },
  ];

  return (
    <ScrollView>
      <View style={styles.container}>
        {/* Foto y user del usuario */}
        <View style={styles.headerPerfil}>
          <Image 
            style={styles.profileImg}
            source={require("../../assets/user/iconUser.jpeg")}
          />
          <Text style={styles.headerUser}>Manzur</Text>
        </View>

        {/* Información del usuario */}
        <View style={styles.contFrom}>
          <View style={styles.form}>{/* form */}

            <View style={styles.contDataView}>

              {userData.map((item, index) => (
                <View key={index} style={styles.fromViewData}>
                  <Text style={styles.label}>{item.label}:</Text>
                  <Text style={[styles.formData, item.disabled && {color: Colors.input.dataEstaticText}]}>
                    {item.value}
                  </Text>
                </View>
              ))}
              
            </View>

          </View>
        </View>
      </View>
    </ScrollView>
  );
}
