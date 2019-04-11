<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>

<form method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre"><br><br>
    <input type="submit" value="Guardar" name="guardar">
</form>

<?php
if(isset($_POST['guardar'])){
    include_once("../controllers/tipo_criterio_controller.php");
    $cc = new tipo_criterio_controller();
    $tipo_criterio= new tipo_criterio();
    $tipo_criterio->setId_tipo_criterio(null);
    $tipo_criterio->setNombre($_POST['nombre']);
    $cc->save($tipo_criterio);
}

?>