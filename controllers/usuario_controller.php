<?php 
require_once("../models/conexion.php");
require_once("../models/usuario.php");

class usuario_controller{

public static function findAll(){
    $coleccion = array();
    $db=Conexion::getConnect();
    $sql=$db->query('SELECT u.id_usuario, u.nombre, u.apellidos, r.nombre, u.correo, u.contrasenia FROM Usuario u INNER JOIN Rol r ON u.id_rol = r.id_rol');
    // carga en la $listaUsuarios cada registro desde la base de datos
    foreach ($sql->fetchAll() as $usuario) {
        $us= new Usuario();
        $us->setId_usuario($usuario['0']);
        $us->setNombre($usuario['1']);
        $us->setApellidos($usuario['2']);
        $us->setId_rol($usuario['3']);
        $us->setCorreo($usuario['4']);
        $us->setContrasenia($usuario['5']);
        array_push($coleccion, $us);
    }
    return $coleccion;
}


public static function findById($id_usuario){
    //buscar
    $conexion=Conexion::getConnect();
    $select=$conexion->prepare('SELECT * FROM Usuario WHERE id_usuario=:id_usuario');
    $select->bindValue('id_usuario',$id_usuario);
    $select->execute();
    //asignarlo al objeto usuario
    $UsuarioDb=$select->fetch();
    $usuario= new Usuario();
    $usuario->setId_usuario($UsuarioDb['id_usuario']);
    $usuario->setNombre($UsuarioDb['nombre']);
    $usuario->setApellidos($UsuarioDb['apellidos']);
    $usuario->setId_rol($UsuarioDb['id_rol']);
    $usuario->setCorreo($UsuarioDb['correo']);
    $usuario->setContrasenia($UsuarioDb['contrasenia']);
    return $usuario;
    }

    //la función para actualizar 
public static function update($usuario){
    $conexion=Conexion::getConnect();
    $update=$conexion->prepare('UPDATE Usuario SET nombre=:nombre, apellidos=:apellidos, id_rol=:id_rol, id_sede=:id_sede, id_curso=:id_curso, estado=:estado WHERE id_cohorte=:id_cohorte');
    $update->bindValue('id_usuario', $usuario->getId_cohorte());
    $update->bindValue('nombre',$usuario->getNombre());
    $update->bindValue('apellidos',$usuario->getApellidos());
    $update->bindValue('id_rol',$usuario->getId_rol());
    $update->bindValue('correo',$usuario->getCorreo());
    $update->bindValue('contrasenia',$usuario->getContrasenia());
    $update->bindValue('estado',$usuario->getEstado());
    $update->execute();
    header("location:../views/index_usuario.php");
}

// la función para eliminar por el id
public static function delete($id_usuario){
    $conexion=Conexion::getConnect();
    $delete=$conexion->prepare('DELETE FROM Cohorte WHERE id_usuario=:id_usuario');
    $delete->bindValue('id_usuario',$id_usuario);
    $delete->execute();
    }

//la función para registrar un usuario
public static function save($usuario){
    $conexion=Conexion::getConnect();
    $insert=$conexion->prepare('INSERT INTO Cohorte VALUES(NULL,:nombre,:apellidos,:id_rol,:correo,:contrasenia)');
    $insert->bindValue('nombre',$usuario->getNombre());
    $insert->bindValue('apellidos',$usuario->getApellidos());
    $insert->bindValue('id_rol',$usuario->getId_rol());
    $insert->bindValue('correo',$usuario->getCorreo());
    $insert->bindValue('contrasenia',$usuario->getContrasenia());
    $insert->execute();
    header("location:../views/index_alumno.php");
}

}
?>