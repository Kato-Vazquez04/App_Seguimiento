Registro de proyectos

<?php
// Configuración de la base de datos
$host = 'localhost';
$dbname = 'nombre_de_tu_base_de_datos';
$dbusername = 'tu_usuario';
$dbpassword = 'tu_contraseña';

try {
    // Conectar a la base de datos
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar si los datos han sido enviados
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
        $projectName = $_POST['project_name'];
        $projectDirector = $_POST['project_director'];
        $startDate = $_POST['start_date'];
        $endDate = $_POST['end_date'];
        $team = $_POST['team'];
        $status = $_POST['status'];

        // Insertar el proyecto en la base de datos
        $stmt = $conn->prepare("INSERT INTO proyectos (project_name, project_director, start_date, end_date, team, status) VALUES (:project_name, :project_director, :start_date, :end_date, :team, :status)");
        $stmt->bindParam(':project_name', $projectName);
        $stmt->bindParam(':project_director', $projectDirector);
        $stmt->bindParam(':start_date', $startDate);
        $stmt->bindParam(':end_date', $endDate);
        $stmt->bindParam(':team', $team);
        $stmt->bindParam(':status', $status);

        $stmt->execute();
        echo "Proyecto registrado con éxito.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
