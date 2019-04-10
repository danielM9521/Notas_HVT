<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./views/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./views/css/style.css">

</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="index.php" class="active">Inicio</a>
  
  <div class="dropdown">
    <button class="dropbtn">Mantenimiento 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="views/index_sede.php">Sede</a>
      <a href="views/index_curso.php">Curso</a>
      <a href="views/index_cohorte.php">Cohorte</a>
      <a href="views/index_rol.php">Rol</a>
      <a href="views/index_usuario.php">Usuario</a>
      <a href="views/index_alumno.php">Alumno</a>
      <a href="views/index_tipo_criterio.php">Competencia</a>
      <a href="views/index_criterio.php">Criterio</a>
      <a href="views/index_nota.php">Nota</a>
    </div>
  </div> 
  <a href="#contact">Acerca de</a>
  <a href="#about">Cerrar sesión</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>

<div style="padding-left:16px">

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
</html>
