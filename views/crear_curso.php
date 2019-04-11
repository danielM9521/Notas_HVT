<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<br><br>
<form method="post">
<div class="form-group col-md-6">
    <label for="nombre">Nombre:</label>
    <input type="text"  class="form-control" name="nombre">
</div>
    <input type="submit" class="btn btn-success  boton" value="Guardar" name="guardar">
    <a class="btn btn-info" href="./index_curso.php">Cancelar</a>
</form>

<?php
if(isset($_POST['guardar'])){
    include_once("../controllers/curso_controller.php");
    $cc = new curso_controller();
    $curso= new curso();
    $curso->setId_curso(null);
    $curso->setNombre($_POST['nombre']);
    $cc->save($curso);
}

?>