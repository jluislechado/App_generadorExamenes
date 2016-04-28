<?php

require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageTema($bd);
$codT = Request::get("codT");
$r = $gestor->delete($codT);
$bd->close();
header("Location:administrador.php");

