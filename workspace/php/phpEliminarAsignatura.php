<?php

require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageAsignatura($bd);
$codA = Request::get("codA");
$r = $gestor->delete($codA);
$bd->close();
header("Location:administrador.php?op=borradoA&r=$r");

