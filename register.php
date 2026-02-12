<?php
//*****Este codigo sirve para Registrar Usuarios*****

// Conexión al archivo para conectar la base de datos
require 'config.php';

try {
    // Conexión a la base de datos
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener datos del formulario
        $aws_nombre = trim($_POST['aws_nombre']);
        $aws_correo = trim($_POST['aws_correo']);
        $aws_password = trim($_POST['aws_password']);

        // Validar que todos los campos estén llenos
        if (empty($aws_nombre) || empty($aws_correo) || empty($aws_password)) {
            echo "<script>
                    alert('Por el momento ya no se permiten registros en este sitio :(.');
                    window.history.back(); // Vuelve al formulario
                  </script>";
            exit();
        }

        // Insertar el usuario en la base de datos
        $stmt = $conn->prepare("INSERT INTO aws_login (aws_nombre, aws_correo, aws_password) VALUES (:aws_nombre, :aws_correo, :aws_password)");
        $stmt->bindParam(':aws_nombre', $aws_nombre);
        $stmt->bindParam(':aws_correo', $aws_correo);
        $stmt->bindParam(':aws_password', $aws_password);

        if ($stmt->execute()) {
            // Redirige al inicio de sesión u otra página
            header("Location: index.php");
            exit();
        } else {
            echo "Hubo un error al registrar el usuario.";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión
$conn = null;
?>
