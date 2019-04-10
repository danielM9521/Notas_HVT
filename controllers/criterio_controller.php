<?php 
require_once("../models/conexion.php");
require_once("../models/criterio.php");

class criterio_controller{

public static function findAll(){
    $coleccion = array();
    $db=Conexion::getConnect();
    $sql=$db->query('SELECT * FROM Criterio');
    // carga en la $listaUsuarios cada registro desde la base de datos
    foreach ($sql->fetchAll() as $criterio) {
        $c= new Criterio();
        $c->setId_criterio($criterio['id_criterio']);
        $c->setNombre($criterio['nombre']);
        array_push($coleccion, $c);
    }
    return $coleccion;
}

public static function findById($id_criterio){
    //buscar
    $conexion=Conexion::getConnect();
    $select=$conexion->prepare('SELECT * FROM Criterio WHERE id_criterio=:id_criterio');
    $select->bindValue('id_criterio',$id_criterio);
    $select->execute();
    //asignarlo al objeto usuario
    $criterioDb=$select->fetch();
    $criterio= new Criterio();
    $criterio->setId_criterio($criterioDb['id_criterio']);
    $criterio->setNombre($criterio['nombre']);
    return $criterio;
    }

    //la función para actualizar 
public static function update($criterio){
    $conexion=Conexion::getConnect();
    $update=$conexion->prepare('UPDATE Criterio SET nombre=:nombre WHERE id_criterio=:criterio');
    $update->bindValue('id_criterio', $criterio->getId_criterio());
    $update->bindValue('nombre',$criterio->getNombre());
    $update->execute();
    header("location:../views/index_criterio.php");
}

// la función para eliminar por el id
public static function delete($id_criterio){
    $conexion=Conexion::getConnect();
    $delete=$conexion->prepare('DELETE FROM Criterio WHERE id_criterio=:id_criterio');
    $delete->bindValue('id_criterio',$id_criterio);
    $delete->execute();
    }

//la función para registrar un usuario
public static function save($criterio){
    $conexion=Conexion::getConnect();
    $insert=$conexion->prepare('INSERT INTO Criterio VALUES(NULL,:nombre)');
    $insert->bindValue('nombre',$criterio->getNombre());
    $insert->execute();
    header("location:../views/index_criterio.php");
}

}








