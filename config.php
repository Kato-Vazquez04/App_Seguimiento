<?php
//*******************Comentar la conexion la cual no se utilizara*******************//

// Configuración de la base de datos Local
//$servername = "localhost"; 
//$username = "root";   
//$password = ""; 
//$dbname = "appweb_seguimiento"; //

 //Configuracion a la base de datos en Produccion
 $servername = "sql112.infinityfree.com"; 
 $username = "if0_41137678";   
 $password = "DGBPjEf6lNCZz"; 
 $dbname = "if0_41137678_appweb_seguimiento"; 


try {
    // Crear la conexión con PDO
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}



