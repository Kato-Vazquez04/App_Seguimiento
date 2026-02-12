<?php
//******Este codigo funciona para poder eliminar proyectos******

//Mensajes detallados de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

   // // Conexión al archivo para conectar la base de datos
   require 'config.php';


if (isset($_GET['aws_id'])) {
    $projectId = $_GET['aws_id'];

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Eliminar el proyecto
        $sql = "DELETE FROM aws_proyectos WHERE aws_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $projectId, PDO::PARAM_INT);
        $stmt->execute();

        // Redirigir a la página de proyectos
        header("Location: Project_View.php");
        exit();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No se proporcionó un ID de proyecto.";
    
}
?>
