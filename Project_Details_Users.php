<?php
require 'config.php';

// Verificar si se ha enviado un nuevo pendiente a través del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pendiente'])) {
    $aws_id = $_POST['aws_id'];
    $pendiente_texto = $_POST['pendiente'];

    // Insertar el nuevo pendiente en la base de datos
    $stmt = $pdo->prepare("INSERT INTO aws_pendientes (aws_id, pendiente_texto) VALUES (?, ?)");
    $stmt->execute([$aws_id, $pendiente_texto]);

    // Redirigir para evitar reenvío del formulario
    header("Location: Project_Details.php?id=" . $aws_id);
    exit();
}

// Obtener y mostrar los pendientes guardados para el proyecto actual
$aws_id = $_GET['id'];
$stmt = $pdo->prepare("SELECT pendiente_texto, fecha FROM aws_pendientes WHERE aws_id = ?");
$stmt->execute([$aws_id]);
$pendientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Actualizar estado del p
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Verificar si se envió el formulario para actualizar el estado del proyecto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['project_id'], $_POST['aws_estado'])) {
    $project_id = $_POST['project_id'];
    $nuevo_estado = $_POST['aws_estado'];

    // Actualizar el estado del proyecto en la base de datos
    $stmt = $pdo->prepare("UPDATE aws_proyectos SET aws_estado = ? WHERE aws_id = ?");
    $stmt->execute([$nuevo_estado, $project_id]);

    // Redirigir a la misma página para evitar reenvío del formulario
    header("Location: Project_Details.php?id=" . $project_id);
    exit();
}

// Obtener el ID del proyecto de la URL
$aws_id = $_GET['id'];

// Consultar los detalles del proyecto
$stmt = $pdo->prepare("SELECT * FROM aws_proyectos WHERE aws_id = :id");
$stmt->bindParam(':id', $aws_id, PDO::PARAM_INT);
$stmt->execute();
$proyecto = $stmt->fetch(PDO::FETCH_ASSOC);

// Obtener y mostrar los pendientes del proyecto
$stmt = $pdo->prepare("SELECT pendiente_texto, fecha FROM aws_pendientes WHERE aws_id = ?");
$stmt->execute([$aws_id]);
$pendientes = $stmt->fetchAll(PDO::FETCH_ASSOC);


//Codigo de notificaciones
            try {
            // Conexión a la base de datos
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Consulta para contar las notificaciones (notificación = 0)
            $stmt = $pdo->prepare("SELECT COUNT(*) as num_notificaciones FROM aws_proyectos WHERE aws_notificacion = 0");
            $stmt->execute();
            $num_notificaciones = $stmt->fetch(PDO::FETCH_ASSOC)['num_notificaciones'];

            // Consulta para obtener todos los proyectos
            $sql = "SELECT * FROM aws_proyectos";
            $stmt = $pdo->query($sql);
            $proyectos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
            echo "Error en la conexión: " . $e->getMessage();
            $num_notificaciones = 0;  // Asigna valor por defecto si hay error en la conexión
            $proyectos = [];          // Inicializa como array vacío si hay error en la conexión
            }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AppWebSeguimiento</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Krub:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&family=Merienda:wght@300;400&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Scribble&family=Workbench&display=swap" rel="stylesheet">
    <link rel="preload" href="css/estilos.css" as="style">
    <link rel="stylesheet" href="css/estilos.css ">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<!--Codigo php para ver detalles del proyecto-->
<?php
   
   // // Conexión al archivo para conectar la base de datos
   require 'config.php';



        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Obtener el ID del proyecto de la URL
        $projectId = $_GET['id'];

        // Consultar los detalles del proyecto
        $stmt = $pdo->prepare("SELECT * FROM aws_proyectos WHERE aws_id = :id");
        $stmt->bindParam(':id', $projectId, PDO::PARAM_INT);
        $stmt->execute();
        $proyecto = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<body>
        <div class="nav-bg">
            <nav class="navegacion-principal contenedor">
                <h3 class="titulo_nav">App web de <br> seguimiento<span> RV<span></h3>
                    <div class="botones-nav">
                    <button type="button" class="icono-img1" onclick="mostrarNotificaciones()"></button>
                    <button type="button" class="icono-img" onclick="confirmarSalida()"> </button>
                </div>
            </nav>
        </div>


<div>
        <header>
            
            <h1 class="grid1"><?php echo htmlspecialchars($proyecto['aws_nombrePro']); ?></h1>
            <!-- <button class="notifications-button">Notificaciones</button> -->
        </header>
        <a class="back-boton" href="Project_View.php">⬅</a>
        <section class="form-group">
            <form  class="container2" action="Project_Details.php" method="post">
                <!-- Campo oculto para pasar el ID del proyecto -->
                <input type="hidden" name="project_id" value="<?php echo $proyecto['aws_id']; ?>">

                <div>
                    <label>Nombre</label>
                    <input type="text" name="aws_nombrePro" value="<?php echo htmlspecialchars($proyecto['aws_nombrePro']); ?>" readonly>
                </div>
            
                <div>
                    <label>Fecha inicio</label>
                    <input type="date" name="aws_fechaInicio" value="<?php echo htmlspecialchars($proyecto['aws_fechaInicio']); ?>" readonly>
                </div>
                <div>
                    <label>Fecha fin</label>
                    <input type="date" name="aws_fechaFin" value="<?php echo htmlspecialchars($proyecto['aws_fechaFin']); ?>" readonly>
                </div>
                <div>
                    <label>Estado</label>
                    <select name="aws_estado">
                       
                        <option value="Activo" <?php echo ($proyecto['aws_estado'] == 1) ? 'selected' : ''; ?>>Activo</option>
                        <option value="Finalizado" <?php echo ($proyecto['aws_estado'] == 2 ) ? 'selected' : ''; ?>>Finalizado</option>
                    </select>
                </div>
            
                <div>
                    <input class="boton-search" type="submit" value="Guardar Cambios">
                </div>
            <div>
                <label>Agrega miembros a tu Proyecto.</lable>
                <div class="form-group">
                
                    <label for="team">Equipo</label> <!--Columna aws_equipo-->
                        <select id="team" name="aws_equipo">
                            <option value="Miembros">Miembros</option>
                            <option value="Miembros">Oscar</option>
                            <option value="Miembros">Bianca</option>
                            <option value="Miembros">Eleonor</option>
                            <option value="Miembros">Edd</option>
                            <option value="Miembros">Carlos Mar</option>
                            <option value="Miembros">Edgar</option>
                            <option value="Miembros">Juan</option>
                            <option value="Miembros">Neto</option>
                            <option value="Miembros">Omar</option>
                            <option value="Miembros">Kato</option>
                            <option value="Miembros">Alberto</option>

                        </select>
                    <button type="button" class="boton">+</button>
                </div>
            </div>


                <p>Aqui se va a poder agregar a los miembros. Al momento de agregarlos a ellos les tiene 
                    que aparecer en Project_View
                </p>
            </form>
        </section>
</div>

<!-- AGREGAR TAREAS -->
<section class="tasks">
    
        <div class="task-section">
            <h2 class="task-title">Añadir tareas</h2>

            <!-- Formulario para agregar nuevos pendientes -->
            <form action="Project_Details.php?id=<?php echo $aws_id; ?>" method="POST" class="task-form">
                <input type="hidden" name="aws_id" value="<?php echo $aws_id; ?>"> <!-- ID del proyecto actual -->

                <!-- Contenedor para input y botón en línea -->
                <div class="input-button-container">
                    <input class="task-input" type="text" name="pendiente" placeholder="Escribe una nueva tarea..." required>
                    <button type="submit" class="boton-search">Añadir</button>
                </div>
            </form>
           
        </div>
        <div class="Dot">
        <h3>Archivos del Proyecto</h3>

<!-- Formulario para subir archivos -->
<form action="subir_archivo.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="aws_id" value="<?php echo $aws_id; ?>"> <!-- ID del proyecto actual -->
    <div>
        <input type="file" name="archivo" required>
        <button class="boton_search" type="submit">Subir archivo</button>
    </div>
</form>

<!-- Lista de archivos subidos -->
<h4>Lista de Archivos:</h4>
<ul>
    <?php
    // Obtener archivos del proyecto desde la base de datos
    $stmt = $pdo->prepare("SELECT id, nombre_original, ruta FROM aws_archivos WHERE aws_id = ?");
    $stmt->execute([$aws_id]);
    $archivos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($archivos as $archivo):
    ?>
        <li>
            <a href="<?php echo htmlspecialchars($archivo['ruta']); ?>" download>
                <?php echo htmlspecialchars($archivo['nombre_original']); ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
        </div>
         <!-- Lista de pendientes guardados -->
        <div class="pendientes-lista">
            <h3>Lista de pendientes</h3>
            <ul>
                <?php foreach ($pendientes as $pendiente): ?>
                    <li><?php echo htmlspecialchars($pendiente['pendiente_texto']) . " - " . $pendiente['fecha']; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        

        
    
</section>
    

    <!--Pie de la pagina-->
    <footer class="footer">
        <P>Todos los derechos reservados <span>APROY V - BETA</span></P>
    </footer>

    <!--Script para cerrar sesion -->
    <script>
        function confirmarSalida() {
                    if (confirm("¿Deseas cerrar sesion?")) {
                        window.location.href = 'index.php';
                        }
                    }

        function mostrarNotificaciones() {
        alert("Tienes " + <?php echo $num_notificaciones; ?> + " nuevos proyectos.");
            }
    </script>

</body>

</html>