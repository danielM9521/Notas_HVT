<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<div style="padding-left:16px">
<<<<<<< HEAD
<h2>Mantenimiento Usuario</h2>
<br>
<a class="btn btn-outline-success" href="crear_usuario.php">Agregar Usuario</a>
<br><br>
<div class="table-responsive">
 <table class="table table-bordered">
=======
<h2>Mantenimiento-Usuario</h2>
<a href="crear_usuario.php">Agregar usuario</a>
 <table class="table-hover table-bordered">
>>>>>>> a08fb2b862f82249b039bb478bc042350b820ff7
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
 <th colspan = "2">
 Acciones
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
                    <td><a a class="btn btn-warning " href="editar_usuario.php?id_usuario=<?php echo $usuario->getId_usuario();?>">Editar</a></td>
                    <td><a a class="btn btn-danger" href="eliminar_usuario.php?id_usuario=<?php echo $usuario->getId_usuario();?>">Eliminar</a></td>
                    
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
