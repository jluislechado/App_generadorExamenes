<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageTema($bd);
$nombre = Request::post("tema");
$codA=  Request::post('codA');
$tema = new Tema(0, $nombre,$codA);
$correcto=Filter::validarTema($tema);
if($correcto==true){
    $r = $gestor->insert($tema);
    $bd->close();
    header('Location:administrador.php?correcto='.$correcto.'&op=insertarT');
}else{
    header('Location:administrador.php?correcto='.$correcto.'&op=insertarT');
}


