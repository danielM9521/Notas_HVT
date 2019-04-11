<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<form method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre"><br><br>
    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono"><br><br>
    <label for="direccion">Dirección:</label>
    <input type="text" name="direccion"><br><br>
    <label for="correo">Correo:</label>
    <input type="text" name="correo"><br><br>
    <label for="departamento">Departamento:</label>
    <input type="text" name="departamento"><br><br>
    <label for="municipio">Municipio:</label>
    <input type="text" name="municipio"><br><br>
    <input type="submit" value="Guardar" name="guardar">
</form>

<?php
if(isset($_POST['guardar'])){
    include_once("../controllers/sede_controller.php");
    $sc = new sede_controller();
    $sede = new Sede();
    $sede->setId_sede(null);
    $sede->setNombre($_POST['nombre']);
    $sede->setCorreo($_POST['correo']);
    $sede->setDepartamento($_POST['departamento']);
    $sede->setDireccion($_POST['direccion']);
    $sede->setMunicipio($_POST['municipio']);
    $sede->setTelefono($_POST['telefono']);
    $sc->save($sede);
}

?>