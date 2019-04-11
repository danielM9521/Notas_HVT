<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<br><br>
<form method="post">
<div class="form-group col-md-6">
<label for="id_rol">Rol:</label>
    <select  class="form-control" name="id_rol">
    <?php 
            include_once("../controllers/rol_controller.php"); 
            $rc = new rol_controller();
            $roles = $rc->findAll();
            foreach($roles as $rol){?>
                <option value="<?php echo $rol->getId_rol();?>"><?php echo $rol->getNombre();?></option>
            <?php }
        ?>

    </select>
            </div>

    <div class="form-group col-md-6">
    <label for="nombre">Nombres:</label>
    <input  class="form-control" type="text" name="nombre">
    </div>
    <div class="form-group col-md-6">
    <label for="apellidos">Apellidos:</label>
    <input  class="form-control" type="text" name="apellidos">
    </div>

    <div class="form-group col-md-6">
    <label for="correo">Correo:</label>
    <input  class="form-control" type="text" name="correo">
    </div>

    <div class="form-group col-md-6">
    <label for="estado">Contraseña:</label>
    <input  class="form-control" type="password" name="contrasenia">
    </div>

    <input  type="submit" class="btn btn-success  boton" value="Guardar" name="guardar">
    <a class="btn btn-info" href="./index_usuario.php">Cancelar</a>
</form>

<?php
if(isset($_POST['guardar'])){
    include_once("../controllers/usuario_controller.php");
    $cu = new usuario_controller();
    $usuario = new Usuario();
    $usuario->setId_usuario(null);
    $usuario->setNombre($_POST['nombre']);
    $usuario->setApellidos($_POST['apellidos']);
    $usuario->setId_rol($_POST['id_rol']);
    $usuario->setCorreo($_POST['correo']);
    $usuario->setContrasenia($_POST['contrasenia']);
    $cu->save($usuario);
}

?>