<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<?php
include_once("../controllers/criterio_controller.php");
$cc = new criterio_controller();
if(isset($_GET['id_criterio'])){
  $id_criterio = $_GET['id_criterio'];
  $criterio = $cc->findById($id_criterio);
}else{
  header("location:index_criterio.php");
}

if (isset($_POST) && !empty($_POST)) {
  $c = new Criterio();
  $c->setId_criterio($_POST['id_criterio']);
  $c->setId_tipo_criterio($_POST['id_tipo_criterio']);
  $c->setNombre($_POST['nombre']);
  $cc->update($c);
}
?>
<br><br>
<form method='post'>
	<table>
		<input type='hidden' name='id_criterio' value='<?php echo $criterio->getId_criterio(); ?>'>
        <input type='hidden' name='action' value='update'>
        <div class="form-group col-md-6">
		<label>Nombre:</label>
    <input type='text' name='nombre' class="form-control" value='<?php echo $criterio->getNombre(); ?>'>
    </div>
    <div class="form-group col-md-6">
                <label>Competencia:</label>

                
                    <select class="form-control"  name="id_tipo_criterio">
                        <?php
                        include_once("../controllers/tipo_criterio_controller.php");
                        $sc = new tipo_criterio_controller();
                        $tipos = $sc->findAll();
                        foreach ($tipos as $tipo) { ?>
                            <option value="<?php echo $tipo->getId_tipo_criterio(); ?>" <?php if ($tipo->getId_tipo_criterio() == $criterio->getId_tipo_criterio()) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $tipo->getNombre(); ?></option>
                        <?php }
                    ?>
                

                </select>
            </div>

		
            <input type="submit"class="btn btn-success boton" name="actualizar" value='Actualizar'>
        <a class="btn btn-warning" href="./index_criterio.php">Cancelar</a>
</form>












