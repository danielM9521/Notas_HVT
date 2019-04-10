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
    include_once("../controllers/cohorte_controller.php");
    $cc = new cohorte_controller();
    if (isset($_GET['id_cohorte'])) {
        $id_cohorte = $_GET['id_cohorte'];
        $cohorte = $cc->findById($id_cohorte);
    } else {
        header("location:index_cohorte.php");
    }

    if (isset($_POST) && !empty($_POST)) {
        $c = new Cohorte();
        $c->setId_cohorte($_POST['id_cohorte']);
        $c->setNombre($_POST['nombre']);
        $c->setFecha_inicio($_POST['fecha_inicio']);
        $c->setFecha_fin($_POST['fecha_fin']);
        $c->setId_sede($_POST['id_sede']);
        $c->setId_curso($_POST['id_curso']);
        $c->setEstado($_POST['estado']);
        $cc->update($c);
    }
    ?>
    <form method='post'>
        <table>
            <input type='hidden' name='id_cohorte' value='<?php echo $cohorte->getId_cohorte(); ?>'>
            <tr>
                <td><label>Nombre:</label></td>
                <td><input type='text' name='nombre' value='<?php echo $cohorte->getNombre(); ?>'></td>
            </tr>
            <tr>
                <td><label>Fecha de inicio:</label></td>
                <td><input type='date' name='fecha_inicio' value='<?php echo $cohorte->getFecha_inicio(); ?>'></td>
            </tr>
            <tr>
                <td><label>Fecha de finalización:</label></td>
                <td><input type='date' name='fecha_fin' value='<?php echo $cohorte->getFecha_fin(); ?>'></td>
            </tr>

            <tr>
                <td><label>Sede:</label></td>
                <td>
                    <select name="id_sede">
                        <?php
                        include_once("../controllers/sede_controller.php");
                        $sc = new sede_controller();
                        $sedes = $sc->findAll();
                        foreach ($sedes as $sede) { ?>
                            <option value="<?php echo $sede->getId_sede(); ?>" <?php if ($sede->getId_sede() == $cohorte->getId_sede()) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $sede->getNombre(); ?></option>
                        <?php }
                    ?>
                </td>

                </select>
            </tr>
            <tr>
                <td><label>Curso:</label></td>
                <td>
                    <select name="id_curso">
                        <?php
                        include_once("../controllers/curso_controller.php");
                        $cc = new curso_controller();
                        $cursos = $cc->findAll();
                        foreach ($cursos as $curso) { ?>
                            <option value="<?php echo $curso->getId_curso(); ?>" <?php if ($curso->getId_curso() == $cohorte->getId_curso()) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $curso->getNombre(); ?></option>
                        <?php }
                    ?>
                </td>
            </tr>
            <tr>
                <td><label>Estado:</label></td>
                <td><input type="radio" name="estado" value="1" <?php if ($cohorte->getEstado() == 1) {
                                                                    echo "checked";
                                                                } ?>>Activo
                    <input type="radio" name="estado" value="0" <?php if ($cohorte->getEstado() == 0) {
                                                                    echo "checked";
                                                                } ?>>Inactivo
            </tr>

        </table>
        <input type="submit" name="actualizar" value='Actualizar'>
        <a class="btn btn-warning" href="./index_cohorte.php">Cancelar</a>
    </form>