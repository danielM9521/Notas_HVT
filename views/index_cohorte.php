<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<div style="padding-left:16px">
<br>
<h2>MANTENIMIENTO COHORTE</h2>
<br>
<a class="btn btn-success" href="crear_cohorte.php">Agregar Cohorte</a>
<br><br>
<div class="table-responsive">
 <table class="table table-hover">
 <thead>
 <tr>
 <th>
 ID Cohorte
 </th>
 <th>
 Cohorte
 </th>
 <th>
 Fecha de inicio
 </th>
 <th>
 Fecha de finalización
 </th>
 <th>
 Sede
 </th>
 <th>
 Curso
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
 include_once("../controllers/cohorte_controller.php ");
                $cohortes = cohorte_controller::findAll();
								foreach ($cohortes as $cohorte) { ?>
									<tr>
										<td><?php echo $cohorte->getId_cohorte(); ?></td>
										<td><?php echo $cohorte->getNombre(); ?></td>
										<td><?php echo $cohorte->getFecha_inicio();?></td>
										<td><?php echo $cohorte->getFecha_fin();?></td>
										<td><?php echo $cohorte->getId_sede();?></td>
                                        <td><?php echo $cohorte->getId_curso();?></td>
                                        <td><?php echo $cohorte->getEstado();?></td>
                    <td><a  class="btn btn-warning " href="editar_cohorte.php?id_cohorte=<?php echo $cohorte->getId_cohorte();?>">Editar</a></td>
                    <td><a class="btn btn-danger "  href="eliminar_cohorte.php?id_cohorte=<?php echo $cohorte->getId_cohorte();?>">Eliminar</a></td>
                    
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
