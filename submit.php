<?php
// submit.php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Se reciben las respuestas enviadas por el formulario
$respuestas = $_POST['respuestas']; // Formato: respuestas[question_id] = respuesta

// Arreglo de respuestas correctas (ejemplo; ajustar a tus preguntas)
$correctAnswers = array(
    1 => '0',    // Ejemplo: opción 0 es la correcta para la pregunta 1
    2 => 'true', // Para preguntas de verdadero/falso, se usa 'true' o 'false'
    3 => '1',
    4 => 'false',
    5 => '2',
    6 => 'true',
    7 => '0',
    8 => 'false',
    9 => '1',
    10 => 'true',
    11 => '2',
    12 => 'false',
    13 => '1',
    14 => 'true',
    15 => '0',
    16 => 'false',
    17 => '1',
    18 => 'true',
    19 => '2',
    20 => 'false'
);

$score = 0;
$total = count($correctAnswers);
$detalle = array();

foreach($correctAnswers as $id => $correct) {
    if(isset($respuestas[$id]) && $respuestas[$id] == $correct) {
        $score++;
        $detalle[$id] = "Correcto";
    } else {
        $detalle[$id] = "Incorrecto";
    }
}

// Guardar resultados en un archivo CSV
$csvFile = 'data/resultados.csv';
$usuario = $_SESSION['nombre'];
$fecha = date("Y-m-d H:i:s");
$row = array($usuario, $fecha, $score, json_encode($detalle));
$fileExists = file_exists($csvFile);
$fp = fopen($csvFile, 'a');
if (!$fileExists) {
    fputcsv($fp, array('Usuario', 'Fecha', 'Puntaje', 'Detalle'));
}
fputcsv($fp, $row);
fclose($fp);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resumen del Cuestionario</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/theme.js" defer></script>
</head>
<body>
<div class="container">
    <h1>Resumen del Cuestionario</h1>
    <p>Puntaje: <?php echo $score . " de " . $total; ?></p>
    <h2>Detalle de Respuestas:</h2>
    <ul>
        <?php foreach($detalle as $id => $result): ?>
            <li>Pregunta <?php echo $id; ?>: <?php echo $result; ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="quiz.php">Volver al Cuestionario</a>
    <a href="logout.php">Cerrar Sesión</a>
</div>
</body>
</html>
