<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<br><br>
<form method="post" class="cont">
<h3>  NUEVO ROL </h3>
<div class="card">
<div class="card-body">
<div class="form-group ">
    <label for="nombre">Nombre:</label>
    <input type="text" class="form-control" name="nombre" pattern= "([a-zA-Z]{3,30}\s*)+" placeholder="Ej. Docente" required>
</div>
<div class="trans"> 
    <input type="submit" class="btn btn-success  btn-responsive btninter " value="Guardar" name="guardar">
    <a class="btn btn-info btn-responsive btninter  boton " href="./index_rol.php">Cancelar</a>
            </div> 
            </div>
</div>
</form>

<?php
if(isset($_POST['guardar'])){
    include_once("../controllers/rol_controller.php");
    $cc = new rol_controller();
    $rol = new rol();
    $rol->setId_rol(null);
    $rol->setNombre($_POST['nombre']);
    $cc->save($rol);
}

?>