
<?php

//*****Codigo Para buscar proyectos mediante filtros*****


 // // Conexión al archivo para conectar la base de datos
 require 'config.php';

//Search
$search = isset($_POST['search']) ? $_POST['search'] : '';

try {
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Procesar búsqueda si el formulario fue enviado
if (isset($_POST['search'])) {
 $search = $_POST['search'];
}

// Consulta SQL para obtener proyectos con filtro de búsqueda
$sql = "SELECT * FROM aws_proyectos";
if (!empty($search)) {
    $sql .= " WHERE aws_nombrePro LIKE :search";
}

$stmt = $pdo->prepare($sql);
if (!empty($search)) {
    $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);

}
$stmt->execute();
$proyectos = $stmt->fetchAll(PDO::FETCH_ASSOC);


} catch (PDOException $e) {
echo "Error en la conexión: " . $e->getMessage();
}

?>