<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
<form method="post">
<label for="id_rol">Rol:</label>
    <select name="id_rol">
    <?php 
            include_once("../controllers/rol_controller.php"); 
            $rc = new rol_controller();
            $roles = $rc->findAll();
            foreach($roles as $rol){?>
                <option value="<?php echo $rol->getId_rol();?>"><?php echo $rol->getNombre();?></option>
            <?php }
        ?>

    </select><br><br>

    <label for="nombre">Nombres:</label>
    <input type="text" name="nombre"><br><br>
    
    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos"><br><br>

    <label for="correo">Correo:</label>
    <input type="text" name="correo"><br><br>

    <label for="estado">Contraseña:</label>
    <input type="password" name="contrasenia">
    <br><br>

    <input type="submit" value="Guardar" name="guardar">
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