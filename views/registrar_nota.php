<?php require_once("../header.php"); ?>
<link rel="stylesheet" href="./css/style.css">

<body>
    <?php require_once("../navbar.php"); ?>
    <?php
    //Para llenar la tabla con los alumnos
    include_once("../controllers/alumno_controller.php");
    include_once("../controllers/cohorte_controller.php");
    $ac = new alumno_controller();
    $cc = new cohorte_controller();
    if (isset($_GET['id_cohorte'])) {
        $id_cohorte = $_GET['id_cohorte'];
        $cohorte = $cc->findById2($id_cohorte);
        $alumnos = $ac->findByCohorte($id_cohorte);
        $cantidadAlumnos = count($alumnos);
    } else {
        header("location:../index.php");
    }
    $contador = 1; //Para el correlativo de los estudiantes
    //Para llenar la tabla con los criterio de evaluación
    include_once("../controllers/tipo_criterio_controller.php");
    $cr = new tipo_criterio_controller();
    $tipos = $cr->findAll();
    //Para llenar la tabla con los criterio de evaluación
    include_once("../controllers/criterio_controller.php");
    $cco = new criterio_controller();
    $criterios1 = $cco->findByTipoCriterio(1);
    $criterios2 = $cco->findByTipoCriterio(2);
    $criterios3 = $cco->findByTipoCriterio(3);
    $criterios4 = $cco->findByTipoCriterio(4);
    $criterios5 = $cco->findByTipoCriterio(5);
    $criterios6 = $cco->findByTipoCriterio(6);
    $criterios7 = $cco->findByTipoCriterio(7);
    $criterios8 = $cco->findByTipoCriterio(8);
    ?>
    <div class="row">
        <div class="col-xl-12">
        <form method="post">
            <div class="card">
                <div class="card-body">
                    <div class="col-xl-11" style="margin-left:4%; margin-right:4%">
                        
                            <div class="form-group">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="titulo">Ficha de seguimiento y evaluación de competencias Módulo HVT
                                        </p><br>



                                        <label for="id_sede">Sede:</label>
                                        <input class="form-control" style="width:28%;" type="text" name="id_sede" value="<?php echo $cohorte->getId_sede(); ?>" disabled style="margin-right:2%;">


                                        <label for="materia">Materia: </label>
                                        <input class="form-control" name="materia" style="width:28%;" id="materia" type="text" value="Habilidades para la vida y el trabajo" disabled>
                                        <br><br>



                                        <label for="id_curso">Curso:</label>
                                        <input class="form-control" type="text" style="width:28%;" name="id_curso" value="<?php echo $cohorte->getId_curso(); ?>" disabled style="margin-right:2%;">
                                        <label for="fecha_inicio">Fecha de inicio del curso:</label>
                                        <input class="form-control" style="width:28%;" name="fecha_inicio" type="date" value="<?php echo $cohorte->getFecha_inicio(); ?>" disabled style="margin-right:2%;">
                                        <label for="fecha_fin">Fecha de finalización del curso:</label>
                                        <input class="form-control" style="width:28%;" type="date" name="fecha_fin" value="<?php echo $cohorte->getFecha_fin(); ?>" disabled>
                                        <br><br>
                                        <label for="fecha_llenado_inicio" style="margin-left:14%;">Fecha de llenado al inicio:</label>
                                        <input class="form-control" style="width:28%;" name="fecha_llenado_inicio" type="date" style="margin-right:2%;" required>
                                        <label for="fecha_llenado_fin">Fecha de llenado al final:</label>
                                        <input class="form-control" type="date" style="width:28%;" name="fecha_llenado_fin" required>
                                        <br><br>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">

                                    <h5>Referencias de puntaje a asignar</h5>
                                    <a class="btn btn-info" data-toggle="collapse" data-target="#puntaje">Ver
                                        más</a>
                                    <div id="puntaje" class="collapse">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <th class="referencia">1</th>
                                                    <td class="referencia2">Demuestra ningún / muy escaso dominio de
                                                        la habilidad/competencia evaluada.
                                                        No se observa/no
                                                        se infiere de la actuación del participante (no la tiene, ni
                                                        en proceso, ni
                                                        incorporada).
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="referencia">2</th>
                                                    <td class="referencia2">Demuestra un dominio parcial de la
                                                        habilidad/competencia evaluada. En
                                                        proceso / medianamente
                                                        incorporada, ya sea en el discurso o en la práctica.</td>
                                                </tr>
                                                <tr>
                                                    <th class="referencia">3</th>
                                                    <td class="referencia2">Demuestra un amplio dominio (en discurso
                                                        y práctica) de la
                                                        habilidad/competencia evaluada.
                                                        Habilidad/competencia incorporada.</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    </div>

    <hr class="divisor">

    <div class="card">
        <div class="card-body">

            <div class="col-xl-11" style="margin-left:4%; margin-right:4%;">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link  active" href="#1" role="tab" data-toggle="tab" aria-selected="true">1.
                                    Gestionar
                                    el desarrollo personal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#2" role="tab" data-toggle="tab">2. Comunicar con
                                    efectividad</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#3" role="tab" data-toggle="tab">3. Identificar
                                    oportunidades</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#4" role="tab" data-toggle="tab" aria-selected="true">4.
                                    Pensar y
                                    actuar
                                    de manera creativa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#5" role="tab" data-toggle="tab">5. Traducir ideas en un plan
                                    de
                                    acción</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#6" role="tab" data-toggle="tab">6. Trabajar de manera
                                    colaborativa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#7" role="tab" data-toggle="tab" aria-selected="true">7.
                                    Actuar con
                                    iniciativa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#8" role="tab" data-toggle="tab">8. Adaptacion al cambio</a>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="card-body">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="1">
                            <!-- Contenido de la primer tab -->
                            <div class="col-xl-12">
                                <form>
                                    <div class="form-group">
                                        <table class="tablac1 table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="criterios" colspan="2">
                                                        Listado de jóvenes</th>
                                                    <?php foreach ($criterios1 as $criterio1) {
                                                        echo '<th colspan="2" class="criterios">' . $criterio1->getNombre() . '</th>';
                                                    } ?>
                                                    <th rowspan="2" class="criterios">Diferencia</th>
                                                </tr>
                                                <tr>
                                                    <th class="criterios" width="25px;">N°</th>
                                                    <th class="criterios" width="400px;">Nombre completo</th>
                                                    <th class="criterios">Nota inicio</th>
                                                    <th class="criterios">Nota fin</th>
                                                    <th class="criterios">Nota inicio</th>
                                                    <th class="criterios">Nota fin</th>
                                                    <th class="criterios">Nota inicio</th>
                                                    <th class="criterios">Nota fin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $j = 1;
                                                foreach ($alumnos as $alumno) {
                                                    echo '<td class="criterios">' . $j . '</td><td class="nombres">' . $alumno->getNombre() . '</td><td class="notas"><input  type="number" min="1" step="1" max="3"  name="nota_inicio_11"></td><td class="notas"><input type="number" min="1" step="1" max="3" name="nota_fin_11"></td><td class="notas"><input  min="1" step="1" max="3" type="number" name="nota_inicio_12"></td><td class="notas"><input min="1" step="1" max="3" type="number"  name="nota_fin_12"></td><td class="notas"><input min="1" step="1" max="3" type="number"  name="nota_inicio_13"></td><td class="notas"><input min="1" step="1" max="3" type="number" name="nota_fin_13"></td><td class="notas"><input min="1" step="1" max="3" type="number" name="diferencia' . $j . '"></td></tr>';
                                                    $j++;
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>




                        <div role="tabpanel" class="tab-pane" id="2">
                            <!-- Contenido de la primer tab -->
                            <div class="col-xl-12">
                                <form>
                                    <div class="form-group">
                                        <table class="tablac1 table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="criterios" colspan="2">
                                                        Listado de jóvenes</th>
                                                    <?php foreach ($criterios2 as $criterio2) {
                                                        echo '<th colspan="2" class="criterios">' . $criterio2->getNombre() . '</th>';
                                                    } ?>
                                                    <th rowspan="2" class="criterios">Diferencia</th>
                                                </tr>
                                                <tr>
                                                    <th class="criterios" width="25px;">N°</th>
                                                    <th class="criterios" width="400px;">Nombre completo</th>
                                                    <th class="criterios">Nota inicio</th>
                                                    <th class="criterios">Nota fin</th>
                                                    <th class="criterios">Nota inicio</th>
                                                    <th class="criterios">Nota fin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $j = 1;
                                                foreach ($alumnos as $alumno) {
                                                    echo '<td class="criterios">' . $j . '</td><td class="nombres">' . $alumno->getNombre() . '</td><td class="notas"><input  type="number" min="1" step="1" max="3"  name="nota_inicio_' . ($j . $criterio2->getId_criterio() - 1) . '"></td><td class="notas"><input type="number" min="1" step="1" max="3" name="nota_fin_' . ($j . $criterio2->getId_criterio() - 1) . '"></td><td class="notas"><input  min="1" step="1" max="3" type="number" name="nota_inicio_' . ($j . $criterio2->getId_criterio()) . '"></td><td class="notas"><input min="1" step="1" max="3" type="number"  name="nota_fin_' . ($j . $criterio2->getId_criterio()) . '"></td><td class="notas"><input min="1" step="1" max="3" type="number"  name="diferencia' . ($cantidadAlumnos + $j) . '"></td></tr>';
                                                    $j++;
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>



                        <div role="tabpanel" class="tab-pane" id="3">
                            <!-- Contenido de la primer tab -->
                            <div class="col-xl-12">
                                <form>
                                    <div class="form-group">
                                        <table class="tablac1 table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="criterios" colspan="2">
                                                        Listado de jóvenes</th>
                                                    <?php foreach ($criterios3 as $criterio3) {
                                                        echo '<th colspan="2" class="criterios">' . $criterio3->getNombre() . '</th>';
                                                    } ?>
                                                    <th rowspan="2" class="criterios">Diferencia</th>
                                                </tr>
                                                <tr>
                                                    <th class="criterios" width="25px;">N°</th>
                                                    <th class="criterios" width="400px;">Nombre completo</th>
                                                    <th class="criterios">Nota inicio</th>
                                                    <th class="criterios">Nota fin</th>
                                                    <th class="criterios">Nota inicio</th>
                                                    <th class="criterios">Nota fin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $j = 1;
                                                foreach ($alumnos as $alumno) {
                                                    echo '<td class="criterios">' . $j . '</td><td class="nombres">' . $alumno->getNombre() . '</td><td class="notas"><input  type="number" min="1" step="1" max="3"  name="nota_inicio_' . ($j . $criterio3->getId_criterio() - 1) . '"></td><td class="notas"><input type="number" min="1" step="1" max="3" name="nota_fin_' . ($j . $criterio3->getId_criterio() - 1) . '"></td><td class="notas"><input  min="1" step="1" max="3" type="number" name="nota_inicio_' . ($j . $criterio3->getId_criterio()) . '"></td><td class="notas"><input min="1" step="1" max="3" type="number"  name="nota_fin_' . ($j . $criterio3->getId_criterio()) . '"></td><td class="notas"><input min="1" step="1" max="3" type="number"  name="diferencia' . ($cantidadAlumnos + $cantidadAlumnos + $j) . '"></td></tr>';
                                                    $j++;
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>




                        <div role="tabpanel" class="tab-pane" id="4">
                            <!-- Contenido de la primer tab -->
                            <div class="col-xl-12">
                                <form>
                                    <div class="form-group">
                                        <table class="tablac1 table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="criterios" colspan="2">
                                                        Listado de jóvenes</th>
                                                    <?php foreach ($criterios4 as $criterio4) {
                                                        echo '<th colspan="2" class="criterios">' . $criterio4->getNombre() . '</th>';
                                                    } ?>
                                                    <th rowspan="2" class="criterios">Diferencia</th>
                                                </tr>
                                                <tr>
                                                    <th class="criterios" width="25px;">N°</th>
                                                    <th class="criterios" width="400px;">Nombre completo</th>
                                                    <th class="criterios">Nota inicio</th>
                                                    <th class="criterios">Nota fin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $j = 1;
                                                foreach ($alumnos as $alumno) {
                                                    echo '<td class="criterios">' . $j . '</td><td class="nombres">' . $alumno->getNombre() . '</td><td class="notas"><input  type="number" min="1" step="1" max="3"  name="nota_inicio_' . ($j . $criterio4->getId_criterio() - 1) . '"></td><td class="notas"><input type="number" min="1" step="1" max="3" name="nota_fin_' . ($j . $criterio4->getId_criterio() - 1) . '"></td><td class="notas"><input min="1" step="1" max="3" type="number"  name="diferencia' . ($cantidadAlumnos + $cantidadAlumnos + $cantidadAlumnos + $j) . '"></td></tr>';
                                                    $j++;
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div role="tabpanel" class="tab-pane" id="5">
                            <!-- Contenido de la primer tab -->
                            <div class="col-xl-12">
                                <form>
                                    <div class="form-group">
                                        <table class="tablac1 table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="criterios" colspan="2">
                                                        Listado de jóvenes</th>
                                                    <?php foreach ($criterios5 as $criterio5) {
                                                        echo '<th colspan="2" class="criterios">' . $criterio5->getNombre() . '</th>';
                                                    } ?>
                                                    <th rowspan="2" class="criterios">Diferencia</th>
                                                </tr>
                                                <tr>
                                                    <th class="criterios" width="25px;">N°</th>
                                                    <th class="criterios" width="400px;">Nombre completo</th>
                                                    <th class="criterios">Nota inicio</th>
                                                    <th class="criterios">Nota fin</th>
                                                    <th class="criterios">Nota inicio</th>
                                                    <th class="criterios">Nota fin</th>
                                                    <th class="criterios">Nota inicio</th>
                                                    <th class="criterios">Nota fin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $j = 1;
                                                foreach ($alumnos as $alumno) {
                                                    echo '<td class="criterios">' . $j . '</td><td class="nombres">' . $alumno->getNombre() . '</td><td class="notas"><input  type="number" min="1" step="1" max="3"  name="nota_inicio_' . ($j . $criterio5->getId_criterio() - 2) . '"></td><td class="notas"><input type="number" min="1" step="1" max="3" name="nota_fin_' . ($j . $criterio5->getId_criterio() - 2) . '"></td><td class="notas"><input  min="1" step="1" max="3" type="number" name="nota_inicio_' . ($j . $criterio5->getId_criterio() - 1) . '"></td><td class="notas"><input min="1" step="1" max="3" type="number"  name="nota_fin_' . ($j . $criterio5->getId_criterio() - 1) . '"></td><td class="notas"><input min="1" step="1" max="3" type="number"  name="nota_inicio_' . ($j . $criterio5->getId_criterio()) . '"></td><td class="notas"><input min="1" step="1" max="3" type="number" name="nota_fin_' . ($j . $criterio5->getId_criterio()) . '"></td><td class="notas"><input min="1" step="1" max="3" type="number" name="diferencia' . ($cantidadAlumnos + $cantidadAlumnos + $cantidadAlumnos + $cantidadAlumnos + $j) . '"></td></tr>';
                                                    $j++;
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>



                        <div role="tabpanel" class="tab-pane" id="6">
                            <!-- Contenido de la primer tab -->
                            <div class="col-xl-12">
                                <form>
                                    <div class="form-group">
                                        <table class="tablac1 table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="criterios" colspan="2">
                                                        Listado de jóvenes</th>
                                                    <?php foreach ($criterios6 as $criterio6) {
                                                        echo '<th colspan="2" class="criterios">' . $criterio6->getNombre() . '</th>';
                                                    } ?>
                                                    <th rowspan="2" class="criterios">Diferencia</th>
                                                </tr>
                                                <tr>
                                                    <th class="criterios" width="25px;">N°</th>
                                                    <th class="criterios" width="400px;">Nombre completo</th>
                                                    <th class="criterios">Nota inicio</th>
                                                    <th class="criterios">Nota fin</th>
                                                    <th class="criterios">Nota inicio</th>
                                                    <th class="criterios">Nota fin</th>
                                                    <th class="criterios">Nota inicio</th>
                                                    <th class="criterios">Nota fin</th>
                                                    <th class="criterios">Nota inicio</th>
                                                    <th class="criterios">Nota fin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $j = 1;
                                                foreach ($alumnos as $alumno) {
                                                    echo '<td class="criterios">' . $j . '</td><td class="nombres">' . $alumno->getNombre() . '</td><td class="notas"><input  type="number" min="1" step="1" max="3"  name="nota_inicio_' . ($j . $criterio6->getId_criterio() - 3) . '"></td><td class="notas"><input type="number" min="1" step="1" max="3" name="nota_fin_' . ($j . $criterio6->getId_criterio() - 3) . '"></td><td class="notas"><input  min="1" step="1" max="3" type="number" name="nota_inicio_' . ($j . $criterio6->getId_criterio() - 2) . '"></td><td class="notas"><input min="1" step="1" max="3" type="number"  name="nota_fin_' . ($j . $criterio6->getId_criterio() - 2) . '"></td><td class="notas"><input min="1" step="1" max="3" type="number"  name="nota_inicio_' . ($j . $criterio6->getId_criterio() - 1) . '"></td><td class="notas"><input min="1" step="1" max="3" type="number" name="nota_fin_' . ($j . $criterio6->getId_criterio() - 1) . '"></td><td class="notas"><input min="1" step="1" max="3" type="number"  name="nota_inicio_' . ($j . $criterio6->getId_criterio()) . '"></td><td class="notas"><input min="1" step="1" max="3" type="number" name="nota_fin_' . ($j . $criterio6->getId_criterio()) . '"></td><td class="notas"><input min="1" step="1" max="3" type="number" name="diferencia' . ($cantidadAlumnos + $cantidadAlumnos + $cantidadAlumnos + $cantidadAlumnos + $cantidadAlumnos + $j) . '"></td></tr>';
                                                    $j++;
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>




                        <div role="tabpanel" class="tab-pane" id="7">
                            <!-- Contenido de la primer tab -->
                            <div class="col-xl-12">
                                <form>
                                    <div class="form-group">
                                        <table class="tablac1 table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="criterios" colspan="2">
                                                        Listado de jóvenes</th>
                                                    <?php foreach ($criterios7 as $criterio7) {
                                                        echo '<th colspan="2" class="criterios">' . $criterio7->getNombre() . '</th>';
                                                    } ?>
                                                    <th rowspan="2" class="criterios">Diferencia</th>
                                                </tr>
                                                <tr>
                                                    <th class="criterios" width="25px;">N°</th>
                                                    <th class="criterios" width="400px;">Nombre completo</th>
                                                    <th class="criterios">Nota inicio</th>
                                                    <th class="criterios">Nota fin</th>
                                                    <th class="criterios">Nota inicio</th>
                                                    <th class="criterios">Nota fin</th>
                                                    <th class="criterios">Nota inicio</th>
                                                    <th class="criterios">Nota fin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $j = 1;
                                                foreach ($alumnos as $alumno) {
                                                    echo '<td class="criterios">' . $j . '</td><td class="nombres">' . $alumno->getNombre() . '</td><td class="notas"><input  type="number" min="1" step="1" max="3"  name="nota_inicio_' . ($j . $criterio7->getId_criterio() - 2) . '"></td><td class="notas"><input type="number" min="1" step="1" max="3" name="nota_fin_' . ($j . $criterio7->getId_criterio() - 2) . '"></td><td class="notas"><input  min="1" step="1" max="3" type="number" name="nota_inicio_' . ($j . $criterio7->getId_criterio() - 1) . '"></td><td class="notas"><input min="1" step="1" max="3" type="number"  name="nota_fin_' . ($j . $criterio7->getId_criterio() - 1) . '"></td><td class="notas"><input min="1" step="1" max="3" type="number"  name="nota_inicio_' . ($j . $criterio7->getId_criterio()) . '"></td><td class="notas"><input min="1" step="1" max="3" type="number" name="nota_fin_' . ($j . $criterio7->getId_criterio()) . '"></td><td class="notas"><input min="1" step="1" max="3" type="number" name="diferencia' . ($cantidadAlumnos + $cantidadAlumnos + $cantidadAlumnos + $cantidadAlumnos + $cantidadAlumnos + $cantidadAlumnos + $j) . '"></td></tr>';
                                                    $j++;
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>




                        <div role="tabpanel" class="tab-pane" id="8">
                            <!-- Contenido de la primer tab -->
                            <div class="col-xl-12">
                                <form>
                                    <div class="form-group">
                                        <table class="tablac1 table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="criterios" colspan="2">
                                                        Listado de jóvenes</th>
                                                    <?php foreach ($criterios8 as $criterio8) {
                                                        echo '<th colspan="2" class="criterios">' . $criterio8->getNombre() . '</th>';
                                                    } ?>
                                                    <th rowspan="2" class="criterios">Diferencia</th>
                                                </tr>
                                                <tr>
                                                    <th class="criterios" width="25px;">N°</th>
                                                    <th class="criterios" width="400px;">Nombre completo</th>
                                                    <th class="criterios">Nota inicio</th>
                                                    <th class="criterios">Nota fin</th>
                                                    <th class="criterios">Nota inicio</th>
                                                    <th class="criterios">Nota fin</th>
                                                    <th class="criterios">Nota inicio</th>
                                                    <th class="criterios">Nota fin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $j = 1;
                                                foreach ($alumnos as $alumno) {
                                                    echo '<td class="criterios">' . $j . '</td><td class="nombres">' . $alumno->getNombre() . '</td><td class="notas"><input  type="number" min="1" step="1" max="3"  name="nota_inicio_' . ($j . $criterio8->getId_criterio() - 2) . '"></td><td class="notas"><input type="number" min="1" step="1" max="3" name="nota_fin_' . ($j . $criterio8->getId_criterio() - 2) . '"></td><td class="notas"><input  min="1" step="1" max="3" type="number" name="nota_inicio_' . ($j . $criterio8->getId_criterio() - 1) . '"></td><td class="notas"><input min="1" step="1" max="3" type="number"  name="nota_fin_' . ($j . $criterio8->getId_criterio() - 1) . '"></td><td class="notas"><input min="1" step="1" max="3" type="number"  name="nota_inicio_' . ($j . $criterio8->getId_criterio()) . '"></td><td class="notas"><input min="1" step="1" max="3" type="number" name="nota_fin_' . ($j . $criterio8->getId_criterio()) . '"></td><td class="notas"><input min="1" step="1" max="3" type="number" name="diferencia' . ($cantidadAlumnos + $cantidadAlumnos + $cantidadAlumnos + $cantidadAlumnos + $cantidadAlumnos + $cantidadAlumnos + $cantidadAlumnos + $j) . '"></td></tr>';
                                                    $j++;
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-12" style="margin-left: 25%;"><input type="submit" class="btn btn-success  boton" value="Guardar" name="guardar">
                        <a class="btn btn-danger" href="../index.php">Cancelar</a></div>


                </div>
            </div>
        
        </form>
        </div>
    </div>

</body>