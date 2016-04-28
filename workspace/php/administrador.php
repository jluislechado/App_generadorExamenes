<?php
require '../clases/AutoCarga.php';
$bd = new DataBase();
$gestor = new ManageAsignatura($bd);
$asignaturas = $gestor->getList();
$gestorTema = new ManageTema($bd);
$temas = $gestorTema->getList();
$gestorEjercicios = new ManageEjercicio($bd);

$page = Request::get("page");
if ($page === null || $page === "") {
    $page = 1;
}
$registros = $gestorEjercicios->count();
$pages = ceil($registros / Constant::NRPP);

$ejercicios = $gestorEjercicios->getList($page);
//var_dump($bd->getError());
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Generador de exámenes</title>
        <link rel="stylesheet" type="text/css" href="../estilo/estilo.css"/>
    </head>
    <body>
        <div id="contenedora">
            <img src="../recursos/cabecera.png" id="cabecera"/>
            <div>
                <div>
                    <?php
                    $op = Request::get('op');
                    $correcto = Request::get('correcto');
                    $r = Request::get('r');
                    if ($op == 'insertado') {
                        if ($correcto == 'vacio') {
                            echo 'Debe introducir un nombre de asignatura';
                        } else {
                            if ($correcto == true) {
                                echo '1 fila insertada con éxito';
                            } else {
                                if ($correcto == false) {
                                    echo 'La longitud del nombre de asignatura excede los 25 caracteres';
                                }
                            }
                        }
                    }
                    if ($op == 'insertarT') {
                        if ($correcto == 'vacio') {
                            echo 'Debe introducir un nombre de tema';
                        } else {
                            if ($correcto == true) {
                                echo '1 fila insertada con éxito';
                            } else {
                                if ($correcto == false) {
                                    echo 'La longitud del nombre de tema excede los 25 caracteres';
                                }
                            }
                        }
                    }
                    if ($op == 'insertarEA') {
                        if ($correcto == 'vacio') {
                            echo 'Debe introducir un enunciado, una solución y una dificultad';
                        } else {
                            if ($correcto == true) {
                                echo '1 fila insertada con éxito';
                            } else {
                                if ($correcto == false) {
                                    echo 'Enunciado y solución no pueden exceder los 25 caracteres. La dificultad debe ser  baja, media o alta';
                                }
                            }
                        }
                    }
                    if ($op == 'modificarA') {
                        if ($correcto == true) {
                            echo '1 fila insertada con éxito';
                        } else {
                            if ($correcto == false) {
                                echo 'El nombre de asignatura debe tener un máximo de 25 caracteres y un mínimo de 1';
                            }
                        }
                    }
                    if ($op == 'borradoA') {
                        echo 'Se han borrado ' . $r . ' filas';
                    }
                    ?>
                </div>
                <div id="izquierda">
                    <div id="asignaturasA"><h2>ASIGNATURAS</h2></div>
                    <div id="limpia3"></div>
                    <table border="1" id="tablaAsignaturas">
                        <thead>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th></th>
                        <th></th>
                        </thead>
                        <?php foreach ($asignaturas as $key => $asignatura) { ?>
                            <tr>
                                <td><?= $asignatura->getCodA() ?></td>
                                <td><?= $asignatura->getNombre() ?></td>
                                <td>
                                    <a href='editarAsignatura.php?codA=<?= $asignatura->getCodA() ?>&nombreA=<?= $asignatura->getNombre() ?>'>Editar</a> 
                                </td>
                                <td>
                                    <a href='phpEliminarAsignatura.php?codA=<?= $asignatura->getCodA() ?>'>Eliminar</a> 
                                </td>
                            </tr><?php } ?>
                    </table>
                    <div id="limpia3"></div>
                    <form action="phpinsertAsignatura.php" method="POST">
                        <span class="tipografia" id="nA">Nombre de la asignatura: </span>
                        <input type="text" name="asignatura"/>
                        <input type="submit" value="Añadir nueva asignatura" id="boton2"/>
                    </form>

                </div>
                <img src="../recursos/educacion.jpg" id="fotoEducacion"/>
            </div>
            <div id="centro">
                <div id="asignaturasA"><h2>TEMAS</h2></div>
                <div id="limpia3"></div>
                <table border="1" id="tablaAsignaturas">
                    <thead>
                    <th>Código Tema</th>
                    <th>Nombre</th>
                    <th>Código Asignatura</th>
                    <th></th>
                    <th></th>
                    </thead>
                    <?php foreach ($temas as $key => $tema) { ?>
                        <tr>
                            <td><?= $tema->getCodT() ?></td>
                            <td><?= $tema->getNombre() ?></td>
                            <td><?= $tema->getCodA() ?></td>
                            <td>
                                <a href='editarTema.php?codT=<?= $tema->getCodT() ?>&nombreT=<?= $tema->getNombre() ?>&codA=<?= $tema->getCodA() ?>'>Editar</a> 
                            </td>
                            <td>
                                <a href='phpEliminarTema.php?codT=<?= $tema->getCodT() ?>'>Eliminar</a> 
                            </td>
                        </tr><?php } ?>
                </table>
                <div id="limpia3"></div>
                <form action="phpinsertTema.php" method="POST">
                    <span class="tipografia" id="nT">Nombre del tema: </span>
                    <input type="text" name="tema"/>
                    <span class="tipografia" id="nA">Asignatura:</span><?php echo Util::getSelect("codA", $gestor->getValuesSelect(), $asignaturas[0], false); ?><br/>
                    <input type="submit" value="Añadir nuevo tema" id="boton2"/>
                </form>
            </div>

            <div id="centro2">
                <div id="asignaturasA"><h2>EJERCICIOS</h2></div>
                <div id="limpia3"></div>
                <table border="1" id="tablaAsignaturas">
                    <thead>
                    <th>Código Ejercicio</th>
                    <th>Enunciado</th>
                    <th>Solución</th>
                    <th>Dificultad</th>
                    <th>Código Tema</th>
                    <th></th>
                    <th></th>
                    </thead>
                    <?php foreach ($ejercicios as $key => $ejercicio) { ?>
                        <tr>
                            <td><?= $ejercicio->getCodE() ?></td>
                            <td><?= $ejercicio->getEnunciado() ?></td>
                            <td><?= $ejercicio->getSolucion() ?></td>
                            <td><?= $ejercicio->getDificultad() ?></td>
                            <td><?= $ejercicio->getCodT() ?></td>
                            <td>
                                <a href='editarEjercicio.php?codE=<?= $ejercicio->getCodE() ?>&enunciado=<?= $ejercicio->getEnunciado() ?>&solucion=<?= $ejercicio->getSolucion() ?>&dificultad=<?= $ejercicio->getDificultad() ?>&codT=<?= $ejercicio->getCodT() ?>'>Editar</a> 
                            </td>
                            <td>
                                <a href='phpEliminarEjercicio.php?codE=<?= $ejercicio->getCodE() ?>'>Eliminar</a> 
                            </td>
                        </tr><?php } ?>
                </table>
                <div id="paginacion">
                    <a href="?page=1">Primero</a>
                    -                 <a href="?page=<?php echo max(1, $page - 1); ?>">Anterior</a>
                    -                <a href="?page=<?php echo min($page + 1, 407); ?>">Siguiente</a>
                    -                <a href="?page=<?php echo $pages; ?>">Ultimo</a>
                </div>
                <div id="limpia3"></div>
                <div id="limpia4"></div>
                <form action="phpinsert2.php" method="POST">
                    <span class="tipografia" id="textoEI">Introduce el enunciado: </span>
                    <br/><br/><textarea name='enunciado'id="enunciado" cols="100"></textarea><br/>
                    <div id="limpia4"></div>
                    <span class="tipografia" id="textoEI" >Introduce la solución: </span>
                    <br/><br/><textarea name='solucion'id="enunciado" cols="100"></textarea><br/>
                    <div id="limpia4"></div>
                    <span class="tipografia" id="textoEI">Selecciona la dificultad: &nbsp;&nbsp;&nbsp;</span><select name="dificultad">
                        <option value="baja">baja</option>
                        <option value="media">media</option>
                        <option value="alta">alta</option>
                    </select><br/>
                    <div id="limpia4"></div>
                    <span class="tipografia" id="textoEI">Selecciona el tema: &nbsp;&nbsp;&nbsp;</span>
                    <?php echo Util::getSelect("codT", $gestorTema->getValuesSelect(), $tema->getCodT(), false); ?><br/>
                    <input type="submit" value='Insertar ejercicio' id="boton2"/>
                </form>
            </div>

        </div>
    </body>
</html>
