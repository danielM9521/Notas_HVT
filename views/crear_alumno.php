<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<form method="post">
    <label for="nombre">Nombres:</label>
    <input type="text" name="nombre"><br><br>
    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos"><br><br>

    <label for="id_cohorte">Cohorte:</label>
    <select name="id_cohorte">
        <?php 
            include_once("../controllers/cohorte_controller.php"); 
            $cc = new cohorte_controller();
            $cohortes = $cc->findAllActives();
            foreach($cohortes as $cohorte){?>
                <option value="<?php echo $cohorte->getId_cohorte();?>"><?php echo $cohorte->getNombre();?></option>
                  <?php }
        ?>
    </select><br><br>
    <label for="direccion">Dirección:</label>
    <input type="text" name="direccion"><br><br>
    <label for="estado_civil">Estado civil:</label>
    <select name="estado_civil">
        <option value="Soltera/o">Soltera/o</option>
        <option value="Viuda/o">Viuda/o</option>
        <option value="Casada/o">Casada/o</option>
        <option value="Divorciada/o">Divorciada/o</option>
    </select><br><br>
    <label for="sexo">Sexo:</label>
    <input type="radio" name="sexo" value="Femenino" checked>Femenino
    <input type="radio" name="sexo" value="Masculino">Masculino
    <input type="radio" name="sexo" value="Otro">Otro
    <br><br>
    <label for="dui">Dui:</label>
    <input type="text" name="dui"><br><br>
    <label for="nit">Nit:</label>
    <input type="text" name="nit"><br><br>
    <label for="carnet_minoridad">Carnet de minoridad:</label>
    <input type="text" name="carnet_minoridad"><br><br>
    <label for="discapacidad">Discapacidad:</label>
    <input type="text" name="discapacidad"><br><br>
    <label for="telefono">Teléfono:</label>
    <input type="text" name="telefono"><br><br>
    <label for="correo">Correo:</label>
    <input type="text" name="correo"><br><br>
    <label for="fecha_nac">Fecha de nacimiento:</label>
    <input type="date" name="fecha_nac"><br><br>
    <input type="submit" value="Guardar" name="guardar">
</form>

<?php
if(isset($_POST['guardar'])){
    include_once("../controllers/alumno_controller.php");
    $sc = new alumno_controller();
    $alumno = new Alumno();
    $alumno->setId_alumno(null);
    $alumno->setNombre($_POST['nombre']);
    $alumno->setApellidos($_POST['apellidos']);
    $alumno->setDireccion($_POST['direccion']);
    $alumno->setEstado_civil($_POST['estado_civil']);
    $alumno->setSexo($_POST['sexo']);
    $alumno->setDui($_POST['dui']);
    $alumno->setNit($_POST['nit']);
    $alumno->setCarnet_minoridad($_POST['carnet_minoridad']);
    $alumno->setDiscapacidad($_POST['discapacidad']);
    $alumno->setTelefono($_POST['telefono']);
    $alumno->setCorreo($_POST['correo']);
    $alumno->setFecha_nac($_POST['fecha_nac']);
    $alumno->setId_cohorte($_POST['id_cohorte']);
    $sc->save($alumno);
}

?>