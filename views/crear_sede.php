<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>

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
<br><br>
<form method="post"  class="cont">
<h3>  NUEVA SEDE </h3>
<div class="card">
<div class="card-body">
<div class="form-group ">

    <label for="nombre">Nombre:</label>
    <input type="text" class="form-control" name="nombre"  pattern="([\D]{3,30}\s*)+" placeholder="Ej. FGK-SANTA ANA" required>
</div>
<div class="form-group ">
    <label for="telefono">Teléfono:</label>
    <input type="text" class="form-control" name="telefono" id="telefono"  placeholder="Ej.7798-0092" required>
</div>
<div class="form-group ">
    <label for="direccion">Dirección:</label>
    <input type="text" class="form-control" name="direccion"pattern="( [[:word:]][[:punct:]]{3,30}\s*)+" placeholder="Ingrese dirección" required>
    </div>
<div class="form-group ">
    <label for="correo">Correo:</label>
    <input type="email" class="form-control" name="correo"  id="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"  placeholder="Ej.usuario@gmail.com" required>
    </div>
<div class="form-group ">
    <label for="departamento">Departamento:</label>
    <input type="text" class="form-control" name="departamento"  pattern="([a-zA-ZÑñáéíóúÁÉÍÓÚ ]{3,30}\s*)+"  placeholder="Ej.SANTA ANA" required>
    </div>
    <div class="form-group ">
    <label for="municipio">Municipio:</label>
    <input type="text" class="form-control"  name="municipio" pattern="([a-zA-ZÑñáéíóúÁÉÍÓÚ ]{3,30}\s*)+" placeholder="Ej.Texistepeque" required>
    </div>
    <div class="trans"> 
    <input type="submit" class="btn btn-success  btn-responsive btninter " value="Guardar" name="guardar">
    <a class="btn btn-info btn-responsive btninter  boton " href="./index_sede.php">Cancelar</a>
            </div> 
            </div>

</div>
</form>
