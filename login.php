<?php
// login.php
session_start(); // Iniciar la sesión
// Conexión a la base de datos
$servername = "localhost"; // Cambia si es necesario
$username = "root";   // Cambia por tu usuario de base de datos
$password = ""; // Cambia por tu contraseña de base de datos
$dbname = "appweb_seguimiento"; // Cambia por tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Validar si se recibieron datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = trim($_POST['aws_nombre']);
    $pass = trim($_POST['aws_password']);

    // Verificar si los campos están vacíos
    if (empty($user) || empty($pass)) {
        echo "Por favor, complete todos los campos.";
    } else {
        // Preparar y ejecutar la consulta
        $stmt = $conn->prepare("SELECT * FROM aws_login WHERE aws_nombre = ? AND aws_password = ?");
        $stmt->bind_param("ss", $user, $pass);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            $_SESSION['aws_nombre'] = $user; // Guardar el usuario en la sesión
            header("Location: Project_View.php");
            exit();
        } else {
            
            echo "Credenciales incorrectas.";
        }

        $stmt->close();
    }
}

$conn->close();
?>
