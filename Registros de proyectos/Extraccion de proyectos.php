Extraccion de proyectos 

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

    // Obtener los proyectos
    $stmt = $conn->prepare("SELECT * FROM proyectos ORDER BY start_date DESC");
    $stmt->execute();

    // Mostrar los proyectos
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='project-row'>";
        echo "<span class='project-id'>{$row['id']}</span>";
        echo "<input type='text' class='project-name' value='{$row['project_name']}' readonly>";
        echo "<input type='text' class='project-director' value='{$row['project_director']}' readonly>";
        echo "<input type='date' class='start-date' value='{$row['start_date']}' readonly>";
        echo "<input type='date' class='end-date' value='{$row['end_date']}' readonly>";
        echo "<select class='status' disabled>";
        echo "<option" . ($row['status'] == 'Activo' ? ' selected' : '') . ">Activo</option>";
        echo "<option" . ($row['status'] == 'Desactivado' ? ' selected' : '') . ">Desactivado</option>";
        echo "</select>";
        echo "</div>";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
