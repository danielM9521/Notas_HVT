<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<div style="padding-left:16px">
<h2>Mantenimiento-Curso</h2>
<a href="crear_curso.php">Agregar curso</a>
 <table class="table-hover table-bordered">
 <thead>
 <tr>
 <th>
 ID Curso
 </th>
 <th>
 Curso
 </th>
 </tr>
 </thead>
 <tbody>
 <?php
 include_once("../controllers/curso_controller.php ");
                $cursos = curso_controller::findAll();
								foreach ($cursos as $curso) { ?>
									<tr>
										<td><?php echo $curso->getId_curso(); ?></td>
                                        <td><?php echo $curso->getNombre(); ?></td>
                                    
                    <td><a href="editar_curso.php?id_curso=<?php echo $curso->getId_curso();?>">Editar</a></td>
                    <td><a href="eliminar_curso.php?id_curso=<?php echo $curso->getId_curso();?>">Eliminar</a></td>
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
