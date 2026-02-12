<?php

//*****Este codigo sirve para poder subir y descargar los archivos*****

require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['archivo'])) {
    $aws_id = $_POST['aws_id'];
    $archivo = $_FILES['archivo'];

    // Verifica si no hubo errores en la subida
    if ($archivo['error'] === UPLOAD_ERR_OK) {
        $nombreOriginal = $archivo['name'];
        $rutaTemporal = $archivo['tmp_name'];
        $directorioDestino = 'uploads/' . uniqid() . '_' . basename($nombreOriginal); // Evitar duplicados

        // Mover archivo al directorio de destino
        if (move_uploaded_file($rutaTemporal, $directorioDestino)) {
            // Guardar detalles en la base de datos
            $stmt = $pdo->prepare("INSERT INTO aws_archivos (aws_id, nombre_original, ruta) VALUES (?, ?, ?)");
            $stmt->execute([$aws_id, $nombreOriginal, $directorioDestino]);

            // Redirigir de vuelta a la página de detalles del proyecto
            header("Location: Project_Details.php?id=" . $aws_id);
            exit();
        } else {
            echo "Error al mover el archivo.";
        }
    } else {
        echo "Error al subir el archivo.";
    }
}
?>
