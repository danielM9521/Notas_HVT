<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<br><br>
<form method="post">
<div class="form-group col-md-6">
    <label for="nombre">Nombre:</label>
    <input class="form-control" type="text" name="nombre">
    </div>
    <input  type="submit" class="btn btn-success  boton" value="Guardar" name="guardar">
    <a class="btn btn-info" href="./index_tipo_criterio.php">Cancelar</a>
</form>

<?php
if(isset($_POST['guardar'])){
    include_once("../controllers/tipo_criterio_controller.php");
    $cc = new tipo_criterio_controller();
    $tipo_criterio= new tipo_criterio();
    $tipo_criterio->setId_tipo_criterio(null);
    $tipo_criterio->setNombre($_POST['nombre']);
    $cc->save($tipo_criterio);
}

?>