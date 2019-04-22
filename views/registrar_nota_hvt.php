<?php require_once("../header.php"); ?>
<link rel="stylesheet" href="./css/style.css">
<?php
    //Para llenar la tabla con los alumnos
    include_once("../controllers/cohorte_controller.php");
    $cc = new cohorte_controller();
    if (isset($_GET['id_cohorte'])) {
        $id_cohorte = $_GET['id_cohorte'];
        $cohorte = $cc->findById2($id_cohorte);
    } else {
        header("location:../index.php");
    }
    ?>
<body>
    <?php require_once("../navbar.php"); ?>
    <div class="container" style="margin-top:2%;">
        <div class="row justify-content-xl-center">
            <div class="col-xl-10">
                <form action="hoja_evaluacion_hvt.php" method="post">
                    <input type="hidden" name="id_cohorte" value="<?php echo $cohorte->getId_cohorte(); ?>">
                    <div class="card">
                        <div class="card-header">
                            <div class="form-row">
                                <div class="form-group col-xl-2">
                                    <img class="img-responsive img-rounded" src="./images/kriete.png" width="50%"
                                        alt="Logo de Fundación Gloria de Kriete">
                                </div>
                                <div class="form-group col-xl-8">
                                    <p class="titulo">Ficha de seguimiento y evaluación de competencias del módulo de
                                        Habilidades para la vida y el trabajo</p>
                                </div>
                                <div class="form-group col-xl-2">
                                    <img class="img-responsive img-rounded" style="margin-top:25%;"
                                        src="./images/usaid2.png" width="100%" alt="Logo de USAID">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-xl-6">
                                    <label for="sede" class="ficha">Sede:</label>
                                    <input type="email" class="form-control ficha" id="sede"
                                        value="<?php echo $cohorte->getId_sede(); ?>"
                                        disabled>
                                </div>
                                <div class="form-group col-xl-6">
                                    <label for="inputPassword4" class="ficha">Materia:</label>
                                    <input type="text" name="nombre_materia" class="form-control ficha" id="materia"
                                        value="HABILIDADES PARA LA VIDA Y EL TRABAJO" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-xl-4">
                                    <label for="id_curso" class="ficha">Curso:</label>
                                    <input class="form-control ficha" type="text" name="id_curso"
                                        value="<?php echo $cohorte->getId_curso(); ?>"
                                        disabled style="margin-right:2%;">
                                </div>
                                <div class="form-group col-xl-4">
                                    <label for="fecha_inicio" class="ficha">Fecha de inicio del curso:</label>
                                    <input class="form-control ficha" name="fecha_inicio" type="date"
                                        value="<?php echo $cohorte->getFecha_inicio(); ?>"
                                        disabled style="margin-right:2%;">
                                </div>
                                <div class="form-group col-xl-4">
                                    <label for="fecha_fin" class="ficha">Fecha de finalización del curso:</label>
                                    <input class="form-control ficha" type="date" name="fecha_fin"
                                        value="<?php echo $cohorte->getFecha_fin(); ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-xl-6">
                                    <label for="fecha_llenado_inicio" class="ficha">Fecha de llenado al inicio:</label>
                                    <input class="form-control" min="<?php echo $cohorte->getFecha_inicio(); ?>" max="<?php echo $cohorte->getFecha_fin(); ?>" name="fecha_llenado_inicio" type="date" required>
                                </div>
                                <div class="form-group col-xl-6">
                                    <label for="fecha_llenado_fin" class="ficha">Fecha de llenado al final:</label>
                                    <input class="form-control" min="<?php echo $cohorte->getFecha_inicio(); ?>" max="<?php echo $cohorte->getFecha_fin(); ?>" type="date" name="fecha_llenado_fin" required>
                                </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-xl-3"></div>
                                <div class="form-group col-xl-3">
                                <input type="submit" class="btn btn-success  btn-responsive form-control" name="evaluar"
                                        value='Ir a hoja de evaluación'>
                                </div>
                                <div class="form-group col-xl-3">
                                        <a class="btn btn-warning btn-responsive form-control" href="../home.php">Cancelar</a>
                                </div>    
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>