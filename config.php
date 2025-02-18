<?php
// config.php
$servername = "localhost";
$username = "root";
$password = ""; // Ajusta según tu configuración
$dbname = "cuestionario_db";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
