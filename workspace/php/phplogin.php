<?php

require '../clases/AutoCarga.php';
 $usuarios = array(
     "admin" => "admin",
 );
 
 $nick = Request::post("nick");
 $contrasena = Request::post("contrasena");
 if($nick=="admin" &&$contrasena=="admin")
 {
     header("Location:administrador.php");
 }
 else{
     header("Location:contrasenaInvalida.php");
 }
