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
      <a href="./index_curso.php">Curso</a>
      <a href="./index_curso.php">Cohorte</a>
      <a href="./index_rol">Rol</a>
      <a href="./index_usuario">Usuario</a>
      <a href="./index_alumno">Alumno</a>
      <a href="./index_competencia">Competencia</a>
      <a href="./index_criterio">Criterio</a>
      <a href="./index_nota">Nota</a>
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











