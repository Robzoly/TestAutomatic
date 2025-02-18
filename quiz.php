<?php
// quiz.php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cuestionario ERP y CRM</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/quiz.js" defer></script>
    <script src="js/theme.js" defer></script>
</head>
<body>
<div class="container">
    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?></h1>
    <form id="quizForm" action="submit.php" method="POST">
        <div id="preguntas">
            <!-- Las preguntas se cargarán aquí mediante JavaScript -->
        </div>
        <button type="submit">Enviar Respuestas</button>
    </form>
    <a href="logout.php">Cerrar Sesión</a>
</div>
</body>
</html>
