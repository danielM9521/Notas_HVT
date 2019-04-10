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
      <a href="./index_sede.php">Sede</a>
      <a href="./index_curso.php">Curso</a>
      <a href="./index_curso.php">Cohorte</a>
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

<div style="padding-left:16px">
<h2>Mantenimiento-Rol</h2>
<a href="crear_rol.php">Agregar rol</a>
 <table>
 <thead>
 <tr>
 <th>
 ID Rol
 </th>
 <th>
 Rol
 </th>
 </tr>
 </thead>
 <tbody>
 <?php
 include_once("../controllers/rol_controller.php ");
                $roles = rol_controller::findAll();
								foreach ($roles as $rol) { ?>
									<tr>
										<td><?php echo $rol->getId_rol(); ?></td>
                                        <td><?php echo $rol->getNombre(); ?></td>
                                    
                    <td><a href="editar_rol.php?id_rol=<?php echo $rol->getId_rol();?>">Editar</a></td>
                    <td><a href="eliminar_rol.php?id_rol=<?php echo $rol->getId_rol();?>">Eliminar</a></td>
                    <td></td></tr>
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