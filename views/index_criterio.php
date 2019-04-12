<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<div style="padding-left:16px">
<br>
<h2>MANTENIMIENTO CRITERIO</h2>
<br>
<a class="btn btn-success" href="crear_criterio.php">Agregar Criterio</a>
<br><br>
<div class="table-responsive">
 <table class="table table-hover">
 <thead>
 <tr>
 <th>
 ID Criterio
 </th>
 <th>
 Competencia
 </th>
 <th>
 Criterio
 </th>
 <th colspan = "2">
 Acciones
 </th>
 </tr>
 </thead>
 <tbody>
 <?php
 include_once("../controllers/criterio_controller.php ");
                $criterios = criterio_controller::findAll();
								foreach ($criterios as $criterio) { ?>
									<tr>
										<td><?php echo $criterio->getId_criterio(); ?></td>
                    <td><?php echo $criterio->getId_tipo_criterio(); ?></td>
                                        <td><?php echo $criterio->getNombre(); ?></td>
                                    
                    <td><a a class="btn btn-warning " href="editar_criterio.php?id_criterio=<?php echo $criterio->getId_criterio();?>">Editar</a></td>
                    <td><a a class="btn btn-danger" href="eliminar_criterio.php?id_criterio=<?php echo $criterio->getId_criterio();?>">Eliminar</a></td>
                    </tr>
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
