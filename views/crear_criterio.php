<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<br>
<form method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre"><br><br>
<label for="id_tipo_criterio">Competencia:</label>
    <select name="id_tipo_criterio">
    <?php 
            include_once("../controllers/tipo_criterio_controller.php"); 
            $rc = new tipo_criterio_controller();
            $tipos = $rc->findAll();
            foreach($tipos as $tipo){?>
                <option value="<?php echo $tipo->getId_tipo_criterio();?>"><?php echo $tipo->getNombre();?></option>
            <?php }
        ?>

    </select><br><br>
    <input type="submit" value="Guardar" name="guardar">
</form>

<?php
if(isset($_POST['guardar'])){
    include_once("../controllers/criterio_controller.php");
    $cc = new criterio_controller();
    $criterio= new Criterio();
    $criterio->setId_criterio(null);
    $criterio->setId_tipo_criterio($_POST['id_tipo_criterio']);
    $criterio->setNombre($_POST['nombre']);
    $cc->save($criterio);
}

?>