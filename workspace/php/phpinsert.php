<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageEjercicio($bd);
$enunciado = Request::post("enunciado");
$solucion = Request::post("solucion");
$dificultad = Request::post("dificultad");
$codT = Request::post("codT");
$ejercicio = new Ejercicio(0, $enunciado, $solucion, $dificultad, $codT);
$correcto=Filter::validarEjercicioUsuario($ejercicio);

if($correcto==true){
    $r = $gestor->insert($ejercicio);
    $bd->close();
   header("Location:insertadoExito.php?op=insert&r=$r"); 
}
else{
    header("Location:noInsertado.php");
    $bd->close();
}
//echo $r;
//var_dump($bd->getError());
//header("Location:index.php?op=insert&r=$r");
