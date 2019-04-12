<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<?php
include_once("../controllers/rol_controller.php");
$cc = new rol_controller();
if(isset($_GET['id_rol'])){
  $id_rol = $_GET['id_rol'];
  $rol = $cc->findById($id_rol);
}else{
  header("location:index_rol.php");
}

if (isset($_POST) && !empty($_POST)) {
  $c = new rol();
  $c->setId_rol($_POST['id_rol']);
  $c->setNombre($_POST['nombre']);
  $cc->update($c);
}
?>
<br><br>
<form method='post' class="cont">
<h3>  EDITAR ROL </h3>
<div class="card">
<div class="card-body">
		<input type='hidden' name='id_rol' value='<?php echo $rol->getId_rol(); ?>'>
        <input type='hidden' name='action' value='update'>
        <div class="form-group ">
  <label>Nombre:</label>
  <input type='text' name='nombre'class="form-control" value='<?php echo $rol->getNombre(); ?>'>
</div>
		
  <div class="trans"> 
	<input type="submit" class="btn btn-warning  btn-responsive btninter " name="actualizar" value='Actualizar'>
    <a class="btn btn-info btn-responsive btninter  boton" href="./index_rol.php">Cancelar</a>
</div>
</div>
</div>

</form>












