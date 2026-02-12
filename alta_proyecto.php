<?php
//Codigo para dar de alta proyectos

// Conexión a la base de datos
require 'config.php';


try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recoger los datos del formulario
        $aws_nombrePro = $_POST['aws_nombrePro'];
        $aws_nombreDir = $_POST['aws_nombreDir'];
        $aws_fechaInicio = $_POST['aws_fechaInicio'];
        $aws_fechaFin = $_POST['aws_fechaFin'];
       
        $aws_estado = $_POST['aws_estado'];

        // Insertar en la base de datos
        $sql = "INSERT INTO aws_proyectos (aws_nombrePro, aws_nombreDir, aws_fechaInicio, aws_fechaFin, aws_estado) VALUES (:aws_nombrePro, :aws_nombreDir, :aws_fechaInicio, :aws_fechaFin, :aws_estado)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':aws_nombrePro', $aws_nombrePro);
        $stmt->bindParam(':aws_nombreDir', $aws_nombreDir);
        $stmt->bindParam(':aws_fechaInicio', $aws_fechaInicio);
        $stmt->bindParam(':aws_fechaFin', $aws_fechaFin);
        
        $stmt->bindParam(':aws_estado', $aws_estado);
        $stmt->execute();

        // Redirigir a la página de proyectos
        header("Location: Project_View.php?success=1");
        exit();
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>