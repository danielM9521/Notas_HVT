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
<br><br>
<form method='post'>
	
		<input type='hidden' name='id_sede' value='<?php echo $sede->getId_sede(); ?>'>
        <input type='hidden' name='action' value='update'>

<div class="form-group col-md-6">
      <label for="nombre">Nombre:</label>
      <input class="form-control" type='text' name='nombre'  value='<?php echo $sede->getNombre(); ?>'>
</div>

<div class="form-group col-md-6">
      <label for="telefono">Teléfono:</label>
      <input class="form-control" type='text' name='telefono' value='<?php echo $sede->getTelefono(); ?>'>
</div>
<div class="form-group col-md-6">
      <label>Dirección:</label>
      <input class="form-control" type='text' name='direccion' value='<?php echo $sede->getDireccion(); ?>'>
</div>
<div class="form-group col-md-6">
      <label>Correo:</label>
      <input class="form-control" type='text' name='correo' value='<?php echo $sede->getCorreo(); ?>'>
</div>
      <div class="form-group col-md-6">
      <label>Departamento:</label>
      <input class="form-control" type='text' name='departamento' value='<?php echo $sede->getDepartamento(); ?>'>
</div> 
<div class="form-group col-md-6">
      <label>Municipio:</label>
      <input class="form-control" type='text' name='municipio' value='<?php echo $sede->getMunicipio(); ?>'>
</div>
    
    
	</table>	
	<input type="submit"  class="btn btn-success boton" name="actualizar" value='Actualizar'>
    <a class="btn btn-info" href="./index_sede.php">Cancelar</a>
</form>












