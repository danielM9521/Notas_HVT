<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
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