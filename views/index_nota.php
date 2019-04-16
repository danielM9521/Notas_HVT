<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<body>
<?php require_once("../navbar.php");?>
<div style="padding-left:16px">
<br>
<h2>MANTENIMIENTO NOTA</h2>
<br>
<a class="btn btn-success" href="crear_nota.php">Agregar nota</a>
 <table id="mantenimiento" class="table-hover">
 <thead>
 <tr>
 <th>
 ID Nota
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
 Alumno
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
                                       
										<td><?php echo $nota->getNombre_materia(); ?></td>
										<td><?php echo $nota->getId_criterio();?></td>
										<td><?php echo $nota->getNota_inicio();?></td>
										<td><?php echo $nota->getnota_fin();?></td>
                                        <td><?php echo $nota->getFecha_llenado_inicio();?></td>
                                        <td><?php echo $nota->getFecha_llenado_fin();?></td>
                                        <td><?php echo $nota->getId_alumno();?></td>
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
<script>
    $(document).ready(function () {
$('#mantenimiento').DataTable();
$('.dataTables_length').addClass('bs-select');
});
</script>