<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageAsignatura($bd);
$asignaturas = $gestor->getList();
//var_dump($bd->getError());
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
                <h3 class="tipografia" id="tituloA">Selecciona la asignatura:</h3>
                <?php
                foreach ($asignaturas as $indice => $asignatura) {
                    echo '<div class="asignaturas"><a href="insertar.php?codA=' . $asignatura->getCodA() . '">' . $asignatura->getNombre() . '</a></div>';
                    echo "<br>";
                }
                ?>
            </div>
            <img src="../recursos/educacion.jpg" id="fotoEducacion"/>
        </div>
    </body>
</html>
