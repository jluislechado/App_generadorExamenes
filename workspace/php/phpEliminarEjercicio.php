<?php

require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageEjercicio($bd);
$codE = Request::get("codE");
$r = $gestor->delete($codE);
$bd->close();
header("Location:administrador.php");
