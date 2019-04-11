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
    include_once("../controllers/criterio_controller.php");
    $cc = new criterio_controller();
    $criterio= new criterio();
    $criterio->setId_criterio(null);
    $criterio->setNombre($_POST['nombre']);
    $cc->save($criterio);
}

?>