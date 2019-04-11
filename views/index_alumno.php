<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<div style="padding-left:16px">
<h2>Mantenimiento Alumno</h2>
<br>
<a class="btn btn-outline-success" href="crear_alumno.php">Agregar Alumno</a>
<br><br>
<div class="table-responsive">
 <table class="table table-bordered">
 <thead>
 <tr>
 <th>
 ID Alumno
 </th>
 <th>
 Nombre completo
 </th>
 <th>
 Dirección
 </th>
 <th>
 Estado civil
 </th>
 <th>
 Sexo
 </th>
 <th>
 Estado
 </th>
 <th colspan = "2">
 Acciones
 </th>
 </tr>
 </thead>
 <tbody>
 <?php
 include_once("../controllers/alumno_controller.php ");
                $alumnos = alumno_controller::findAll();
								foreach ($alumnos as $alumno) { ?>
									<tr>
										<td><?php echo $alumno->getId_alumno(); ?></td>
										<td><?php echo $alumno->getApellidos().", ".$alumno->getNombre(); ?></td>
										<td><?php echo $alumno->getDireccion();?></td>
										<td><?php echo $alumno->getEstado_civil();?></td>
                    <td><?php echo $alumno->getSexo();?></td>
                    <td><?php echo $alumno->getId_cohorte();?></td>
                    <td><a class="btn btn-warning " href="editar_alumno.php?id_alumno=<?php echo $alumno->getId_alumno();?>">Editar</a></td>
                    <td><a class="btn btn-danger " href="eliminar_alumno.php?id_alumno=<?php echo $alumno->getId_alumno();?>">Eliminar</a></td>
                    
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
