<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageTema($bd);
/* ¿Quien es el usuario que intenta insertar? / Validación de datos */
$codT = Request::post("codT");
$nombre = Request::post("nombre");
$codA=  Request::post('$codA');
$tema = new Tema($codT,$nombre,$codA);
$r = $gestor->set($tema);
$bd->close();

header("Location:administrador.php?r=$r");