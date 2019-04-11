<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<div style="padding-left:16px">
<h2>Mantenimiento-Usuario</h2>
<a href="crear_usuario.php">Agregar usuario</a>
 <table class="table-hover table-bordered">
 <thead>
 <tr>
 <th>
 ID Usuario
 </th>
 <th>
 Nombre completo
 </th>
 <th>
 Rol
 </th>
 <th>
 Correo
 </th>
 <th>
 Contraseña
 </th>
 </tr>
 </thead>
 <tbody>
 <?php
 include_once("../controllers/usuario_controller.php ");
                $usuarios = usuario_controller::findAll();
								foreach ($usuarios as $usuario) { ?>
									<tr>
										<td><?php echo $usuario->getId_usuario(); ?></td>
										<td><?php echo $usuario->getApellidos().", ".$usuario->getNombre(); ?></td>
										<td><?php echo $usuario->getId_rol();?></td>
										<td><?php echo $usuario->getCorreo();?></td>
										<td><?php echo $usuario->getContrasenia();?></td>
                    <td><a href="editar_usuario.php?id_usuario=<?php echo $usuario->getId_usuario();?>">Editar</a></td>
                    <td><a href="eliminar_usuario.php?id_usuario=<?php echo $usuario->getId_usuario();?>">Eliminar</a></td>
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
