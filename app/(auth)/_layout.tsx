import { Stack } from "expo-router";/** Layout de autenticación */
export default function LayoutAuth() {
    return (
        <Stack
            screenOptions={{
                headerShown: false,
            }}
        >
            <Stack.Screen name="login" options={{title: "Login"}}/>
            <Stack.Screen name="register" options={{title: "Registro"}}/>
        </Stack>
    );
}