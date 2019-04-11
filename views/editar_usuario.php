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
    <br><br>
    <form method='post'>
        
            <input type='hidden' name='id_usuario' value='<?php echo $usuario->getId_usuario(); ?>'>
            <div class="form-group col-md-6">
                <label>Nombres:</label>
                <input  class="form-control"  type='text' name='nombre' value='<?php echo $usuario->getNombre(); ?>'>
                </div>
                <div class="form-group col-md-6">
                <label>Apellidos:</label>
                <input class="form-control"  type='text' name='apellidos' value='<?php echo $usuario->getApellidos(); ?>'>
                </div>
                <div class="form-group col-md-6">
                <label>Rol:</label>
                
                    <select  class="form-control"  name="id_rol">
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
                

                </select>
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                <label>Correo:</label>
                <input  class="form-control" type='text' name='correo' value='<?php echo $usuario->getCorreo(); ?>'>
                                                                            </div>
                <div class="form-group col-md-6">
                <label>Contraseña:</label>
                <input  class="form-control" type='text' name='contrasenia' value='<?php echo $usuario->getContrasenia(); ?>'>
                                                                            </div>
            

        
        <input type="submit"class="btn btn-success boton" name="actualizar" value='Actualizar'>
        <a class="btn btn-warning" href="./index_usuario.php">Cancelar</a>
    </form>