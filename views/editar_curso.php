<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<?php
include_once("../controllers/curso_controller.php");
$cc = new curso_controller();
if(isset($_GET['id_curso'])){
  $id_curso = $_GET['id_curso'];
  $curso = $cc->findById($id_curso);
}else{
  header("location:index_curso.php");
}

if (isset($_POST) && !empty($_POST)) {
  $c = new Curso();
  $c->setId_curso($_POST['id_curso']);
  $c->setNombre($_POST['nombre']);
  $cc->update($c);
}
?>
<br><br>
<form method='post' class="cont">
<h3>  EDITAR CURSO </h3>
<div class="card">
<div class="card-body">
	
		<input type='hidden' name='id_curso' value='<?php echo $curso->getId_curso(); ?>'>
        <input type='hidden' name='action' value='update'>
        <div class="form-group ">
        <label>Nombre:</label>
        <input type='text'  class="form-control"  name='nombre'  pattern="([\D]{1,30}\s*)+"  value='<?php echo $curso->getNombre(); ?>'>
</div>
		
<div class="trans"> 
	<input type="submit" class="btn btn-warning  btn-responsive btninter " name="actualizar" value='Actualizar'>
    <a class="btn btn-info btn-responsive btninter  boton" href="./index_curso.php">Cancelar</a>
</div>
</div>
</div>
</form>












