<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<div style="padding-left:16px">
<br>
<h1 style="margin-left:33%;">Mantenimiento Sede</h1>
<br>
<a class="btn btn-success" href="crear_sede.php">Agregar sede</a>
<br><br>
<div class="table-responsive">
 <table class="table table-bordered">
 <thead >
 <tr>
 <th>
 ID Sede
 </th>
 <th>
 Sede
 </th>
 <th>
 Teléfono
 </th>
 <th>
 Dirección
 </th>
 <th>
 Departamento
 </th>
 <th>
 Municipio
 </th>
 <th colspan = "2">
 Acciones
 </th>
 </tr>
 </thead>
 <tbody>
 <?php
 include_once("../controllers/sede_controller.php ");
                $sedes = sede_controller::findAll();
								foreach ($sedes as $sede) { ?>
									<tr>
										<td><?php echo $sede->getId_sede(); ?></td>
										<td><?php echo $sede->getNombre(); ?></td>
										<td><?php echo $sede->getTelefono();?></td>
										<td><?php echo $sede->getDireccion();?></td>
										<td><?php echo $sede->getDepartamento();?></td>
										<td><?php echo $sede->getMunicipio();?></td>
                    <td><a class="btn btn-warning " href="editar_sede.php?id_sede=<?php echo $sede->getId_sede();?>">Editar</a></td>
                    <td><a class="btn btn-danger" href="eliminar_sede.php?id_sede=<?php echo $sede->getId_sede();?>">Eliminar</a></td>
                    
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
