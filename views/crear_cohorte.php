<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<br><br>

<form method="post" class="cont">
<h3>  NUEVO COHORTE </h3>
<div class="card">
<div class="card-body">
<div class="form-group">
<label for="id_sede">Sede:</label>
    <select class="form-control" name="id_sede">
        <?php 
            include_once("../controllers/sede_controller.php"); 
            $sc = new sede_controller();
            $sedes = $sc->findAll();
            foreach($sedes as $sede){?>
                <option value="<?php echo $sede->getId_sede();?>"><?php echo $sede->getNombre();?></option>
            <?php }
        ?>

    </select>
            </div>
            <div class="form-group">
<label for="id_curso">Curso:</label>
    <select class="form-control" name="id_curso">
    <?php 
            include_once("../controllers/curso_controller.php"); 
            $cc = new curso_controller();
            $cursos = $cc->findAll();
            foreach($cursos as $curso){?>
                <option value="<?php echo $curso->getId_curso();?>"><?php echo $curso->getNombre();?></option>
            <?php }
        ?>

    </select>
    </div>

<div class="form-group">
    <label for="nombre">Nombre:</label>
    <input type="text"  class="form-control" name="nombre" placeholder="Ej. COHORTE-1" required>
</div>

<div class="form-group ">
    <label for="fecha_inicio">Fecha de inicio:</label>
    <input type="date"  class="form-control" name="fecha_inicio">
            </div>
            <div class="form-group ">
    <label for="fecha_fin">Fecha de finalización:</label>
    <input type="date"  class="form-control" name="fecha_fin">
            </div>

            <div class="form-group ">      
    <label for="estado">Estado:</label>
   
    <input  type="radio" name="estado" value="1" checked>
    <label class="form-check-label">Activo</label>
    
       
    <input  type="radio" name="estado" value="0">
    <label class="form-check-label">Inactivo</label>
    
            </div>

            <div class="trans"> 
    <input type="submit" class="btn btn-success  btn-responsive btninter " value="Guardar" name="guardar">
    <a class="btn btn-info btn-responsive btninter  boton " href="./index_cohorte.php">Cancelar</a>
            </div> 
            </div>
            </div>
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