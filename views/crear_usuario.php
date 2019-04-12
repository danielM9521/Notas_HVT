<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<br><br>
<form method="post" class="cont">
<h3>  NUEVO USUARIO </h3>
<div class="card">
<div class="card-body">
<div class="form-group ">
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

    <div class="form-group ">
    <label for="nombre">Nombres:</label>
    <input  class="form-control" type="text" name="nombre" required placeholder="Ingrese nombres ">
    </div>
    <div class="form-group">
    <label for="apellidos">Apellidos:</label>
    <input  class="form-control" type="text" name="apellidos" required placeholder="Ingrese apellidos">
    </div>

    <div class="form-group">
    <label for="correo">Correo:</label>
    <input  class="form-control" type="text" name="correo" required placeholder="Ej.ulises.samayoa@proyectosfgk.org ">
    </div>

    <div class="form-group">
    <label for="estado">Contraseña:</label>
    <input  class="form-control" type="password" name="contrasenia" required placeholder="Ingrese contraseña ">
    </div>

    <div class="trans"> 
    <input type="submit" class="btn btn-success  btn-responsive btninter " value="Guardar" name="guardar">
    <a class="btn btn-info btn-responsive btninter  boton " href="./index_usuario.php">Cancelar</a>
            </div> 
            </div>

</div>
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