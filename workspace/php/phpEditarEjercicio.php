<?php

require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageEjercicio($bd);
/* ¿Quien es el usuario que intenta insertar? / Validación de datos */
$codE = Request::post("codE");
$enunciado = Request::post("enunciado");
$solucion = Request::post('solucion');
$dificultad = Request::post('dificultad');
$codT = Request::post('codT');
$ejercicio = new Ejercicio($codE, $enunciado, $solucion, $dificultad, $codT);
$r = $gestor->set($ejercicio);
$bd->close();

header("Location:administrador.php?r=$r");

