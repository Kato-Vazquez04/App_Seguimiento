<?php
require 'config.php';

// Verificar si se ha enviado un nuevo pendiente a través del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pendiente'])) {
    $aws_id = $_POST['aws_id'];
    $pendiente_texto = $_POST['pendiente'];

    // Insertar el nuevo pendiente en la base de datos
    $stmt = $pdo->prepare("INSERT INTO aws_pendientes (aws_id, pendiente_texto) VALUES (?, ?)");
    $stmt->execute([$aws_id, $pendiente_texto]);

    // Redirigir para evitar reenvío del formulario
    header("Location: Project_Details.php?id=" . $aws_id);
    exit();
}

// Obtener y mostrar los pendientes guardados para el proyecto actual
$aws_id = $_GET['id'];
$stmt = $pdo->prepare("SELECT pendiente_texto, fecha FROM aws_pendientes WHERE aws_id = ?");
$stmt->execute([$aws_id]);
$pendientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Actualizar estado del p
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Verificar si se envió el formulario para actualizar el estado del proyecto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['project_id'], $_POST['aws_estado'])) {
    $project_id = $_POST['project_id'];
    $nuevo_estado = $_POST['aws_estado'];

    // Actualizar el estado del proyecto en la base de datos
    $stmt = $pdo->prepare("UPDATE aws_proyectos SET aws_estado = ? WHERE aws_id = ?");
    $stmt->execute([$nuevo_estado, $project_id]);

    // Redirigir a la misma página para evitar reenvío del formulario
    header("Location: Project_Details.php?id=" . $project_id);
    exit();
}

// Obtener el ID del proyecto de la URL
$aws_id = $_GET['id'];

// Consultar los detalles del proyecto
$stmt = $pdo->prepare("SELECT * FROM aws_proyectos WHERE aws_id = :id");
$stmt->bindParam(':id', $aws_id, PDO::PARAM_INT);
$stmt->execute();
$proyecto = $stmt->fetch(PDO::FETCH_ASSOC);

// Obtener y mostrar los pendientes del proyecto
$stmt = $pdo->prepare("SELECT pendiente_texto, fecha FROM aws_pendientes WHERE aws_id = ?");
$stmt->execute([$aws_id]);
$pendientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Codigo php para ver detalles del proyecto-->

   // // Conexión al archivo para conectar la base de datos
//    require 'config.php';



        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Obtener el ID del proyecto de la URL
        $projectId = $_GET['id'];

        // Consultar los detalles del proyecto
        $stmt = $pdo->prepare("SELECT * FROM aws_proyectos WHERE aws_id = :id");
        $stmt->bindParam(':id', $projectId, PDO::PARAM_INT);
        $stmt->execute();
        $proyecto = $stmt->fetch(PDO::FETCH_ASSOC);
?>






