<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageEjercicio($bd);
$codT = Request::post("codT");
$dificultad = Request::post("dificultad");
$condicion = "codT=$codT and dificultad='$dificultad'";
$numEjercicios = Request::post('numEjercicios');
//$ejercicios=$gestor->getEjercicioPorTemaYdificultad($codT);
$ejercicios = $gestor->selectConCondiciones($condicion);
$enunciados = array();
$i = 0;
foreach ($ejercicios as $indice => $ejercicio) {
    $enunciados[$i] = $ejercicio->getEnunciado();
    $i = $i + 1;
}
if ($i >= 6) {
    $ejercicio1 = rand(0, $i - 1);
    $ejercicio2 = rand(0, $i - 1);
    while ($ejercicio2 == $ejercicio1) {
        $ejercicio2 = rand(0, $i - 1);
    }
    $ejercicio3 = rand(0, $i - 1);
    while ($ejercicio3 == $ejercicio1 || $ejercicio3 == $ejercicio2) {
        $ejercicio3 = rand(0, $i - 1);
    }
    $ejercicio4 = rand(0, $i - 1);
    while ($ejercicio4 == $ejercicio1 || $ejercicio4 == $ejercicio2 || $ejercicio4 == $ejercicio3) {
        $ejercicio4 = rand(0, $i - 1);
    }
    $ejercicio5 = rand(0, $i - 1);
    while ($ejercicio5 == $ejercicio1 || $ejercicio5 == $ejercicio2 || $ejercicio5 == $ejercicio3 || $ejercicio5 == $ejercicio4) {
        $ejercicio5 = rand(0, $i - 1);
    }
    $ejercicio6 = rand(0, $i - 1);
    while ($ejercicio6 == $ejercicio1 || $ejercicio6 == $ejercicio2 || $ejercicio6 == $ejercicio3 || $ejercicio6 == $ejercicio4 || $ejercicio6 == $ejercicio5) {
        $ejercicio6 = rand(0, $i - 1);
    }
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
                    <h2 id="tituloG">EXAMEN DE <?php echo $tema->getNombre(); ?></h2><br/><br/><br/><br/>
                    <div class="tipografia3"><?php
                        if ($i >= 6) {
                            echo "Ejercicio 1: " . $enunciados[$ejercicio1] . "<br/><br/><br/><br/>";
                            if ($numEjercicios > 1) {
                                echo "Ejercicio 2: " . $enunciados[$ejercicio2] . "<br/><br/><br/><br/>";
                                if ($numEjercicios > 2) {
                                    echo "Ejercicio 3: " . $enunciados[$ejercicio3] . "<br/><br/><br/><br/>";
                                    if ($numEjercicios > 3) {
                                        echo "Ejercicio 4: " . $enunciados[$ejercicio4] . "<br/><br/><br/><br/>";
                                        if ($numEjercicios > 4) {
                                            echo "Ejercicio 5: " . $enunciados[$ejercicio5] . "<br/><br/><br/><br/>";
                                            if ($numEjercicios > 5) {
                                                echo "Ejercicio 6: " . $enunciados[$ejercicio6] . "<br/><br/><br/><br/>";
                                            }
                                        }
                                    }
                                }
                            }
                        } else {
                            echo "No hay suficientes ejercicios en la base de datos del tema especificado (mínimo 6)";
                        }
                        ?></div>
                    <a id="solucion" href='solucion.php?codT= <?php echo $codT ?>&dificultad=<?php echo $dificultad ?>&numEjercicios=<?php echo $numEjercicios ?>&ejercicio1=<?php echo $ejercicio1 ?>&ejercicio2=<?php echo $ejercicio2 ?>&ejercicio3=<?php echo $ejercicio3 ?>&ejercicio4=<?php echo $ejercicio4 ?>&ejercicio5=<?php echo $ejercicio5 ?>&ejercicio6=<?php echo $ejercicio6 ?>'>Obtener solución</a>
                </div>
            </div>
        </div>
    </body>
</html>
