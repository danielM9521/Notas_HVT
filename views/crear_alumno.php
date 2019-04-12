<?php require_once("../header.php");?>
<?php require_once("../navbar.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>

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
<br><br>

 
<form method="post" class="cont">
<h3>  NUEVO ALUMNO </h3>
<div class="card">
<div class="card-body">

<div class="form-group ">
    <label for="nombre">Nombres:</label>
    <input type="text" class="form-control" name="nombre" placeholder="Ingrese nombres" required>
    </div>
    <div class="form-group ">
    <label for="apellidos">Apellidos:</label>
    <input class="form-control" type="text" name="apellidos" placeholder="Ingrese apellidos" required>
    </div>
    <div class="form-group ">
    <label for="id_cohorte">Cohorte:</label>
    <select class="form-control" name="id_cohorte" required>
        <?php 
            include_once("../controllers/cohorte_controller.php"); 
            $cc = new cohorte_controller();
            $cohortes = $cc->findAllActives();
            foreach($cohortes as $cohorte){?>
                <option value="<?php echo $cohorte->getId_cohorte();?>"><?php echo $cohorte->getNombre();?></option>
                  <?php }
        ?>
    </select>
            </div>
    <div class="form-group ">    
    <label for="direccion">Dirección:</label>
    <input  class="form-control" type="text" name="direccion" placeholder="Ingrese dirección" required>
    </div>

    <div class="form-group "> 
    <label for="estado_civil">Estado civil:</label>
    <select class="form-control" name="estado_civil" reuired>
        <option value="Soltera/o">Soltera/o</option>
        <option value="Viuda/o">Viuda/o</option>
        <option value="Casada/o">Casada/o</option>
        <option value="Divorciada/o">Divorciada/o</option>
    </select>
    </div>
    <div class="form-group "> 
    <label for="sexo">Sexo:</label>
    <input type="radio" name="sexo" value="Femenino" checked>Femenino
    <input type="radio" name="sexo" value="Masculino">Masculino
    <input type="radio" name="sexo" value="Otro">Otro
    </div>
    <div class="form-group "> 
    <label for="dui">Dui:</label>
    <input  class="form-control" type="text" name="dui"placeholder="Ej. 02782142-9" >
    </div>
    <div class="form-group "> 
    <label for="nit">Nit:</label>
    <input class="form-control" type="text" name="nit" placeholder="Ej. 0213-170395-101-2" required> </div>

    <div class="form-group "> 
    <label for="carnet_minoridad">Carnet de minoridad:</label>
    <input class="form-control" type="text" name="carnet_minoridad " placeholder="Ej. 123456" > </div>

    <div class="form-group "> 
    <label for="discapacidad">Discapacidad:</label>
    <input class="form-control" type="text" name="discapacidad" placeholder ="Ingrese  discapacidad"> </div>

    <div class="form-group "> 
    <label for="telefono">Teléfono:</label>
    <input class="form-control" type="text" name="telefono" placeholder="Ej. 7777-9999"> </div>

    <div class="form-group "> 
    <label for="correo">Correo:</label>
    <input class="form-control" type="email" name="correo" placeholder="Ej.gabriela.menendez@proyectosfgk.org"> </div>

    <div class="form-group "> 
    <label for="fecha_nac">Fecha de nacimiento:</label>
    <input class="form-control" type="date" name="fecha_nac"> </div>

    <div class="trans"> 
    <input type="submit" class="btn btn-success  btn-responsive btninter " value="Guardar" name="guardar">
    <a class="btn btn-info btn-responsive btninter  boton " href="./index_alumno.php">Cancelar</a>
            </div> 
            </div>
            </div>
</form>

