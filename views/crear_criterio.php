<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<br><br>
<form method="post" class="cont">
<h3>  NUEVO CRITERIO </h3>
<div class="card">
        <div class="card-body">
<div class="form-group  ">
    <label for="nombre">Nombre:</label>
    <input  class="form-control" type="text" name="nombre"   pattern="([a-zA-ZÑñáéíóúÁÉÍÓÚ ]{3,30}\s*)+" required placeholder="Ej.Identifica sus  fortalezas y  aspectos a mejorar ">
    </div>
    <div class="form-group ">
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
    <div class="trans"> 
    <input type="submit" class="btn btn-success  btn-responsive btninter " value="Guardar" name="guardar">
    <a class="btn btn-info btn-responsive btninter  boton " href="./index_criterio.php">Cancelar</a>
            </div> 
            </div>
            </div>
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