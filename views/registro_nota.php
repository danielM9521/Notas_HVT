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
        <div class="col-xl-1"></div>
        <div class="col-xl-10">
            <form method="post">
                <div class="card">
                    <div class="card-header">
                        <div class="form-row">
                            <div class="form-group col-xl-2">
                                <img class="img-responsive img-rounded" src="./images/kriete.png" width="80%" alt="Logo de Fundación Gloria de Kriete">
                            </div>
                            <div class="form-group col-xl-8">
                                <p class="titulo">Ficha de seguimiento y evaluación de competencias del módulo de Habilidades para la vida y el trabajo</p>
                            </div>
                            <div class="form-group col-xl-2">
                                <img class="img-responsive img-rounded" style="margin-top:25%;" src="./images/usaid2.png" width="100%" alt="Logo de USAID">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-xl-6">
                                <label for="sede" class="ficha">Sede:</label>
                                <input type="email" class="form-control ficha" id="sede" value="<?php echo $cohorte->getId_sede(); ?>" disabled>
                            </div>
                            <div class="form-group col-xl-6">
                                <label for="inputPassword4" class="ficha">Materia:</label>
                                <input type="text" class="form-control ficha" id="materia" value="HABILIDADES PARA LA VIDA Y EL TRABAJO" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-xl-4">
                                <label for="id_curso" class="ficha">Curso:</label>
                                <input class="form-control ficha" type="text" name="id_curso" value="<?php echo $cohorte->getId_curso(); ?>" disabled style="margin-right:2%;">
                            </div>
                            <div class="form-group col-xl-4">
                                <label for="fecha_inicio" class="ficha">Fecha de inicio del curso:</label>
                                <input class="form-control ficha" name="fecha_inicio" type="date" value="<?php echo $cohorte->getFecha_inicio(); ?>" disabled style="margin-right:2%;">
                            </div>
                            <div class="form-group col-xl-4">
                                <label for="fecha_fin" class="ficha">Fecha de finalización del curso:</label>
                                <input class="form-control ficha" type="date" name="fecha_fin" value="<?php echo $cohorte->getFecha_fin(); ?>" disabled>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-xl-6">
                                <label for="fecha_llenado_inicio" class="ficha">Fecha de llenado al inicio:</label>
                                <input class="form-control " name="fecha_llenado_inicio" type="date" required>
                            </div>
                            <div class="form-group col-xl-6">
                                <label for="fecha_llenado_fin" class="ficha">Fecha de llenado al final:</label>
                                <input class="form-control " type="date" name="fecha_llenado_fin" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-xl-12">
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
            </form>
        </div>
    </div>
</body>