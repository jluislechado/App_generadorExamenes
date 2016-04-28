<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageEjercicio($bd);
$enunciado = Request::post("enunciado");
$solucion = Request::post("solucion");
$dificultad = Request::post("dificultad");
$codT = Request::post("codT");
$ejercicio = new Ejercicio(0, $enunciado, $solucion, $dificultad, $codT);
$correcto=Filter::validarEjercicio($ejercicio);
if($correcto==true){
    $r = $gestor->insert($ejercicio);
    $bd->close();
    header('Location:administrador.php?correcto='.$correcto.'&op=insertarEA');
}else{
    header('Location:administrador.php?correcto='.$correcto.'&op=insertarEA');
    $bd->close();
}

