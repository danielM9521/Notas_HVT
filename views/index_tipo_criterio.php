<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<body>
<?php require_once("../navbar.php");?>
<div style="padding-left:16px">
<br>
<h2>MANTENIMIENTO COMPETENCIAS</h2>
<br>
<a class="btn btn-success" href="crear_tipo_criterio.php">Agregar Competencia</a>
<br><br>
<div class="table-responsive">
 <table id="mantenimiento" class="table table-hover">
 <thead>
 <tr>
 <th>
 ID Tipo Criterio
 </th>
 <th>
 Tipo Criterio
 </th>
 <th colspan = "2">
 Acciones
 </th>
 </tr>
 </thead>
 <tbody>
 <?php
 include_once("../controllers/tipo_criterio_controller.php ");
                $tipo_criterios = tipo_criterio_controller::findAll();
								foreach ($tipo_criterios as $tipo_criterio) { ?>
									<tr>
										<td><?php echo $tipo_criterio->getId_tipo_criterio(); ?></td>
                    <td><?php echo $tipo_criterio->getNombre(); ?></td>
                                    
                    <td><a class="btn btn-warning " href="editar_tipo_criterio.php?id_tipo_criterio=<?php echo $tipo_criterio->getId_tipo_criterio();?>">Editar</a></td>
                    <td><a class="btn btn-danger " href="eliminar_tipo_criterio.php?id_tipo_criterio=<?php echo $tipo_criterio->getId_tipo_criterio();?>">Eliminar</a></td>
                    
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