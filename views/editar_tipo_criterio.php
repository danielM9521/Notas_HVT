<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<?php
include_once("../controllers/tipo_criterio_controller.php");
$cc = new tipo_criterio_controller();
if(isset($_GET['id_tipo_criterio'])){
  $tipo_criterio = $_GET['id_tipo_criterio'];
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

<form method='post'>
	<table>
		<input type='hidden' name='id_tipo_criterio' value='<?php echo $tipo_criterio->getId_tipo_criterio(); ?>'>
        <input type='hidden' name='action' value='update'>
		<tr>
			<td><label>Nombre:</label></td><td><input type='text' name='nombre' value='<?php echo $tipo_criterio->getNombre(); ?>'></td>
		</tr>
	</table>	
	<input type="submit" name="actualizar" value='Actualizar'>
    <a class="btn btn-warning" href="./index_tipo_criterio.php">Cancelar</a>
</form>












