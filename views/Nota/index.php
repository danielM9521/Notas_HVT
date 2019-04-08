<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./views/css/style.css">
</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="index.php" class="active">Home</a>
  
  <div class="dropdown">
    <button class="dropbtn">Mantenimiento 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="views/Sede/index.php">Sede</a>
      <a href="views/Curso/index.php">Curso</a>
      <a href="views/Cohorte/index.php">Cohorte</a>
      <a href="views/Rol/index.php">Rol</a>
      <a href="views/Usuario/index.php">Usuario</a>
      <a href="views/Alumno/index.php">Alumno</a>
      <a href="views/Competencia/index.php">Competencia</a>
      <a href="views/Criterio/index.php">Criterio</a>
      <a href="views/Nota/index.php">Nota</a>
    </div>
  </div> 
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
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
