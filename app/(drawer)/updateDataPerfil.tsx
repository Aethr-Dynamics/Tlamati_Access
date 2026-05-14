import { useRouter } from "expo-router";
import { View, Text, TextInput, TouchableOpacity, Image, ScrollView } from 'react-native';
import { FontAwesome } from '@expo/vector-icons';
import { Colors } from '../../constants/Colors';// Colores corporativos
import { styles } from '@/components/styles';// Estilos

export default function UpdateDataPerfilScreen() {
  const fields = [
    { label: 'Usuario', value: 'Manzur', placeholder: 'Nombre de usuario..' },
    { label: 'Nombre', value: 'Manzur', placeholder: 'Nombres..' },
    { label: 'Apellido', value: 'Rodríguez Cervantes', placeholder: 'Apellidos..' },
    { label: 'Correo', value: 'manzur@gmail.com', placeholder: 'correo electronico' },
    { label: 'País', value: 'México', placeholder: 'País' }, 
    { label: 'Contraseña', value: '**********', placeholder: '**********' }, 
  ];
  const router = useRouter(); // Hook para manejar la navegación
  return (
    <ScrollView>
      <View style={styles.container}>

        {/* Formulario */}
        <View style={styles.contFrom}>

          <View style={styles.form}>{/* form */}

            <View style={styles.contfromUpdateIcon}>
              <View>
                <Image 
                  style={styles.updateIcon}
                  source={require("../../assets/user/iconUser.jpeg")}
                />
              </View>
              <View>
                <TouchableOpacity style={styles.updateButton}>
                  <Text style={styles.updateButtonText}>
                    <FontAwesome name="file-picture-o" size={20} color={Colors.button.textFile} /> Bucar
                  </Text>
                </TouchableOpacity>
              </View>
            </View>


            <View style={styles.contDataInput}>
              {fields.map((item, index) => (
                <View key={index} style={styles.fromInputData}>
                  <Text style={styles.label}>{item.label} <Text style={styles.dataRequired}>*</Text></Text>
                  <TextInput style={styles.input} defaultValue={item.value} placeholder={item.placeholder} placeholderTextColor={Colors.input.dataEstaticText} />
                </View>
              ))}
            </View>

            
            <View style={styles.contUpdateBut}>
              <TouchableOpacity 
              style={styles.button}
              onPress={() => router.push("/perfil")}
              ><Text style={styles.buttonText}>Guardar</Text>
            </TouchableOpacity>
            </View>
            
          </View>{/* /form */}

        </View>

      </View>
    </ScrollView>
  );
}
