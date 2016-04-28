<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageTema($bd);
$codA = Request::get("codA");
//$tema = $gestor->getPorAsignatura($codA);
$condicion = "codA=$codA";
$temas = $gestor->etiquetaSelect2($condicion);
//echo "<br/>".$temas[0];
//var_dump($gestorCountry->getValuesSelect());
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
                <div id="limpia"></div>
                <form action="generado.php" method="POST">
                    <div class="tema"><span class="tipografia">Indica la dificultad: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><?php echo Util::getSelect("codT", $gestor->etiquetaSelect($condicion), $temas[0], false); ?></div>
                    <div class="tema"><span class="tipografia" class="tema">Indica el nivel de dificultad: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><select name="dificultad">
                            <option value="baja">baja</option>
                            <option value="media">media</option>
                            <option value="alta">alta</option>
                        </select></div>
                    <div class="tema"><span class="tipografia">Indica el numero de ejercicios: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><select name="numEjercicios">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select></div>
                        <!--<div class="tema"><span class="tipografia" class="tema">Indica el número de ejercicios:</span><input type="number" name="numEjercicios"/></div>-->
                    <input type="submit" value="Generar examen" id="boton"/>
                </form>
            </div>
            <img src="../recursos/educacion.jpg" id="fotoEducacion"/>
        </div>
    </body>
</html>
