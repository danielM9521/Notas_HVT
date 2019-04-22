<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<br><br>
<form method="post" class="cont">
<h3>  NUEVA COMPETENCIA </h3>
<div class="card">
<div class="card-body">
<div class="form-group ">
    <label for="nombre">Nombre:</label>
    <input class="form-control" type="text" name="nombre"  pattern="([a-zA-ZÑñáéíóúÁÉÍÓÚ ]{3,40}\s*)+" placeholder="Ej. Adaptación al cambio" required>
    </div>
    <div class="trans"> 
    <input type="submit" class="btn btn-success  btn-responsive btninter " value="Guardar" name="guardar">
    <a class="btn btn-info btn-responsive btninter  boton " href="./index_tipo_criterio.php">Cancelar</a>
            </div> 
            </div>
            </div>
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