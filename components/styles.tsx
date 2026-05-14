import { StyleSheet } from "react-native";
import { Colors } from '../constants/Colors';

export const styles = StyleSheet.create({
    // --- Contenedor principal
    container: {
        flex: 1,
        backgroundColor: Colors.sistemBackground,
        padding: 20,
        justifyContent: 'center',
    },
    // --- Header
    header: {
        justifyContent: "center",
        alignItems: 'center',
        height: 250,
    },
    // Logo
    headerIcon: {
        maxWidth: 150,
        maxHeight: 150,
        borderRadius: 50,
    },
    // Slogan
    slogan: {
        fontSize: 17,
        textAlign: "center",
        color: Colors.eslogan.color,
        fontFamily: 'JetBrains',
        paddingTop: 15,
    },
    // --- Contenedor del formulario
    contFrom: {
        flex: 1,

        justifyContent: "center",
    },
    form: {
        // flex: 1,
        borderRadius: 35,
        paddingLeft: 20,
        paddingRight: 20,
        marginBottom: 10,
        marginTop: 10,
        justifyContent: "space-evenly",
        backgroundColor: Colors.contentBackground,
        shadowColor: Colors.contentBoxShaw,
        shadowOffset: { width: 0, height: 4 },
        shadowOpacity: 0.3,
        shadowRadius: 5,
        elevation: 8
    },
    // Contenedor de ingreso de datos
    contDataInput: {
        marginTop: 20,
    },
    // Contenedor para ingresar datos del from (Input, Label)
    fromInputData: {
        marginBottom: 15,
    },
    // Label del formulario    
    label: {
        color: Colors.input.text,
        fontFamily: 'Montserrat-Regular',
        fontSize: 18,
    },
    // Input del formulario
    input: {
        fontFamily: 'Montserrat-Regular',
        borderBottomWidth: 2,
        borderBottomColor: Colors.input.lineButton,
        fontSize: 14,
        color: Colors.textColor,
        backgroundColor: Colors.contentBackground,
        paddingTop: 0,
        paddingBottom: 1,
    },
    // Links de acciones
    fromFooterLinks: {
        flexDirection: "row",
        alignItems: "center",
        justifyContent: "space-evenly",
        padding: 10,
    },
    // Link de registrar
    linkTextRegister: {
        color: Colors.textRegister,
        fontFamily: 'Montserrat-Regular',
        fontSize: 13,
        fontWeight: "700",
        marginBottom: 10,
        marginTop: 10,
    },
    // Link de recuperar
    linkTextRecuperar: {
        color: Colors.textRecuperar,
        fontFamily: 'Montserrat-Regular',
        fontSize: 13,
        fontWeight: "700",
    },

    // ***************************
    // --- Contenedor de QR
    card: {
        flex: 1,
        justifyContent: "center",
        alignItems: "center",
    },
    // texto de la tarjeta
    cardText: {
        color: Colors.textColor,
        fontFamily: 'Lato',
        fontSize: 17,
        fontWeight: "600",
    },
    // Boton para generar un nuevo QR
    butNewQR: {
        justifyContent: "center",
        margin: "auto",
        width: "80%",
        height: 150,
    },

    // ***************************
    // --- Contenedor de foto y user name
    headerPerfil: {
        justifyContent: "center",
        alignItems: "center",
        marginTop: 15,
    },
    // Foto de perfil
    profileImg: {
        width: 120,
        height: 120,
        borderRadius: 60,
        shadowColor: Colors.contentBoxShaw,
        shadowOffset: { width: 15, height: 15 },
        shadowOpacity: 1,
        shadowRadius: 15,
        elevation: 30
    },
    // Nombre de usuario
    headerUser: {
        fontFamily: 'JetBrains',
        color: Colors.colorIconF,
        fontSize: 22,
        paddingTop: 15,
        paddingBottom: 15,
    },
    // --- Contenedor para la muestra de datos
    // Contenedor de ingreso de datos
    contDataView: {
        marginTop: 20,
        marginBottom: 20,
    },
    // Contenedor del label y data
    fromViewData: {
        flexDirection: "row",
        justifyContent: "space-between",
        paddingTop: 15,
    },
    // Contiene los datos
    formData: {
        color: Colors.textColor,
        fontFamily: 'Lato',
        fontSize: 18,
    },

    // ***************************
    // --- Contenedor para actualizar la foto de perfil
    contfromUpdateIcon: {
        flexDirection: "row",
        alignItems: "center",
        justifyContent: "space-between",
    },
    // Foto de perfil
    updateIcon: {
        width: 80,
        height: 80,
        borderRadius: 60,
        shadowColor: Colors.contentBoxShaw,
        shadowOffset: { width: 15, height: 15 },
        shadowOpacity: 1,
        shadowRadius: 15,
        elevation: 30,
        marginTop: 15,
    },
    // Button para seleccionar archivo
    updateButton: {
        backgroundColor: Colors.button.backgroundFile,
        borderRadius: 50,
        alignItems: 'center',
        width: 170,
    },
    // Texto del boton
    updateButtonText: {
        color: Colors.button.textFile,
        fontFamily: 'Montserrat-Regular',
        fontWeight: "bold",
        fontSize: 12,
        marginTop: 5,
        marginBottom: 5,
    },
    // Contenedor del boton en from
    contUpdateBut: {
        marginBottom: 20,
        marginTop: 10,
    },
    // *** Datos requeridos
    dataRequired: {
        color: Colors.input.dataRequiredText,
    },
    // *** Placeholder de inputs
    dataPlaceholder: {
        color: Colors.input.dataEstaticText,
    },
    // *** Button
    button: {
        backgroundColor: Colors.button.background,
        borderRadius: 50,
        alignItems: 'center',
    },
    // *** Button Text
    buttonText: {
        color: Colors.button.text,
        fontFamily: 'Montserrat-Regular',
        fontWeight: "bold",
        fontSize: 22,
        marginTop: 5,
        marginBottom: 5,
    },
});
