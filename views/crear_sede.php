<!DOCTYPE html>
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
      <a href="./index_cohorte.php">Cohorte</a>
      <a href="./index_rol.php">Rol</a>
      <a href="./index_usuario.php">Usuario</a>
      <a href="./index_alumno.php">Alumno</a>
      <a href="./index_competencia.php">Competencia</a>
      <a href="./index_criterio.php">Criterio</a>
      <a href="./index_nota.php">Nota</a>
    </div>
  </div> 
  <a href="#about">Acerca de</a>
  <a href="#about">Cerrar sesión</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>

<form method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre"><br><br>
    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono"><br><br>
    <label for="direccion">Dirección:</label>
    <input type="text" name="direccion"><br><br>
    <label for="correo">Correo:</label>
    <input type="text" name="correo"><br><br>
    <label for="departamento">Departamento:</label>
    <input type="text" name="departamento"><br><br>
    <label for="municipio">Municipio:</label>
    <input type="text" name="municipio"><br><br>
    <input type="submit" value="Guardar" name="guardar">
</form>

<?php
if(isset($_POST['guardar'])){
    include_once("../controllers/sede_controller.php");
    $sc = new sede_controller();
    $sede = new Sede();
    $sede->setId_sede(null);
    $sede->setNombre($_POST['nombre']);
    $sede->setCorreo($_POST['correo']);
    $sede->setDepartamento($_POST['departamento']);
    $sede->setDireccion($_POST['direccion']);
    $sede->setMunicipio($_POST['municipio']);
    $sede->setTelefono($_POST['telefono']);
    $sc->save($sede);
}

?>