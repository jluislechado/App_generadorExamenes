<?php
require '../clases/AutoCarga.php';
$codE = Request::get('codE');
$enunciado = Request::get('enunciado');
$solucion = Request::get('solucion');
$dificultad = Request::get('dificultad');
$codT = Request::get('codT');
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
                <div id="limpia4"></div>
                <form action="phpEditarEjercicio.php" method="POST">
                    <input type="hidden" name="codT" value="<?php echo $codT ?>"/>
                    <input type="hidden" name="codE" value="<?php echo $codE ?>"/>
                    <span class="tipografia" id="textoE">Enunciado:</span><br/><br/>
                    <textarea id="enunciado" cols="50"><?php echo $enunciado ?></textarea><br/>
                    <div id="limpia4"></div>
                    <span class="tipografia" id="textoE">Solucion:</span><br/><br/>
                    <textarea id="enunciado" cols="50"><?php echo $solucion ?></textarea><br/>
                    <div id="limpia4"></div>
                    <span class="tipografia" id="textoE">Dificultad:</span>
                    <select name="dificultad">
                        <option value="baja">baja</option>
                        <option value="media">media</option>
                        <option value="alta">alta</option>
                    </select>
                    <input type="submit" value="Modificar" id="boton"/>
                </form>
            </div>
            <img src="../recursos/educacion.jpg" id="fotoEducacion"/>
        </div>
    </body>
</html>
