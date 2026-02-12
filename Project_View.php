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
<body>

    <div class="nav-bg">

        <nav class="navegacion-principal contenedor">
            <h2 class="titulo_nav">App web de <br> seguimiento<span> RV<span></h2>
                <div class="botones-nav">
                    <button type="button" class="icono-img1" onclick="mostrarNotificaciones()">
                      
                    </button>
                    <!-- <div id="notificationPopup" class="notification-popup">No hay notificaciones</div> -->
                    <button type="button" class="icono-img" onclick="confirmarSalida()"> </button>
                </div>
        </nav>
    </div>

    <div>

    
        
                <!--Alta proyectos-->
        <form class="container1" action="alta_proyecto.php" method="POST" onsubmit="return validarFormulario();">
            <div class="grid1">
                <!-- <header>
            
                    <h1 class="titulo">App web de <br> seguimiento<span> RV<span></h1>
   
                </header> -->
            </div>
                <!-- Boton que crea los proyectos -->
                <div class="grid7">
                    <button type="submit" class="boton">Crear <i class="icon-save"></i></button>
                </div> 
        
            <div class="grid2">
                <div class="form-group">
                    
                        <label for="project-name">Nombre del Proyecto</label>
                        <input type="text" id="project-name" name="aws_nombrePro" placeholder="Nombre...">
                    
                </div>
            </div>
            
            <div class="grid3">
                <div class="form-group">
                    <label for="project-director">Director de Proyecto</label>
                    <input type="text" id="project-director" name="aws_nombreDir" placeholder="Nombre...">
                </div>
            
            </div>

            <div class="grid4">
                <div class="form-group ">
                
                    <label for="start-date">Fecha inicio</label>
                    <input type="date" id="start-date" name="aws_fechaInicio" placeholder="mm/dd/yyyy">
            
                </div>
            </div>

            <div class="grid5">
                <div class="form-group">
                
                    <label for="end-date">Fecha fin</label>
                    <input type="date" id="end-date" name="aws_fechaFin" placeholder="mm/dd/yyyy">
                </div>
            </div>

            

            <div class="grid6">
                <div class="form-group">
                
                    <label for="status">Estado</label>  <!--Columna aws_estado-->
                    <select id="status" name="aws_estado">
                        <option value= 1>Activo</option>
                        
                    </select>
                </div>
            </div>
       
           
      
           
        </form>
            
        </div>
        <!--APARTADO DE LISTA DE PROYECTOS-->
       
        <h2><i class="icon-menu"></i> Listado de proyectos</h2>

        <!--Busqueda de proyectos-->
            <div class="search-container">
                <form method="POST" action="Project_View.php">
                    <input type="text" name="search" placeholder="Buscar proyecto..." >
                    <button class="boton-search" type="submit">Buscar</button>
                </form>
            </div>

        <!-- Codigo para consulta proyectos -->
        <?php
        
            // // Conexión al archivo para conectar la base de datos
            require 'config.php';


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

        <!-- Tabla de proyectos -->
        <div class="project-list">
            <?php if (!empty($proyectos)): ?>
                <?php foreach ($proyectos as $proyecto): ?>
                    <div class="project-row">
                        
                        <input type="text" class="project-name" value="<?php echo htmlspecialchars($proyecto['aws_nombrePro']); ?>" readonly>
                        <input type="text" class="project-director" value="<?php echo htmlspecialchars($proyecto['aws_nombreDir']); ?>" readonly>
                        <input type="date" class="start-date" value="<?php echo htmlspecialchars($proyecto['aws_fechaInicio']); ?>" readonly>
                        <input type="date" class="end-date" value="<?php echo htmlspecialchars($proyecto['aws_fechaFin']); ?>" readonly>
                        <select class="status" disabled>
                            <option <?php if ($proyecto['aws_estado'] === 2) echo 'selected'; ?>>Finalizado</option>
                            <option <?php if ($proyecto['aws_estado'] === 1) echo 'selected'; ?>>Activo</option>
                        </select>

                        <div class="action-icons">
                            <button class="edit-button" onclick="window.location.href='Project_Details.php?id=<?php echo $proyecto['aws_id']; ?>'"></button>
                            <button class="delete-button" onclick="deleteProject(<?php echo $proyecto['aws_id']; ?>)"></button>
                            
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <h3>No hay nada por aqui 🤓</h3>
            <?php endif; ?>
        </div>
        
    </div>
            
        <!--Funcionalidades JavaScript-->
            <script>
                function deleteProject(projectId) {
                    if (confirm("¿Estás seguro de que deseas eliminar este proyecto?")) {
                    window.location.href = `Project_Delete.php?aws_id=${projectId}`;
                    }
                }

                function validarFormulario() {
                    const nombreProyecto = document.getElementById("project-name").value.trim();
                    const directorProyecto = document.getElementById("project-director").value.trim();
                    const fechaInicio = document.getElementById("start-date").value.trim();
                    const fechaFin = document.getElementById("end-date").value.trim();
                    // const equipo = document.getElementById("team").value.trim();

                    if (!nombreProyecto || !directorProyecto || !fechaInicio || !fechaFin || !equipo) {
                        alert("Por favor, completa todos los campos antes de crear un proyecto.");
                        return false; // Evita el envío del formulario
                        }
                    
                    return true; // Permite el envío del formulario si todo está completo
                    
                        }           
                       
                function confirmarSalida() {
                    if (confirm("¿Deseas cerrar sesion?")) {
                        window.location.href = 'index.php';
                        }
                    }
                // function toggleNotification() {
                //         var popup = document.getElementById("notificationPopup");
                //         popup.classList.toggle("show"); // Alterna la clase "show" para mostrar u ocultar
                //     }
                function mostrarNotificaciones() {
                        alert("Tienes " + <?php echo $num_notificaciones; ?> + " nuevos proyectos.");
                    }
            </script>
            <!--Pie de la pagina-->
    <footer class="footer">
        <P>Todos los derechos reservados <span>APROY V - BETA</span></P>
    </footer>

</body>
</html>