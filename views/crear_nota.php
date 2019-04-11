<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<form method="post">
    <label for="nombre_materia">Materia:</label>
    <input type="text" name="nombre_materia"><br><br>
    <label for="id_criterio">Criterio:</label>
    <input type="text" name="id_criterio"><br><br>
    <label for="nota_inicio">Nota Inicio:</label>
    <input type="number" name="nota_inicio"><br><br>
    <label for="nota_fin">Nota Fin:</label>
    <input type="number" name="nota_fin"><br><br>
    <label for="fecha_llenado_inicio">Fecha Llenano Inicio:</label>
    <input type="date" name="fecha_llenano_inicio"><br><br>
    <label for="fecha_llenado_fin">Fecha Llenado Fin:</label>
    <input type="date" name="fecha_llenado_fin"><br><br>
    <label for="id_alumno">Alumno:</label>
    <input type="text" name="id_alumno"><br><br>
    <label for="id_usuario">Evaluador:</label>
    <input type="text" name="id_usuario"><br><br>
    <input type="submit" value="Guardar" name="guardar">
</form>

<?php
if(isset($_POST['guardar'])){
    include_once("../controllers/nota_controller.php");
    $sc = new nota_controller();
    $nota = new Nota();
    $nota->setId_nota(null);
    $nota->setNombre_materia($_POST['nombre_materia']);
    $nota->setId_criterio($_POST['id_criterio']);
    $nota->setNota_inicio($_POST['nota_inicio']);
    $nota->setNota_fin($_POST['nota_fin']);
    $nota->setFecha_llenado_inicio($_POST['fecha_llenado_inicio']);
    $nota->setFecha_llenado_fin($_POST['fecha_llenado_fin']);
    $nota->setId_alumno($_POST['id_alumno']);
    $nota->setId_usuario($_POST['id_usuario']);
    $sc->save($nota);
}

?>