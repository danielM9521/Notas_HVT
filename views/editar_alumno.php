<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
    <?php
    include_once("../controllers/alumno_controller.php");
    $cc = new alumno_controller();
    if (isset($_GET['id_alumno'])) {
        $id_alumno = $_GET['id_alumno'];
        $alumno = $cc->findById($id_alumno);
    } else {
        header("location:index_alumno.php");
    }

    if (isset($_POST) && !empty($_POST)) {
        $a = new Alumno();
        $a->setId_alumno($_POST['id_alumno']);
        $a->setNombre($_POST['nombre']);
        $a->setApellidos($_POST['apellidos']);
        $a->setDireccion($_POST['direccion']);
        $a->setEstado_civil($_POST['estado_civil']);
        $a->setSexo($_POST['sexo']);
        $a->setDui($_POST['dui']);
        $a->setNit($_POST['nit']);
        $a->setCarnet_minoridad($_POST['carnet_minoridad']);
        $a->setDiscapacidad($_POST['discapacidad']);
        $a->setTelefono($_POST['telefono']);
        $a->setCorreo($_POST['correo']);
        $a->setFecha_nac($_POST['fecha_nac']);
        $a->setId_cohorte($_POST['id_cohorte']);
        $cc->update($a);
    }
    ?>
   <br><br>
<form method='post' class="cont">
<h3>  EDITAR ALUMNO </h3>
<div class="card">
<div class="card-body">
        
            <input type='hidden' name='id_alumno' value='<?php echo $alumno->getId_alumno(); ?>'>
                <div class="form-group ">
                <label>Nombres:</label>
                <input type='text' class="form-control" name='nombre' value='<?php echo $alumno->getNombre(); ?>'>
                </div>
                <div class="form-group ">
                <label>Apellidos:</label>
                <input type='text' class="form-control"  name='apellidos' value='<?php echo $alumno->getApellidos(); ?>'>
                </div>
                <div class="form-group ">
                <label>Dirección:</label></td>
                <input type='text' class="form-control"  name='direccion' value='<?php echo $alumno->getDireccion(); ?>'>
                </div>
          
                <div class="form-group ">
           <label>Cohorte:</label>
            
                    <select  class="form-control" name="id_cohorte">
                        <?php
                        include_once("../controllers/cohorte_controller.php");
                        $sc = new cohorte_controller();
                        $cohortes = $sc->findAllActives();
                        foreach ($cohortes as $cohorte) { ?>
                            <option value="<?php echo $cohorte->getId_cohorte();?>" <?php if ($cohorte->getId_cohorte() == $alumno->getId_cohorte()) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $cohorte->getNombre(); ?></option>
                        <?php }
                    ?>
                
                </select>
                </div>
                <div class="form-group ">
           <label>Estado civil :</label>
                
                    <select  class="form-control" name="estado_civil">
                        <option value="Soltera/o" <?php if($alumno->getEstado_civil()=="Soltera/o"){echo "selected";}?>>Soltera/o</option>
                        <option value="Viuda/o"<?php if($alumno->getEstado_civil()=="Viuda/o"){echo "selected";}?>>Viuda/o</option>
                        <option value="Casada/o"<?php if($alumno->getEstado_civil()=="Casada/o"){echo "selected";}?>>Casada/o</option>
                        <option value="Divorciada/o"<?php if($alumno->getEstado_civil()=="Divorciada/o"){echo "selected";}?>>Divorciada/o</option>
                    </select>                                                                
                
            </div>
            <div class="form-group ">
                <label>Sexo:</label>
                
                    <input type="radio" name="sexo" value="Femenino" <?php if($alumno->getSexo()=="Femenino"){echo "checked";}?>>Femenino
                    <input type="radio" name="sexo" value="Masculino" <?php if($alumno->getSexo()=="Masculino"){echo "checked";}?>>Masculino
                    <input type="radio" name="sexo" value="Otro" <?php if($alumno->getSexo()=="Otro"){echo "checked";}?>>Otro
           </div>
           <div class="form-group ">
                <label>DUI:</label>
                <input type='text' class="form-control"  name='dui' value='<?php echo $alumno->getDui(); ?>'>
            </div>
            <div class="form-group ">
                <label>NIT:</label>
                <td><input type='text' class="form-control"  name='nit' value='<?php echo $alumno->getNit(); ?>'>
           </div>
           <div class="form-group ">
                <label>Carnet de minoridad:</label>
                <input type='text' class="form-control" name='carnet_minoridad' value='<?php echo $alumno->getCarnet_minoridad(); ?>'>
            </div>
            <div class="form-group ">
                <label>Teléfono:</label>
                <input type='text' class="form-control" name='telefono' value='<?php echo $alumno->getTelefono(); ?>'>
            </div>
            <div class="form-group ">
                <label>Correo:</label>
                <input type='text' class="form-control" name='correo' value='<?php echo $alumno->getCorreo(); ?>'>
                </div>
                <div class="form-group ">
            <label>Fecha de nacimiento:</label>
                <input type='date' class="form-control" name='fecha_nac' value='<?php echo $alumno->getFecha_nac(); ?>'>
                </div>
                <div class="form-group ">
           
                <label>Discapacidad:</label>
                <input type='text' class="form-control" name='discapacidad' value='<?php echo $alumno->getDiscapacidad(); ?>'>
            </div>
            <div class="trans"> 
	<input type="submit" class="btn btn-warning  btn-responsive btninter " name="actualizar" value='Actualizar'>
    <a class="btn btn-info btn-responsive btninter  boton" href="./index_alumno.php">Cancelar</a>
</div>
</div>
</div>
    </form>