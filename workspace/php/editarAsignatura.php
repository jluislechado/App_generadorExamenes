<?php
require '../clases/AutoCarga.php';
$codA = Request::get('codA');
$nombre = Request::get('nombreA');
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Generador de exámenes</title>
        <link rel="stylesheet" type="text/css" href="../estilo/estilo.css"/>
    </head>
    <body>
        <div id="contenedora">
            <img src="../recursos/cabecera.png" id="cabecera"/>
            <div id="izquierda">
                <div id="cosa">
                <h3>Introduzca los nuevos valores de la asignatura</h3><br/><br/>
                <form action="phpEditarAsignatura.php" method="POST">
                    <input type="hidden" name="codA" value="<?php echo $codA ?>"/>
                    <span>Nombre:</span><input type="text" name="nombre" value="<?php echo $nombre ?>"/>
                    <input type="submit" value="Modificar" id="boton"/>
                </form>
                </div>
            </div>
            <img src="../recursos/educacion.jpg" id="fotoEducacion"/>
        </div>
    </body>
</html>
