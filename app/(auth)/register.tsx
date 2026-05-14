import { View, Text, TextInput, TouchableOpacity, ScrollView, Image } from 'react-native';
import { Link } from 'expo-router';
import { Colors } from '../../constants/Colors';
import { styles } from '@/components/styles';// Estilos
import { useAuth } from '../_layout';

export default function RegisterScreen() {
  const { login } = useAuth();// Obtenemos la función login
  return (
    <ScrollView>
      <View style={styles.container}>
        {/* Logo y Eslogan */}
        <View style={styles.header}>
          <Image
            style={styles.headerIcon}
            source={require("../../assets/images/icon.png")}
          ></Image>
          <Text style={styles.slogan}>Donde la tecnología reconoce tu identidad</Text>
        </View>

        {/* Formulario */}
        <View style={styles.contFrom}>

          <View style={styles.form}>{/* form */}

            <View style={styles.contDataInput}>
              {[
                { label: 'Usuario', placeholder: 'Nombre de usuario..' },
                { label: 'Nombres', placeholder: 'Nombres..' },
                { label: 'Apellidos', placeholder: 'Apellidos..' },
                { label: 'Correo electronico', placeholder: 'correo electronico' },
              ].map((item, index) => (
                <View key={index} style={styles.fromInputData}>
                  <Text style={styles.label}>{item.label} <Text style={styles.dataRequired}>*</Text></Text>
                  <TextInput style={styles.input} placeholder={item.placeholder} placeholderTextColor={Colors.input.dataEstaticText} />
                </View>
              ))}

              <View style={styles.fromInputData}>
                <Text style={styles.label}>Contraseña <Text style={styles.dataRequired}>*</Text></Text>
                <TextInput style={styles.input} secureTextEntry placeholder="**********" placeholderTextColor={Colors.input.dataEstaticText} />
              </View>
            </View>

            <View>
              <TouchableOpacity
                style={styles.button}
                onPress={() => login()}
              ><Text style={styles.buttonText}>Registrar</Text></TouchableOpacity>

              <View style={styles.fromFooterLinks}>{/* fromFooterLinks */}
                <Link href="/login" asChild>
                  <TouchableOpacity>
                    <Text style={styles.linkTextRegister}>Inisiar sesión</Text>
                  </TouchableOpacity>
                </Link>
              </View>{/* fromFooterLinks */}
            </View>
          </View>{/* /form */}
        </View>

      </View>
    </ScrollView>
  );
}
