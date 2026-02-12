<?php
//******Este codigo es para que pueda funcionar el login******

// Iniciar la sesión
session_start();

// Conexión al archivo para conectar la base de datos
require 'config.php';

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
        echo "<script>
                alert('Por favor, complete todos los campos.');
                window.history.back(); // Vuelve al formulario
              </script>";
        exit();
    } else {
        // Preparar y ejecutar la consulta
        $stmt = $conn->prepare("SELECT * FROM aws_login WHERE aws_nombre = ? AND aws_password = ?");
        $stmt->bind_param("ss", $user, $pass);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            $_SESSION['aws_nombre'] = $user; // Guardar el usuario en la sesión
            echo "<script>
                    alert('Inicio de sesión exitoso.');
                    window.location.href = 'Project_View.php'; // Redirigir
                  </script>";
            exit();
        } else {
            echo "<script>
                    alert('Credenciales incorrectas. Por favor, intente de nuevo.');
                    window.history.back(); // Vuelve al formulario
                  </script>";
            exit();
        }

        $stmt->close();
    }
}

$conn->close();
?>
