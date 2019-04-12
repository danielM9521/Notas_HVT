<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<br><br>
<form method="post">
<div class="form-group col-md-6">
    <label for="nombre">Nombre:</label>
    <input  class="form-control" type="text" name="nombre">
    </div>
    <div class="form-group col-md-6">
<label for="id_tipo_criterio">Competencia:</label>

    <select class="form-control" name="id_tipo_criterio">
    <?php 
            include_once("../controllers/tipo_criterio_controller.php"); 
            $rc = new tipo_criterio_controller();
            $tipos = $rc->findAll();
            foreach($tipos as $tipo){?>
                <option value="<?php echo $tipo->getId_tipo_criterio();?>"><?php echo $tipo->getNombre();?></option>
            <?php }
        ?>

    </select>
    </div>
    <input type="submit" class="btn btn-success  boton" value="Guardar" name="guardar">
    <a class="btn btn-info" href="./index_criterio.php">Cancelar</a>
</form>

<?php
if(isset($_POST['guardar'])){
    include_once("../controllers/criterio_controller.php");
    $cc = new criterio_controller();
    $criterio= new Criterio();
    $criterio->setId_criterio(null);
    $criterio->setId_tipo_criterio($_POST['id_tipo_criterio']);
    $criterio->setNombre($_POST['nombre']);
    $cc->save($criterio);
}

?>