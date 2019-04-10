<?php 
require_once("../models/conexion.php");
require_once("../models/rol.php");

class rol_controller{

public static function findAll(){
    $coleccion = array();
    $db=Conexion::getConnect();
    $sql=$db->query('SELECT * FROM Rol');
    // carga en la $listaUsuarios cada registro desde la base de datos
    foreach ($sql->fetchAll() as $rol) {
        $c= new Rol();
        $c->setId_rol($rol['id_rol']);
        $c->setNombre($rol['nombre']);
        array_push($coleccion, $c);
    }
    return $coleccion;
}

public static function findById($id_rol){
    //buscar
    $conexion=Conexion::getConnect();
    $select=$conexion->prepare('SELECT * FROM Rol WHERE id_rol=:id_rol');
    $select->bindValue('id_rol',$id_rol);
    $select->execute();
    //asignarlo al objeto usuario
    $RolDb=$select->fetch();
    $rol= new Rol();
    $rol->setId_rol($RolDb['id_rol']);
    $rol->setNombre($RolDb['nombre']);
    return $rol;
    }

    //la función para actualizar 
public static function update($rol){
    $conexion=Conexion::getConnect();
    $update=$conexion->prepare('UPDATE Rol SET nombre=:nombre WHERE id_rol=:id_rol');
    $update->bindValue('id_rol', $rol->getId_rol());
    $update->bindValue('nombre',$rol->getNombre());
    $update->execute();
    header("location:../views/index_rol.php");
}

// la función para eliminar por el id
public static function delete($id_rol){
    $conexion=Conexion::getConnect();
    $delete=$conexion->prepare('DELETE FROM Rol WHERE id_rol=:id_rol');
    $delete->bindValue('id_rol',$id_rol);
    $delete->execute();
    }

//la función para registrar un usuario
public static function save($rol){
    $conexion=Conexion::getConnect();
    $insert=$conexion->prepare('INSERT INTO Rol VALUES(NULL,:nombre)');
    $insert->bindValue('nombre',$rol->getNombre());
    $insert->execute();
    header("location:../views/index_rol.php");
}

}