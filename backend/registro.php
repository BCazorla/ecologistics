<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre   = $_POST['nombre'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $rol      = $_POST['rol'];

    // ENCRIPTACIÓN PROFESIONAL: Se usa password_hash para seguridad
    $pass_encriptada = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO usuarios (nombre, email, password, rol) VALUES ('$nombre', '$email', '$pass_encriptada', '$rol')";

    if (mysqli_query($conexion, $sql)) {
        echo "<script>alert('Usuario registrado con éxito'); window.location='index.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
}
?>