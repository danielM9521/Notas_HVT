<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<?php
include_once("../controllers/nota_controller.php");
$cs = new nota_controller();
if(isset($_GET['id_nota'])){
  $id_nota = $_GET['id_nota'];
  $nota = $cs->findById($id_nota);
}else{
  header("location:index_nota.php");
}

if (isset($_POST) && !empty($_POST)) {
  $s = new Nota();
     $s->setId_nota($_POST['id_nota']);
     $s->setNombre_materia($_POST['nombre_materia']);
     $s->setId_criterio($_POST['id_criterio']);
     $s->setNota_inicio($_POST['nota_inicio']);
     $s->setNota_fin($_POST['nota_fin']);
     $s->setFecha_llenado_inicio($_POST['fecha_llenado_inicio']);
     $s->setFecha_llenado_fin($_POST['fecha_llenado_fin']);
     $s->setId_alumno($_POST['id_alumno']);
     $s->setId_usuario($_POST['id_usuario']);
  $cs->update($s);
}
?>
<form method='post'>
	<table>
		<input type='hidden' name='id_nota' value='<?php echo $nota->getId_nota(); ?>'>
        <input type='hidden' name='action' value='update'>
		<tr>
			<td><label>Materia:</label></td><td><input type='text' name='nombre_materia' value='<?php echo $nota->getNombre_materia(); ?>'></td>
		</tr>
        <tr>
			<td><label>Criterio:</label></td><td><input type='text' name='id_criterio' value='<?php echo $nota->getId_criterio(); ?>'></td>
		</tr>
        <tr>
			<td><label>Nota Inicio:</label></td><td><input type='number' name='nota_inicio' value='<?php echo $nota->getNota_inicio(); ?>'></td>
		</tr>
        <tr>
			<td><label>Nota Fin:</label></td><td><input type='number' name='nota_fin' value='<?php echo $nota->getNota_fin(); ?>'></td>
		</tr>
        <tr>
			<td><label>Fecha Llenado Inicio:</label></td><td><input type='date' name='fecha_llenado_inicio' value='<?php echo $nota->getFecha_llenado_inicio(); ?>'></td>
		</tr>
        <tr>
			<td><label>Fecha Llenado Fin:</label></td><td><input type='date' name='fecha_llenado_fin' value='<?php echo $nota->getFecha_llenado_fin(); ?>'></td>
		</tr>
        <tr>
			<td><label>Alumno:</label></td><td><input type='text' name='id_alumno' value='<?php echo $nota->getId_alumno(); ?>'></td>
		</tr>
        <tr>
			<td><label>Evaluador:</label></td><td><input type='text' name='id_usuario' value='<?php echo $nota->getId_usuario(); ?>'></td>
		</tr>



	</table>	
	<input type="submit" name="actualizar" value='Actualizar'>
    <a class="btn btn-warning" href="./index_nota.php">Cancelar</a>
</form>












