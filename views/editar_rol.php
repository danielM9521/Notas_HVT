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

<form method='post'>
	<table>
		<input type='hidden' name='id_rol' value='<?php echo $rol->getId_rol(); ?>'>
        <input type='hidden' name='action' value='update'>
		<tr>
			<td><label>Nombre:</label></td><td><input type='text' name='nombre' value='<?php echo $rol->getNombre(); ?>'></td>
		</tr>
	</table>	
	<input type="submit" name="actualizar" value='Actualizar'>
    <a class="btn btn-warning" href="./index_rol.php">Cancelar</a>
</form>












