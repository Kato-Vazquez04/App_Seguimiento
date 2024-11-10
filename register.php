<?php
// Configuración de la base de datos
$host = 'localhost';
$dbname = 'appweb_seguimiento';
$dbusername = 'root';
$dbpassword = '';

try {
    // Conexión a la base de datos
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener datos del formulario
        $aws_nombre = $_POST['aws_nombre'];
        $aws_correo = $_POST['aws_correo'];
        $aws_password = $_POST['aws_password'];
        /*$confirm_password = $_POST['confirm_password'];*/
       

        // Verificar que las contraseñas coincidan
        if ($aws_contraseña !== $aws_confirm_password) {
            echo "Las contraseñas no coinciden.";
            exit();
        }

        // Encriptar la contraseña
        /*$hashed_password = password_hash($aws_contraseña, PASSWORD_DEFAULT);*/

        // Insertar el usuario en la base de datos
        $stmt = $conn->prepare("INSERT INTO aws_login (aws_nombre, aws_correo, aws_password) VALUES (:aws_nombre, :aws_correo, :aws_password)");
        $stmt->bindParam(':aws_nombre', $aws_nombre);
        $stmt->bindParam(':aws_correo', $aws_correo);
        $stmt->bindParam(':aws_password', $aws_password);
        /*$stmt->bindParam(':aws_confirm_password', $aws_confirm_password);*/

        if ($stmt->execute()) {
            echo "Usuario registrado con éxito.";
            header("Location: index.php"); // Redirige al inicio de sesión u otra página
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
