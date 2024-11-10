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
<body class="fondo_password">
    <main>
        <div class="Container_password">
            <header>
                <!--No lleva el titulo-->
            </header>
    
            <!--Codigo para el Register-->
    
            <section class="formulario_password">

                <form>
                    <fieldset>
                        <legend>Cambia tu contraseña</legend>
                        <div class="contenedor-campos">
                            <div class="campo juntos">
                            <label>Correo:</label>
                            <input class="input-text" type="email" placeholder="Correo">
                            <label>New Password:</label>
                            <input class="input-text" type="password" placeholder="....">
                            <label>Confirm Password:</label>
                            <input class="input-text" type="password" placeholder="....">
                            
                        </div>
    
                        <div class="alinear-derecha flex campo">
    
                            <input class="boton btnlogin" type="submit" value="Cambiar Contraseña">
                        </div>
                        
        
                    </fieldset>
    
                </form>
                <div class="btnlogin_return1">
                    <form action="index.php" method="get">
        
                        <input class="boton1" type="submit" value="⬅">
                    </form>
                </div>
              
            </section>
            
        </div>
    </main>
    
        </div>
    
        <!--Pie de la pagina-->
        <footer class="footer">
            <P>Todos los derechos reservados <span>APROY</span></P>
        </footer>
    
</body>
</html>