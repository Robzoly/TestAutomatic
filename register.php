<?php
// register.php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    // Verificar si el correo ya existe
    $sql = "SELECT id FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "El correo ya está registrado. <a href='index.php'>Volver</a>";
        exit();
    }
    
    $sql = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['user_id'] = $conn->insert_id;
        $_SESSION['nombre'] = $nombre;
        header("Location: quiz.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
