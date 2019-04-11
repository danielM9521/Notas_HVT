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

<form method='post'>
	<table>
		<input type='hidden' name='id_curso' value='<?php echo $curso->getId_curso(); ?>'>
        <input type='hidden' name='action' value='update'>
		<tr>
			<td><label>Nombre:</label></td><td><input type='text' name='nombre' value='<?php echo $curso->getNombre(); ?>'></td>
		</tr>
	</table>	
	<input type="submit" name="actualizar" value='Actualizar'>
    <a class="btn btn-warning" href="./index_curso.php">Cancelar</a>
</form>












