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
<form method='post' class="cont">
<h3>  EDITAR SEDE </h3>
<div class="card">
<div class="card-body">
	
		<input type='hidden' name='id_sede' value='<?php echo $sede->getId_sede(); ?>'>
        <input type='hidden' name='action' value='update'>

<div class="form-group c">
      <label for="nombre">Nombre:</label>
      <input class="form-control" type='text' name='nombre'   pattern="([\D]{3,30}\s*)+" value='<?php echo $sede->getNombre(); ?>'>
</div>

<div class="form-group ">
      <label for="telefono">Teléfono:</label>
      <input class="form-control" type='text' name='telefono' id="telefono"  value='<?php echo $sede->getTelefono(); ?>'>
</div>
<div class="form-group ">
      <label>Dirección:</label>
      <input class="form-control" type='text' name='direccion' pattern="([a-zA-Z._%+-#'´]{3,30}\s*)+" value='<?php echo $sede->getDireccion(); ?>'>
</div>
<div class="form-group ">
      <label>Correo:</label>
      <input class="form-control" type='text' name='correo' id="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"   value='<?php echo $sede->getCorreo(); ?>'>
</div>
      <div class="form-group ">
      <label>Departamento:</label>
      <input class="form-control" type='text' name='departamento'  pattern="([a-zA-Z.'´]{3,30}\s*)+" value='<?php echo $sede->getDepartamento(); ?>'>
</div> 
<div class="form-group ">
      <label>Municipio:</label>
      <input class="form-control" type='text' name='municipio'  pattern="([a-zA-Z.'´]{3,30}\s*)+" value='<?php echo $sede->getMunicipio(); ?>'>
</div>
    
    
<div class="trans"> 
	<input type="submit" class="btn btn-warning  btn-responsive btninter " name="actualizar" value='Actualizar'>
    <a class="btn btn-info btn-responsive btninter  boton" href="./index_sede.php">Cancelar</a>
</div>
</div>
</div>
</form>












