<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<div style="padding-left:16px">
<h2>Mantenimiento-Tipo_Criterio</h2>
<a href="crear_tipo_criterio.php">Agregar Tipo Criterio</a>
 <table>
 <thead>
 <tr>
 <th>
 ID Tipo Criterio
 </th>
 <th>
 Tipo Criterio
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
                                    
                    <td><a href="editar_tipo_criterio.php?id_tipo_criterio=<?php echo $tipo_criterio->getId_tipo_criterio();?>">Editar</a></td>
                    <td><a href="eliminar_tipo_criterio.php?id_tipo_criterio=<?php echo $tipo_criterio->getId_tipo_criterio();?>">Eliminar</a></td>
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
