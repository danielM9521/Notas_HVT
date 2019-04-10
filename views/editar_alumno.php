<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./css/datatables.min.css" />
    <script type="text/javascript" src="./js/datatables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <div class="topnav" id="myTopnav">
        <a href="../index.php" class="active">Inicio</a>

        <div class="dropdown">
            <button class="dropbtn">Mantenimiento
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="index_sede.php">Sede</a>
                <a href="./index_curso.php">Curso</a>
                <a href="./index_cohorte.php">Cohorte</a>
                <a href="./index_rol.php">Rol</a>
                <a href="./index_usuario.php">Usuario</a>
                <a href="./index_alumno.php">Alumno</a>
                <a href="./index_competencia.php">Competencia</a>
                <a href="./index_criterio.php">Criterio</a>
                <a href="./index_nota.php">Nota</a>
            </div>
        </div>
        <a href="#about">Acerca de</a>
        <a href="#about">Cerrar sesión</a>
        <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>
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
    <form method='post'>
        <table>
            <input type='hidden' name='id_alumno' value='<?php echo $alumno->getId_alumno(); ?>'>
            <tr>
                <td><label>Nombres:</label></td>
                <td><input type='text' name='nombre' value='<?php echo $alumno->getNombre(); ?>'></td>
            </tr>
            <tr>
                <td><label>Apellidos:</label></td>
                <td><input type='text' name='apellidos' value='<?php echo $alumno->getApellidos(); ?>'></td>
            </tr>
            <tr>
                <td><label>Dirección:</label></td>
                <td><input type='text' name='direccion' value='<?php echo $alumno->getDireccion(); ?>'></td>
            </tr>

            <tr>
                <td><label>Cohorte:</label></td>
                <td>
                    <select name="id_cohorte">
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
                </td>
                </select>
            </tr>
            
            <tr>
                <td><label>Estado civil :</label></td>
                <td>
                    <select name="estado_civil">
                        <option value="Soltera/o" <?php if($alumno->getEstado_civil()=="Soltera/o"){echo "selected";}?>>Soltera/o</option>
                        <option value="Viuda/o"<?php if($alumno->getEstado_civil()=="Viuda/o"){echo "selected";}?>>Viuda/o</option>
                        <option value="Casada/o"<?php if($alumno->getEstado_civil()=="Casada/o"){echo "selected";}?>>Casada/o</option>
                        <option value="Divorciada/o"<?php if($alumno->getEstado_civil()=="Divorciada/o"){echo "selected";}?>>Divorciada/o</option>
                    </select>                                                                
                </td>
            </tr>
            <tr>
                <td><label>Sexo:</label></td>
                <td>
                    <input type="radio" name="sexo" value="Femenino" <?php if($alumno->getSexo()=="Femenino"){echo "checked";}?>>Femenino
                    <input type="radio" name="sexo" value="Masculino" <?php if($alumno->getSexo()=="Masculino"){echo "checked";}?>>Masculino
                    <input type="radio" name="sexo" value="Otro" <?php if($alumno->getSexo()=="Otro"){echo "checked";}?>>Otro
            </td>
            </tr>
            <tr>
                <td><label>DUI:</label></td>
                <td><input type='text' name='dui' value='<?php echo $alumno->getDui(); ?>'></td>
            </tr>
            <tr>
                <td><label>NIT:</label></td>
                <td><input type='text' name='nit' value='<?php echo $alumno->getNit(); ?>'></td>
            </tr>
            <tr>
                <td><label>Carnet de minoridad:</label></td>
                <td><input type='text' name='carnet_minoridad' value='<?php echo $alumno->getCarnet_minoridad(); ?>'></td>
            </tr>
            <tr>
                <td><label>Teléfono:</label></td>
                <td><input type='text' name='telefono' value='<?php echo $alumno->getTelefono(); ?>'></td>
            </tr>
            <tr>
                <td><label>Correo:</label></td>
                <td><input type='text' name='correo' value='<?php echo $alumno->getCorreo(); ?>'></td>
            </tr>
            <tr>
                <td><label>Fecha de nacimiento:</label></td>
                <td><input type='date' name='fecha_nac' value='<?php echo $alumno->getFecha_nac(); ?>'></td>
            </tr>
            <tr>
                <td><label>Discapacidad:</label></td>
                <td><input type='text' name='discapacidad' value='<?php echo $alumno->getDiscapacidad(); ?>'></td>
            </tr>
        </table>
        <input type="submit" name="actualizar" value='Actualizar'>
        <a class="btn btn-warning" href="./index_alumno.php">Cancelar</a>
    </form>