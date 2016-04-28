<?php

require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageAsignatura($bd);
/* ¿Quien es el usuario que intenta insertar? / Validación de datos */
$codA = Request::post("codA");
$nombre = Request::post("nombre");
$asignatura = new Asignatura($codA, $nombre);
$correcto = Filter::validarAsignaturam($asignatura);
echo $correcto;
if ($correcto == true) {
    echo 'entro';
    $r = $gestor->set($asignatura);
    $bd->close();
    header('Location:administrador.php?correcto=' . $correcto . '&op=modificarA');
} else {
    header('Location:administrador.php?correcto=' . $correcto . '&op=modificarA');
}
//echo $r;
//var_dump($bd->getError());



