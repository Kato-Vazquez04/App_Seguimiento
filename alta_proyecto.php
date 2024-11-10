<?php
// Conexión a la base de datos
$host = 'localhost';
$dbname = 'nombre_base_datos';
$username = 'usuario';
$password = 'contraseña';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Recoger los datos del formulario
        $nombreProyecto = $_POST['nombre_proyecto'];
        $directorProyecto = $_POST['director_proyecto'];
        $fechaInicio = $_POST['fecha_inicio'];
        $fechaFin = $_POST['fecha_fin'];
        $estado = $_POST['estado'];

        // Insertar en la base de datos
        $sql = "INSERT INTO proyectos (nombre, director, fecha_inicio, fecha_fin, estado) VALUES (:nombre, :director, :fecha_inicio, :fecha_fin, :estado)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre', $nombreProyecto);
        $stmt->bindParam(':director', $directorProyecto);
        $stmt->bindParam(':fecha_inicio', $fechaInicio);
        $stmt->bindParam(':fecha_fin', $fechaFin);
        $stmt->bindParam(':estado', $estado);
        $stmt->execute();

        // Redirigir a la página de proyectos
        header("Location: lista_proyectos.php");
        exit();
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>