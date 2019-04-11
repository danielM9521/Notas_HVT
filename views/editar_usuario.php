<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
    <?php
    include_once("../controllers/usuario_controller.php");
    $cc = new usuario_controller();
    if (isset($_GET['id_usuario'])) {
        $id_usuario = $_GET['id_usuario'];
        $usuario = $cc->findById($id_usuario);
    } else {
        header("location:index_cohorte.php");
    }

    if (isset($_POST) && !empty($_POST)) {
        $c = new Usuario();
        $c->setId_usuario($_POST['id_usuario']);
        $c->setNombre($_POST['nombre']);
        $c->setApellidos($_POST['apellidos']);
        $c->setId_rol($_POST['id_rol']);
        $c->setCorreo($_POST['correo']);
        $c->setContrasenia($_POST['contrasenia']);
        $cc->update($c);
    }
    ?>
    <form method='post'>
        <table>
            <input type='hidden' name='id_usuario' value='<?php echo $usuario->getId_usuario(); ?>'>
            <tr>
                <td><label>Nombres:</label></td>
                <td><input type='text' name='nombre' value='<?php echo $usuario->getNombre(); ?>'></td>
            </tr>
            <tr>
                <td><label>Apellidos:</label></td>
                <td><input type='text' name='apellidos' value='<?php echo $usuario->getApellidos(); ?>'></td>
            </tr>
            <tr>
                <td><label>Rol:</label></td>
                <td>
                    <select name="id_rol">
                        <?php
                        include_once("../controllers/rol_controller.php");
                        $sc = new rol_controller();
                        $roles = $sc->findAll();
                        foreach ($roles as $rol) { ?>
                            <option value="<?php echo $rol->getId_rol(); ?>" <?php if ($rol->getId_rol() == $usuario->getId_rol()) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $rol->getNombre(); ?></option>
                        <?php }
                    ?>
                </td>

                </select>
            </tr>
            <tr>
                <td><label>Correo:</label></td>
                <td><input type='text' name='correo' value='<?php echo $usuario->getCorreo(); ?>'></td>
            </tr>
            <tr>
                <td><label>Contraseña:</label></td>
                <td><input type='text' name='contrasenia' value='<?php echo $usuario->getContrasenia(); ?>'></td>
            </tr>
            

        </table>
        <input type="submit" name="actualizar" value='Actualizar'>
        <a class="btn btn-warning" href="./index_usuario.php">Cancelar</a>
    </form>