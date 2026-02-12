<?php

//Codigo para poder crear pendientes

   // // Conexión al archivo para conectar la base de datos
   require 'config.php';
   
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Verifica si el formulario fue enviado y obtiene los datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $proyecto_id = $_POST['aws_id'];
    $pendiente = $_POST['pendiente'];

    // Inserta la nueva tarea en la base de datos
    $stmt = $pdo->prepare("INSERT INTO aws_projecttask (aws_id, pendiente) VALUES (:aws_id, :pendiente)");
    $stmt->bindParam(':aws_id', $aws_id, PDO::PARAM_INT);
    $stmt->bindParam(':pendiente', $pendiente, PDO::PARAM_STR);
    $stmt->execute();
}

// Redirecciona de vuelta a la página del proyecto para ver la tarea añadida
header("Location: Project_Details.php?id=" . $aws_id);
exit();
?>
