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
</head>
<body>
    <div class="container1">
        <div class="grid1">
            <header>
            
                <h1 class="titulo">App web de <br> seguimiento<span> RV<span></h1>
   
            </header>
        </div>

                <div class="move_boton">
                    <button class="boton">Crear <i class="icon-save"></i></button>
                </div> 
        
            <div class="grid2">
                <div class="form-group">
                    
                        <label for="project-name">Nombre del Proyecto</label>
                        <input type="text" id="project-name" placeholder="Nombre...">
                    
                </div>
            </div>
            
            <div class="grid3">
                <div class="form-group">
                    <label for="project-director">Director de Proyecto</label>
                    <input type="text" id="project-director" placeholder="Nombre...">
                </div>
            
            </div>

            <div class="grid4">
                <div class="form-group ">
                
                    <label for="start-date">Fecha inicio</label>
                    <input type="date" id="start-date" placeholder="mm/dd/yyyy">
            
                </div>
            </div>

            <div class="grid5">
                <div class="form-group">
                
                    <label for="end-date">Fecha fin</label>
                    <input type="date" id="end-date" placeholder="mm/dd/yyyy">
                </div>
            </div>

            <div class="grid6">
                <div class="form-group">
                
                    <label for="team">Equipo</label>
                    <select id="team">
                        <option>Miembros</option>
                    </select>
                    <button class="boton">+</button>
                </div>
            </div>

            <div class="grid7">
                <div class="form-group">
                
                    <label for="status">Estado</label>
                    <select id="status">
                        <option>Activo</option>
                        <option>Desactivado</option>
                    </select>
                </div>
            </div>
           
      
        <div class="grid8">
            <aside class="notifications">
            
                <button class="boton">Notificaciones <i class="icon-bell"></i></button>
                <!--<i class="icon-settings"></i>
                <div class="profile-pic"></div>-->
                <div class="btnlogin_return">
                    <form action="index.php" method="get">

                        <input class="boton1" type="submit" value="⬅">
                    </form>
                </div>
            
            </aside>
        </div>
            
        </div>
        <!--APARTADO DE LISTA DE PROYECTOS-->
        <!--Aun no esta terminado-->
        <h2><i class="icon-menu"></i> Listado de proyectos</h2>
        
        <div class="project-list">
          
            <div class="project-row">
                <span class="project-id">231</span>
                <input type="text" class="project-name" value="Proyecto 1">
                <input type="text" class="project-director" value="Carlos Ivan...">
                <input type="date" class="start-date" value="2024-08-15">
                <input type="date" class="end-date" value="2024-09-10">
                <select class="status">
                    <option>Finalizado</option>
                    <option>Activo</option>
                </select>
                <div class="action-icons">
                    <button class="edit-button">✏️</button>
                    <button class="delete-button">🗑️</button>
                    <button class="notification-button1">🔔</button>
                </div>
            </div>
            
            <div class="project-row">
                <span class="project-id">123</span>
                <input type="text" class="project-name" value="Proyecto 2">
                <input type="text" class="project-director" value=".......">
                <input type="date" class="start-date" placeholder="mm/dd/yyyy">
                <input type="date" class="end-date" placeholder="mm/dd/yyyy">
                <select class="status">
                    <option>Activo</option>
                    <option>Finalizado</option>
                </select>
                <div class="action-icons">
                    <button class="edit-button">✏️</button>
                    <button class="delete-button">🗑️</button>
                    <button class="notification-button1">🔔</button>
                </div>
            </div>
            <!-- Añadir más filas aquí -->
        </div>
    </div>
</body>
</html>