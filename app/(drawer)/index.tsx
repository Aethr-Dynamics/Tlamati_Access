import { View, Text, StyleSheet, TouchableOpacity } from 'react-native';
import { FontAwesome } from '@expo/vector-icons';
import { Colors } from '../../constants/Colors';// Colores corporativos
import { styles } from '@/components/styles';// Estilos

export default function HomeScreen() {
  return (
    <View style={styles.container}>
      <View style={styles.card}>
        <FontAwesome name="qrcode" size={200} color={Colors.colorIconF} />
        <Text style={styles.cardText}>Escanea para ingresar</Text>
      </View>

      <View style={styles.butNewQR}>
        <TouchableOpacity style={styles.button}>
          <Text style={styles.buttonText}><FontAwesome name="refresh" size={20} color={Colors.button.text} /> Generar</Text>
        </TouchableOpacity>
      </View>
    </View>
  );
}