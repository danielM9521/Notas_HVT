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

<div style="padding-left:16px">
<h2>Mantenimiento-Sede</h2>
<a href="crear_sede.php">Agregar sede</a>
 <table>
 <thead>
 <tr>
 <th>
 ID Sede
 </th>
 <th>
 Sede
 </th>
 <th>
 Teléfono
 </th>
 <th>
 Dirección
 </th>
 <th>
 Departamento
 </th>
 <th>
 Municipio
 </th>
 </tr>
 </thead>
 <tbody>
 <?php
 include_once("../controllers/sede_controller.php ");
                $sedes = sede_controller::findAll();
								foreach ($sedes as $sede) { ?>
									<tr>
										<td><?php echo $sede->getId_sede(); ?></td>
										<td><?php echo $sede->getNombre(); ?></td>
										<td><?php echo $sede->getTelefono();?></td>
										<td><?php echo $sede->getDireccion();?></td>
										<td><?php echo $sede->getDepartamento();?></td>
										<td><?php echo $sede->getMunicipio();?></td>
                    <td><a href="editar_sede.php?id_sede=<?php echo $sede->getId_sede();?>">Editar</a></td>
                    <td><a href="eliminar_sede.php?id_sede=<?php echo $sede->getId_sede();?>">Eliminar</a></td>
                    <td></td>
                <?php }?>
 </tbody>
 </table>

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
</body>
