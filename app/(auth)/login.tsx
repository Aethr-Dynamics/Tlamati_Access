import { View, Text, TextInput, TouchableOpacity, Image } from 'react-native';
import { useAuth } from '../_layout'; // Importamos el hook
import { Link } from 'expo-router';
import { Colors } from '../../constants/Colors';// Colores corporativos
import { styles } from '@/components/styles';// Estilos
import { SafeAreaView } from 'react-native-safe-area-context';

export default function LoginScreen() {
  const { login } = useAuth(); // Obtenemos la función login
  return (
    <SafeAreaView style={styles.container}>
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
            <View style={styles.fromInputData}>
              <Text style={styles.label}>Correo electrónico</Text>
              <TextInput style={styles.input} placeholder="ejemplo@correo.com" placeholderTextColor={Colors.input.dataEstaticText} />
            </View>

            <View style={styles.fromInputData}>
              <Text style={styles.label}>Contraseña</Text>
              <TextInput style={styles.input} secureTextEntry placeholder="••••••••" placeholderTextColor={Colors.input.dataEstaticText} />
            </View>
          </View>

          <View>
            <TouchableOpacity
              style={styles.button}
              onPress={() => login()} // <--- Al presionar, cambia el estado a TRUE
            ><Text style={styles.buttonText}>Ingresar</Text></TouchableOpacity>

            <View style={styles.fromFooterLinks}>{/* fromFooterLinks */}
              <Link href="/register" asChild>
                <TouchableOpacity>
                  <Text style={styles.linkTextRecuperar}>Recuperar cuenta</Text>
                </TouchableOpacity>
              </Link>

              <Link href="/register" asChild>
                <TouchableOpacity>
                  <Text style={styles.linkTextRegister}>Regístrate</Text>
                </TouchableOpacity>
              </Link>
            </View>{/* fromFooterLinks */}

          </View>
        </View>{/* /form */}
      </View>
    </SafeAreaView>
  );
}