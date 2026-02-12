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
<main>
    <div class="Container_register">
        <!--Imagen de Account-->
        <img class="imgLogin" src="img/register.png">

        <header>
            <h1 class="titulo">App web de seguimiento <span>RV</span></h1>
        </header>

        <!--Codigo para el Register-->

        <section class="formulario_register">



            <form action="register.php" method="POST" onsubmit="return validarFormulario();">
                <fieldset>
                    <legend>Registrarse</legend>
                    <div class="contenedor-campos">
                        <div class="campo juntos">
                        <label>Nombre:</label>
                        <input class="input-text" type="text" name="aws_nombre" placeholder="Ingresa usuario">
                        <label>Correo:</label>
                        <input class="input-text" type="email" name="aws_correo" placeholder="Ingresa correo">
                        <label>Password:</label>
                        <input class="input-text" type="password" name="aws_password" placeholder="Ingresa password">
                        <!-- <label>Confirmar Password:</label>
                        <input class="input-text" type="password" name="confirm_password" placeholder="Confirmar password"> -->
                    </div>

                    <div class="alinear-derecha flex campo">

                        <input class="boton btnlogin" type="submit" value="Registrarse">
                    </div>
                    
    
                </fieldset>

            </form>
          
        </section>
        
        <!--Boton para redirigir a la pantalla de Login-->
        <div class="btnlogin_return">
            <form action="index.php" method="get">

                <input class="boton1" type="submit" value="⬅">
            </form>
        </div>


    </div>
</main>
 
    </div>
    

    <!--Pie de la pagina-->
    <footer class="footer">
        <P>Todos los derechos reservados <span>APROY V - BETA</span></P>
    </footer>

    <script>
        function validarFormulario() {
            const nombre = document.getElementById('aws_nombre').value.trim();
            const correo = document.getElementById('aws_correo').value.trim();
            const password = document.getElementById('aws_password').value.trim();
            // const confirmPassword = document.getElementById('confirm_password').value.trim();

            if (!nombre || !correo || !password) {
                alert("Por favor, completa todos los campos antes de registrarte.");
                return false; 
                }
            return true; 
        }
    </script>

</body>

</html>