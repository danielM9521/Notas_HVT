<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<div style="padding-left:16px">
<h2>Mantenimiento-Criterio</h2>
<a href="crear_criterio.php">Agregar Criterio</a>
 <table class="table-hover table-bordered">
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
                                    
                    <td><a href="editar_criterio.php?id_criterio=<?php echo $criterio->getId_criterio();?>">Editar</a></td>
                    <td><a href="eliminar_criterio.php?id_criterio=<?php echo $criterio->getId_criterio();?>">Eliminar</a></td>
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
