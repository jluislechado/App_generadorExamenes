<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageAsignatura($bd);
$nombre = Request::post("asignatura");
$asignatura = new Asignatura(0, $nombre);
$correcto=Filter::validarAsignatura($asignatura);
if($correcto==true){
    $r = $gestor->insert($asignatura);
    $bd->close();
    header('Location:administrador.php?correcto='.$correcto.'&op=insertado');
}
else{
    header('Location:administrador.php?correcto='.$correcto.'&op=insertado');
}

