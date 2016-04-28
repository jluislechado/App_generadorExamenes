<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Generador de exámenes</title>
        <link rel="stylesheet" type="text/css" href="../estilo/estilo.css"/>
    </head>
    <body>
        <form method="post" action="phplogin.php">
            <div id="contenedora">
                <img src="../recursos/cabecera.png" id="cabecera"/>
                <div id="izquierda">
                    <div id="capaUsuario">

                        <span>Nick:</span>
                        <input type="text" placeholder="nick" name="nick" class="input"/>

                    </div>
                    <div id="capaContrasena">

                        <span>Contrasena:</span>
                        <input type="password" placeholder="contrasena" name="contrasena" class="input"/>

                    </div>
                    <div id="entrar">

                        <input type="submit" value="Entrar" id="boton"/>

                    </div>
                    </form>
                </div>
                <img src="../recursos/educacion.jpg" id="fotoEducacion"/>
            </div>
    </body>
</html>
