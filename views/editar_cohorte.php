<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
    <?php
    include_once("../controllers/cohorte_controller.php");
    $cc = new cohorte_controller();
    if (isset($_GET['id_cohorte'])) {
        $id_cohorte = $_GET['id_cohorte'];
        $cohorte = $cc->findById($id_cohorte);
    } else {
        header("location:index_cohorte.php");
    }

    if (isset($_POST) && !empty($_POST)) {
        $c = new Cohorte();
        $c->setId_cohorte($_POST['id_cohorte']);
        $c->setNombre($_POST['nombre']);
        $c->setFecha_inicio($_POST['fecha_inicio']);
        $c->setFecha_fin($_POST['fecha_fin']);
        $c->setId_sede($_POST['id_sede']);
        $c->setId_curso($_POST['id_curso']);
        $c->setEstado($_POST['estado']);
        $cc->update($c);
    }
    ?>
    <br><br>
    <form method='post'>
        <table>
            <input type='hidden' name='id_cohorte' value='<?php echo $cohorte->getId_cohorte(); ?>'>
            <div class="form-group col-md-6">
            <label>Nombre:</label>
                <input class="form-control" type='text' name='nombre' value='<?php echo $cohorte->getNombre(); ?>'>
            </div>  
            <div class="form-group col-md-6">
           <label>Fecha de inicio:</label>
            <input  class="form-control"type='date' name='fecha_inicio' value='<?php echo $cohorte->getFecha_inicio(); ?>'>
            </div>
            <div class="form-group col-md-6">
                <label>Fecha de finalización:</label>
                <input class="form-control" type='date' name='fecha_fin' value='<?php echo $cohorte->getFecha_fin(); ?>'>
                </div>
                <div class="form-group col-md-6">
                <label>Sede:</label>
                
                    <select class="form-control" name="id_sede">
                        <?php
                        include_once("../controllers/sede_controller.php");
                        $sc = new sede_controller();
                        $sedes = $sc->findAll();
                        foreach ($sedes as $sede) { ?>
                            <option value="<?php echo $sede->getId_sede(); ?>" <?php if ($sede->getId_sede() == $cohorte->getId_sede()) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $sede->getNombre(); ?></option>
                        <?php }
                    ?>
                

                </select>
                </div>
    <div class="form-group col-md-6">
    <label>Curso:</label>
                
                    <select  class="form-control" name="id_curso">
                        <?php
                        include_once("../controllers/curso_controller.php");
                        $cc = new curso_controller();
                        $cursos = $cc->findAll();
                        foreach ($cursos as $curso) { ?>
                            <option value="<?php echo $curso->getId_curso(); ?>" <?php if ($curso->getId_curso() == $cohorte->getId_curso()) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $curso->getNombre(); ?></option>
                        <?php }
                    ?>
                
                                                                            </select>
                                                                            </div>
                <div class="form-group col-md-6">
                <label>Estado:</label>
                <input type="radio" name="estado" value="1" <?php if ($cohorte->getEstado() == 1) {
                                                                    echo "checked";
                                                                } ?>>Activo
                    <input type="radio" name="estado" value="0" <?php if ($cohorte->getEstado() == 0) {
                                                                    echo "checked";
                                                                } ?>>Inactivo
            </div>

        	<input type="submit"  class="btn btn-success boton" name="actualizar" value='Actualizar'>
    <a class="btn btn-warning" href="./index_cohorte.php">Cancelar</a>
    </form>