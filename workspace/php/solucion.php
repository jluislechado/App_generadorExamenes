<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageEjercicio($bd);
$codT = Request::get("codT");
$dificultad = Request::get("dificultad");
$condicion = "codT=$codT and dificultad='$dificultad'";
$numEjercicios = Request::get('numEjercicios');
//$ejercicios=$gestor->getEjercicioPorTemaYdificultad($codT);
$ejercicios = $gestor->selectConCondiciones($condicion);
$soluciones = array();
$i = 0;
foreach ($ejercicios as $indice => $ejercicio) {
    $soluciones[$i] = $ejercicio->getSolucion();
    $i = $i + 1;
}
if ($i >= 6) {
    $ejercicio1 = Request::get('ejercicio1');
    $ejercicio2 = Request::get('ejercicio2');
    $ejercicio3 = Request::get('ejercicio3');
    $ejercicio4 = Request::get('ejercicio4');
    $ejercicio5 = Request::get('ejercicio5');
    $ejercicio6 = Request::get('ejercicio6');
}
$gestorTema = new ManageTema($bd);
$tema = $gestorTema->get($codT);
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
            <div id="cuerpo">
                <div id="limpia2"></div>
                <div id="folio">
                    <div id="limpia3"></div>
                    <h2 id="tituloG">SOLUCIÓN DE EXAMEN DE <?php echo $tema->getNombre(); ?></h2><br/><br/><br/><br/>
                    <div class="tipografia3">
                        <?php
                        if ($i >= 6) {
                            echo "Ejercicio 1.&nbsp;&nbsp;&nbsp;&nbsp; Solución: " . $soluciones[$ejercicio1] . "<br/><br/><br/><br/>";
                            if ($numEjercicios > 1) {
                                echo "Ejercicio 2.&nbsp;&nbsp;&nbsp;&nbsp; Solución: " . $soluciones[$ejercicio2] . "<br/><br/><br/><br/>";
                                if ($numEjercicios > 2) {
                                    echo "Ejercicio 3.&nbsp;&nbsp;&nbsp;&nbsp; Solución: " . $soluciones[$ejercicio3] . "<br/><br/><br/><br/>";
                                    if ($numEjercicios > 3) {
                                        echo "Ejercicio 4.&nbsp;&nbsp;&nbsp;&nbsp; Solución: " . $soluciones[$ejercicio4] . "<br/><br/><br/><br/>";
                                        if ($numEjercicios > 4) {
                                            echo "Ejercicio 5.&nbsp;&nbsp;&nbsp;&nbsp; Solución: " . $soluciones[$ejercicio5] . "<br/><br/><br/><br/>";
                                            if ($numEjercicios > 5) {
                                                echo "Ejercicio 6.&nbsp;&nbsp;&nbsp;&nbsp; Solución: " . $soluciones[$ejercicio6] . "<br/><br/><br/><br/>";
                                            }
                                        }
                                    }
                                }
                            }
                        } else {
                            echo "No hay suficientes ejercicios en la base de datos del tema especificado (mínimo 6)";
                        }
                        ?></div>
                    <a id="solucion" href='index.php'>Volver a página principal</a>
                </div>
            </div>
        </div>
    </body>
</html>
