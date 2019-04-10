<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="./css/datatables.min.css"/>
<script type="text/javascript" src="./js/datatables.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./css/style.css">


</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="../index.php" class="active">Inicio</a>
  
  <div class="dropdown">
    <button class="dropbtn">Mantenimiento 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="index_sede.php">Sede</a>
      <a href="../index_curso.php">Curso</a>
      <a href="../index_curso.php">Cohorte</a>
      <a href="../index_rol">Rol</a>
      <a href="../index_usuario">Usuario</a>
      <a href="../index_alumno">Alumno</a>
      <a href="../index_competencia">Competencia</a>
      <a href="../index_criterio">Criterio</a>
      <a href="../index_nota">Nota</a>
    </div>
  </div> 
  <a href="#about">Acerca de</a>
  <a href="#about">Cerrar sesión</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
<?php
include_once("../controllers/sede_controller.php");
$cs = new sede_controller();
if(isset($_GET['id_sede'])){
  $id_sede = $_GET['id_sede'];
  $sede = $cs->findById($id_sede);
}else{
  header("location:index_sede.php");
}

?>

<form method='post'>
	<table>
		<input type='hidden' name='id_sede' value='<?php echo $sede->getId_sede(); ?>'>
        <input type='hidden' name='action' value='update'>
		<tr>
			<td><label>Nombre:</label></td><td><input type='text' name='nombre' value='<?php echo $sede->getNombre(); ?>'></td>
		</tr>
		<tr>
			<td><label>Teléfono: </label></td><td><input type='text' name='telefono'  value='<?php echo $sede->getTelefono(); ?>'></td>
		</tr>
		<tr>
			<td><label>Correo:</label></td><td><input type='text' name='correo' value='<?php echo $sede->getCorreo(); ?>'></td>
		</tr>
		<tr>
			<td><label>Dirección:</label></td><td><input type='text' name='direccion' value='<?php echo $sede->getDireccion(); ?>'></td>
		</tr>
		<tr>
			<td><label>Departamento:</label></td><td><input type='text' name='departamento' value='<?php echo $sede->getDepartamento(); ?>'></td>
		</tr>
		<tr>
			<td><label>Municipio:</label></td><td><input type='text' name='municipio' value='<?php echo $sede->getMunicipio(); ?>'></td>
		</tr>
	</table>	
	<input type="submit" value='Actualizar'>
    <a class="btn btn-warning" href="./index_sede.php">Cancelar</a>
</form>
<?php
      if (isset($_POST) && !empty($_POST)) {
        $sede = new Sede();
        $sede->setId_sede($_POST['id_sede']);
        $sede->setNombre($_POST['nombre']);
        $sede->setTelefono($_POST['telefono']);
        $sede->setDireccion($_POST['direccion']);
        $sede->setCorreo($_POST['correo']);
        $sede->setDepartamento($_POST['departamento']);
        $sede->setMunicipio($_POST['municipio']);

        $cs->update($sede);
        if($cs){
          $message= "Datos actualizados con éxito";
						$class="alert alert-success";
        }else{
          $message="No se pudieron actualizar los datos";
						$class="alert alert-danger";
        }
        echo $message;
    }  
       
    
    
    ?>










