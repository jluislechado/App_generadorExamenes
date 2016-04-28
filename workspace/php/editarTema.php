<?php
require '../clases/AutoCarga.php';
$codT = Request::get('codT');
$nombre = Request::get('nombreT');
$codA = Request::get('codA');
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
                    <h3>Introduzca el nuevos valores del tema</h3><br/><br/>
                    <form action="phpEditarTema.php" method="POST">
                        <input type="hidden" name="codT" value="<?php echo $codT ?>"/>
                        <input type="hidden" name="codA" value="<?php echo $codA ?>"/>
                        <span>Nombre:</span><input type="text" name="nombre" value="<?php echo $nombre ?>" size="25"/>
                        <input type="submit" value="Modificar" id="boton"/>
                    </form>
                </div>
            </div>
            <img src="../recursos/educacion.jpg" id="fotoEducacion"/>
        </div>
    </body>
</html>
