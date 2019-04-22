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
<form method='post' class="cont">
<h3>  EDITAR USUARIO </h3>
<div class="card">
<div class="card-body">
            <input type='hidden' name='id_usuario' value='<?php echo $usuario->getId_usuario(); ?>'>
            <div class="form-group ">
                <label>Nombres:</label>
                <input  class="form-control"  type='text' name='nombre'   pattern="([a-zA-ZÑñáéíóúÁÉÍÓÚ ]{3,30}\s*)+" value='<?php echo $usuario->getNombre(); ?>'>
                </div>
                <div class="form-group ">
                <label>Apellidos:</label>
                <input class="form-control"  type='text' name='apellidos'   pattern="([a-zA-ZÑñáéíóúÁÉÍÓÚ ]{3,30}\s*)+"  value='<?php echo $usuario->getApellidos(); ?>'>
                </div>
                <div class="form-group ">
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
                                                                            <div class="form-group ">
                <label>Correo:</label>
                <input  class="form-control" type='email' name='correo' id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value='<?php echo $usuario->getCorreo(); ?>'>
                                                                            </div>
                <div class="form-group ">
                <label>Contraseña:</label>
                <input  class="form-control" type='password' name='contrasenia' value='<?php echo $usuario->getContrasenia(); ?>'>
                                                                            </div>
            

        
                                                                            <div class="trans"> 
	<input type="submit" class="btn btn-warning  btn-responsive btninter " name="actualizar" value='Actualizar'>
    <a class="btn btn-info btn-responsive btninter  boton" href="./index_usuario.php">Cancelar</a>
</div>
</div>
</div>
    </form>