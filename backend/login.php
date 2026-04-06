<?php
include 'conexion.php';
session_start(); // Iniciamos sesión para mantener al usuario conectado

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conexion, $_POST['email']);
    $password = $_POST['password'];

    // Buscamos al usuario por su email
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);

        // VERIFICACIÓN DE CONTRASEÑA ENCRIPTADA
        if (password_verify($password, $usuario['password'])) {
            
            // Guardamos datos en la sesión
            $_SESSION['user_id'] = $usuario['id'];
            $_SESSION['user_nombre'] = $usuario['nombre'];
            $_SESSION['user_rol'] = $usuario['rol'];

            // REDIRECCIÓN SEGÚN ROL
            switch ($usuario['rol']) {
                case 'admin':
                    header("Location: index-admin.html");
                    break;
                case 'conductor':
                    header("Location: index-conductor.html");
                    break;
                case 'ciudadano':
                    header("Location: index-ciudadano.html");
                    break;
                default:
                    header("Location: index.html?error=rol_no_definido");
                    break;
            }
            exit();

        } else {
            // Contraseña incorrecta
            echo "<script>alert('Contraseña incorrecta'); window.location='index.html';</script>";
        }
    } else {
        // Email no registrado
        echo "<script>alert('El correo electrónico no está registrado'); window.location='index.html';</script>";
    }
}
?>