<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageTema($bd);
$codA = Request::get("codA");
$tema = $gestor->getPorAsignatura($codA);
$condicion = "codA=$codA";
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
                <form action="phpinsert.php" method="POST">
                    <span class="tipografia" id="textoE">Introduce el enunciado: </span>
                    <br/><br/><textarea name='enunciado'id="enunciado" cols="50"></textarea><br/>
                    <div id="limpia4"></div>
                    <span class="tipografia" id="textoE" >Introduce la solución: </span>
                    <br/><br/><textarea name='solucion'id="enunciado" cols="50"></textarea><br/>
                    <div id="limpia4"></div>
                    <span class="tipografia" id="textoE">Selecciona la dificultad: &nbsp;&nbsp;&nbsp;</span><select name="dificultad">
                        <option value="baja">baja</option>
                        <option value="media">media</option>
                        <option value="alta">alta</option>
                    </select><br/>
                    <div id="limpia4"></div>
                    <span class="tipografia" id="textoE">Selecciona el tema: &nbsp;&nbsp;&nbsp;</span>
                    <?php echo Util::getSelect("codT", $gestor->etiquetaSelect($condicion), $tema->getCodT(), false); ?><br/>
                    <input type="submit" value='Insertar ejercicio' id="boton"/>
                </form>
            </div>
            <img src="../recursos/educacion.jpg" id="fotoEducacion"/>
        </div>
    </body>
</html>
