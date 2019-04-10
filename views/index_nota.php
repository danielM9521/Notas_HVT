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
  
  <div class="drop">
    <button class="dropbtn">Mantenimiento 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="drop-content">
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

<div style="padding-left:16px">
<h2>Mantenimiento-Nota</h2>
 <table>
 <thead>
 <tr>
 <th>
 ID Nota
 </th>
 <th>
 Alumno
 </th>
 <th>
 Materia
 </th>
 <th>
 Criterio
 </th>
 <th>
 Nota inicio
 </th>
 <th>
 Nota fin
 </th>
 <th>
 Fecha llenado inicio
 </th>
 <th>
 Fecha llenado fin
 </th>
 <th>
 Evaluador
 </th>
 </tr>
 </thead>
 <tbody>
 <?php
 include_once("../controllers/nota_controller.php ");
                $notas = nota_controller::findAll();
								foreach ($notas as $nota) { ?>
									<tr>
                                        <td><?php echo $nota->getId_nota(); ?></td>
                                        <td><?php echo $nota->getId_alumno();?></td>
										<td><?php echo $nota->getinombre_materia(); ?></td>
										<td><?php echo $nota->getId_criterio();?></td>
										<td><?php echo $nota->getNota_inicio();?></td>
										<td><?php echo $nota->getnota_fin();?></td>
                                        <td><?php echo $nota->getfecha_llenado_inicio();?></td>
                                        <td><?php echo $nota->getfecha_llenado_fin();?></td>
                                        <td><?php echo $nota->getId_usuario();?></td>
                    <td><a href="editar_nota.php?id_nota=<?php echo $nota->getId_nota();?>">Editar</a></td>
                    <td><a href="">Eliminar</a></td>
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
