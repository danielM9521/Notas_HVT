<?php include("header.php");?>
<link rel="stylesheet" href="./views/css/style.css">
<link rel="stylesheet" href="./views/css/bootstrap.min.css">
<script type="text/javascript" src="./views/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./views/js/jquery.min.js"></script>
<script type="text/javascript" src="./views/js/popper.min.js"></script>


<style>
  .carre_couleur {
    margin-top: 10%;
    width: 350px;
    height: 350px;
    display: inline-block;
    position: relative;
    border-radius: 15px;


  }

  .base_hov .retract {
    -webkit-transition: all 200ms ease-in;
    -webkit-transform-origin: 50% 20%;
    -webkit-transform: scale(1);
    -moz-transition: all 200ms ease-in;
    -moz-transform-origin: 50% 20%;
    -moz-transform: scale(1);
    -ms-transition: all 200ms ease-in;
    -ms-transform-origin: 50% 20%;
    -ms-transform: scale(1);
    transition: all 200ms ease-in;
    transform-origin: 50% 20%;
    transform: scale(1);
    width: 200px;
    height: 280px;
    position: absolute;
    z-index: 2;
    left: 0;
  }

  .base_hov:hover .retract {
    -webkit-transition: all 200ms ease-in;
    -webkit-transform: scale(0.6);
    -moz-transition: all 200ms ease-in;
    -moz-transform: scale(0.6);
    -ms-transition: all 200ms ease-in;
    -ms-transform: scale(0.6);
    transition: all 200ms ease-in;
    transform: scale(0.6);
  }

  .acced {
    width: 180px;
    padding: 10px;

    bottom: 0;
    position: absolute;
    z-index: 1;
    text-align: left;
  }

  .big_acced {
    color: #ffffff;
    font-size: 25px;
    font-weight: 700;
    font-family: 'Roboto';
  }

  .middle_acced {
    color: #ffffff;
    font-size: 15px;
    font-weight: 400;
    font-family: 'Roboto';
  }

  img {
    margin-left: 35%;
    width: 200px !important;
    height: 200px !important;
  }
</style>

<body>
  <div class="topnav" id="myTopnav">
    <a href="home	.php" class="active"><i class="fas fa-home"></i></a>

    <div class="drop">
      <button class="dropbtn"><i class="fas fa-tools left"></i> Mantenimiento
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="drop-content">
        <a href="views/index_sede.php">Sede</a>
        <a href="views/index_curso.php">Curso</a>
        <a href="views/index_cohorte.php">Cohorte</a>
        <a href="views/index_rol.php">Rol</a>
        <a href="views/index_usuario.php">Usuario</a>
        <a href="views/index_alumno.php">Alumno</a>
        <a href="views/index_tipo_criterio.php">Competencia</a>
        <a href="views/index_criterio.php">Criterio</a>
      </div>
    </div>
    <a href="views/acerca_de.php"><i class="fas fa-question-circle"></i> Acerca de</a>
    <a href="controllers/logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
  </div>





  <form method="post">


    <link href='https://fonts.googleapis.com/css?family=Roboto:100,400,300,500,700' rel='stylesheet' type='text/css'>

    <div align="center" class="fond">

      <div class="carre_couleur base_hov" style="background-color:#f8b334;">
        <BR>
        <h2 class="big_acced">NOTAS</h2>
        <div class="retract" style="background-color:#f8b334;"><img src="views/images/calificacion.png"></div>
        <div class="acced">
          <a href="./views/seleccion_cohorte.php" class="big_acced" style="color:#f39c12;">REGISTRAR</a>

        </div>
      </div>
      <div class="carre_couleur base_hov" style="background-color:#2ecc71;">
        <BR>
        <h2 class="big_acced">REPORTES</h2>
        <div class="retract" style="background-color:#2ecc71;"><img src="views/images/reporte.png"></div>
        <div class="acced">
          <a href="./views/reporte_cohorte.php" class="big_acced" style="color:#27ae60;">COHORTES</a>
          <a href="./views/reporte_alumno.php" class="big_acced" style="color:#27ae60;">ALUMNOS</a>
        </div>
      </div>




    </div>
  </form>

</body>

</html>