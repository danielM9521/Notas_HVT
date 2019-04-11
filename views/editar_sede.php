<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<?php
include_once("../controllers/sede_controller.php");
$cs = new sede_controller();
if(isset($_GET['id_sede'])){
  $id_sede = $_GET['id_sede'];
  $sede = $cs->findById($id_sede);
}else{
  header("location:index_sede.php");
}

if (isset($_POST) && !empty($_POST)) {
  $s = new Sede();
  $s->setId_sede($_POST['id_sede']);
  $s->setNombre($_POST['nombre']);
  $s->setTelefono($_POST['telefono']);
  $s->setDireccion($_POST['direccion']);
  $s->setCorreo($_POST['correo']);
  $s->setDepartamento($_POST['departamento']);
  $s->setMunicipio($_POST['municipio']);
  $cs->update($s);
}
?>
<form method='post'>
	<table>
		<input type='hidden' name='id_sede' value='<?php echo $sede->getId_sede(); ?>'>
        <input type='hidden' name='action' value='update'>
		<tr>
			<td><label>Nombre:</label></td><td><input type='text' name='nombre' value='<?php echo $sede->getNombre(); ?>'></td>
		</tr>
	</table>	
	<input type="submit" name="actualizar" value='Actualizar'>
    <a class="btn btn-warning" href="./index_curso.php">Cancelar</a>
</form>












