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
<h2>Mantenimiento-Curso</h2>
<a href="crear_curso.php">Agregar rol</a>
 <table>
 <thead>
 <tr>
 <th>
 ID Curso
 </th>
 <th>
 Curso
 </th>
 </tr>
 </thead>
 <tbody>
 <?php
 include_once("../controllers/curso_controller.php ");
                $cursos = curso_controller::findAll();
								foreach ($cursos as $curso) { ?>
									<tr>
										<td><?php echo $curso->getId_curso(); ?></td>
                                        <td><?php echo $curso->getNombre(); ?></td>
                                    
                    <td><a href="editar_curso.php?id_curso=<?php echo $curso->getId_curso();?>">Editar</a></td>
                    <td><a href="eliminar_curso.php?id_curso=<?php echo $curso->getId_curso();?>">Eliminar</a></td>
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
