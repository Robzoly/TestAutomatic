<?php
// index.php
session_start();
if(isset($_SESSION['user_id'])){
    header("Location: quiz.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login / Registro - Cuestionario ERP y CRM</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/theme.js" defer></script>
</head>
<body>
<div class="container">
    <h1>Cuestionario ERP y CRM</h1>
    <div class="tabs">
        <button id="loginTab" onclick="showLogin()">Login</button>
        <button id="registerTab" onclick="showRegister()">Registro</button>
    </div>
    <div id="loginForm">
        <h2>Iniciar Sesión</h2>
        <form action="login.php" method="POST">
            <label for="email">Correo:</label>
            <input type="email" name="email" required>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
    <div id="registerForm" style="display:none;">
        <h2>Registro</h2>
        <form action="register.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>
            <label for="email">Correo:</label>
            <input type="email" name="email" required>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>
            <button type="submit">Registrarse</button>
        </form>
    </div>
</div>
<script>
function showLogin(){
    document.getElementById('loginForm').style.display = 'block';
    document.getElementById('registerForm').style.display = 'none';
}
function showRegister(){
    document.getElementById('loginForm').style.display = 'none';
    document.getElementById('registerForm').style.display = 'block';
}
</script>
</body>
</html>
