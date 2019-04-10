<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="./css/datatables.min.css"/>
<script type="text/javascript" src="./js/datatables.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./css/style.css">


</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="../index.php" class="active">Inicio</a>
  
  <div class="dropdown">
    <button class="dropbtn">Mantenimiento 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="index_sede.php">Sede</a>
      <a href="./index_curso.php">Curso</a>
      <a href="./index_cohorte.php">Cohorte</a>
      <a href="./index_rol.php">Rol</a>
      <a href="./index_usuario.php">Usuario</a>
      <a href="./index_alumno.php">Alumno</a>
      <a href="./index_competencia.php">Competencia</a>
      <a href="./index_criterio.php">Criterio</a>
      <a href="./index_nota.php">Nota</a>
    </div>
  </div> 
  <a href="#about">Acerca de</a>
  <a href="#about">Cerrar sesión</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>

<form method="post">
    

<label for="id_sede">Sede:</label>
    <select name="id_sede">
        <?php 
            include_once("../controllers/sede_controller.php"); 
            $sc = new sede_controller();
            $sedes = $sc->findAll();
            foreach($sedes as $sede){?>
                <option value="<?php echo $sede->getId_sede();?>"><?php echo $sede->getNombre();?></option>
            <?php }
        ?>

    </select>

<label for="id_curso">Curso:</label>
    <select name="id_curso">
    <?php 
            include_once("../controllers/curso_controller.php"); 
            $cc = new curso_controller();
            $cursos = $cc->findAll();
            foreach($cursos as $curso){?>
                <option value="<?php echo $curso->getId_curso();?>"><?php echo $curso->getNombre();?></option>
            <?php }
        ?>

    </select><br><br>

    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre"><br><br>
    
    <label for="fecha_inicio">Fecha de inicio:</label>
    <input type="date" name="fecha_inicio"><br><br>

    <label for="fecha_fin">Fecha de finalización:</label>
    <input type="date" name="fecha_fin"><br><br>

    <label for="estado">Estado:</label>
    <input type="radio" name="estado" value="1">Activo
    <input type="radio" name="estado" value="0">Inactivo
    <br><br>

    <input type="submit" value="Guardar" name="guardar">
</form>

<?php
if(isset($_POST['guardar'])){
    include_once("../controllers/cohorte_controller.php");
    $cc = new cohorte_controller();
    $cohorte = new Cohorte();
    $cohorte->setId_cohorte(null);
    $cohorte->setNombre($_POST['nombre']);
    $cohorte->setFecha_inicio($_POST['fecha_inicio']);
    $cohorte->setFecha_fin($_POST['fecha_fin']);
    $cohorte->setId_sede($_POST['id_sede']);
    $cohorte->setId_curso($_POST['id_curso']);
    $cohorte->setEstado($_POST['estado']);
    $cc->save($cohorte);
}

?>