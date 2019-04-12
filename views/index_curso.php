<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<div style="padding-left:16px">
<br><br>
<h2>MANTENIMIENTO CURSO</h2>
<a  class="btn btn-outline-success" href="crear_curso.php">Agregar curso</a>
<br><br>
<div class="table-responsive">
 <table class="table table-bordered">
 <thead>
 <tr>
 <th>
 ID Curso
 </th>
 <th>
 Curso
 </th>
 <th colspan = "2">
 Acciones
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
                                    
                    <td><a class="btn btn-warning " href="editar_curso.php?id_curso=<?php echo $curso->getId_curso();?>">Editar</a></td>
                    <td><a class="btn btn-danger " href="eliminar_curso.php?id_curso=<?php echo $curso->getId_curso();?>">Eliminar</a></td>
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
