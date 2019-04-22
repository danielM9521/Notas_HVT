<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<?php
include_once("../controllers/tipo_criterio_controller.php");
$cc = new tipo_criterio_controller();
if(isset($_GET['id_tipo_criterio'])){
  $id_tipo_criterio = $_GET['id_tipo_criterio'];
  $tipo_criterio = $cc->findById($id_tipo_criterio);
}else{
  header("location:index_tipo_criterio.php");
}

if (isset($_POST) && !empty($_POST)) {
  $c = new Tipo_criterio();
  $c->setId_tipo_criterio($_POST['id_tipo_criterio']);
  $c->setNombre($_POST['nombre']);
  $cc->update($c);
}
?>
<br><br>
<form method='post' class="cont">
<h3>  EDITAR COMPETENECIAS </h3>
<div class="card">
<div class="card-body">
	
		<input type='hidden' name='id_tipo_criterio' value='<?php echo $tipo_criterio->getId_tipo_criterio(); ?>'>
        <input type='hidden' name='action' value='update'>
        <div class="form-group ">
	<label>Nombre:</label>
  <input type='text'  class="form-control" name='nombre'  pattern="([a-zA-Z]{3,40}\s*)+" value='<?php echo $tipo_criterio->getNombre(); ?>'>
		</div>
		
    <div class="trans"> 
	<input type="submit" class="btn btn-warning  btn-responsive btninter " name="actualizar" value='Actualizar'>
    <a class="btn btn-info btn-responsive btninter  boton" href="./index_tipo_criterio.php">Cancelar</a>
</div>
</div>
</div>
</form>












