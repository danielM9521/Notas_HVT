<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<br><br>
<form method="post">
<div class="form-group col-md-6">
    <label for="nombre">Nombre:</label>
    <input type="text" class="form-control" name="nombre">
</div>
<div class="form-group col-md-6">
    <label for="telefono">Teléfono:</label>
    <input type="text" class="form-control" name="telefono">
</div>
<div class="form-group col-md-6">
    <label for="direccion">Dirección:</label>
    <input type="text" class="form-control" name="direccion">
    </div>
<div class="form-group col-md-6">
    <label for="correo">Correo:</label>
    <input type="text" class="form-control" name="correo">
    </div>
<div class="form-group col-md-6">
    <label for="departamento">Departamento:</label>
    <input type="text" class="form-control" name="departamento">
    </div>
    <div class="form-group col-md-6">
    <label for="municipio">Municipio:</label>
    <input type="text" class="form-control"  name="municipio">
    </div>

    <input  type="submit" class="btn btn-success  boton" value="Guardar" name="guardar">
    <a class="btn btn-info" href="./index_sede.php">Cancelar</a>
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