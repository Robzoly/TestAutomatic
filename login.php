<?php
// login.php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    
    $sql = "SELECT id, nombre, password FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['nombre'] = $row['nombre'];
            header("Location: quiz.php");
            exit();
        } else {
            echo "Contraseña incorrecta. <a href='index.php'>Volver</a>";
        }
    } else {
        echo "Correo no registrado. <a href='index.php'>Volver</a>";
    }
}
?>
