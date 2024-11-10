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
 

<main>
    <div class="Container">
        <!--Imagen de Login-->
        <img class="imgLogin" src="img/img_login2.png">

        <header>
            <h1 class="titulo">App web de seguimiento <span>RV</span></h1>
        </header>

        <!--Codigo para el formulario-->

        <section class="formulario">


            <form action="login.php" method="POST">
                <fieldset>
                    <legend>¡Bienvenido!</legend>
                    <div class="contenedor-campos">
                        <div class="campo juntos">
                        <label>UserName:</label>
                        <input class="input-text" type="text" name="aws_nombre" placeholder="Ingresa usuario">
                        <label>Password</label>
                        <input class="input-text" type="password" name="aws_password" placeholder="Ingresa password">

                    </div>


                    </div>

                    <div class="alinear-derecha flex campo">

                        <input class="boton btnlogin" type="submit" value="Iniciar sesion">
                    </div>
                    <div>
                        <a href="Change_Password.php">¿Olvidaste la contraseña?</a>
                    </div>
    
                </fieldset>

            </form>
        </section>

        <hr class="line" style="border: none">

        <div class="plogin">
            <p>¿No tienes una cuenta?. <a href="Account.php">Crea una cuenta</a></p>
        </div>

    </div>
</main>

    </div>

    <!--Pie de la pagina-->
    <footer class="footer">
        <P>Todos los derechos reservados <span>APROY</span></P>
    </footer>



</body>

</html>