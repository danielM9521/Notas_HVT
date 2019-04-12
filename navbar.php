<div class="topnav" id="myTopnav">
  <a href="../index.php" class="active"><i class="fas fa-home"></i></a>
  
  <div class="drop">
    <button class="dropbtn"><i class="fas fa-tools left"></i> Mantenimiento
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="drop-content">
      <a href="index_sede.php">Sede</a>
      <a href="./index_curso.php">Curso</a>
      <a href="./index_cohorte.php">Cohorte</a>
      <a href="./index_rol.php">Rol</a>
      <a href="./index_usuario.php">Usuario</a>
      <a href="./index_alumno.php">Alumno</a>
      <a href="./index_tipo_criterio.php">Competencia</a>
      <a href="./index_criterio.php">Criterio</a>
    </div>
  </div> 
  <a href="../views/acerca_de.php"><i class="fas fa-question-circle"></i> Acerca de</a>
  <a href="../controllers/logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
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
