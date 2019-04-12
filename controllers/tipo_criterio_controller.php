<?php 
require_once("../models/conexion.php");
require_once("../models/tipo_criterio.php");

class tipo_criterio_controller{

public static function findAll(){
    $coleccion = array();
    $db=Conexion::getConnect();
    $sql=$db->query('SELECT * FROM Tipo_criterio');
    // carga en la $listaUsuarios cada registro desde la base de datos
    foreach ($sql->fetchAll() as $tipo_criterio) {
        $c= new Tipo_criterio();
        $c->setId_tipo_criterio($tipo_criterio['id_tipo_criterio']);
        $c->setNombre($tipo_criterio['nombre']);
        array_push($coleccion, $c);
    }
    return $coleccion;
}

public static function findById($id_tipo_criterio){
    //buscar
    $conexion=Conexion::getConnect();
    $select=$conexion->prepare('SELECT * FROM Tipo_criterio WHERE id_tipo_criterio=:id_tipo_criterio');
    $select->bindValue('id_tipo_criterio',$id_tipo_criterio);
    $select->execute();
    //asignarlo al objeto usuario
    $tipo_criterioDb=$select->fetch();
    $tipo_criterio= new Tipo_criterio();
    $tipo_criterio->setId_tipo_criterio($tipo_criterioDb['id_tipo_criterio']);
    $tipo_criterio->setNombre($tipo_criterioDb['nombre']);
    return $tipo_criterio;
    }

    //la función para actualizar 
public static function update($tipo_criterio){
    $conexion=Conexion::getConnect();
    $update=$conexion->prepare('UPDATE Tipo_criterio SET nombre=:nombre WHERE id_tipo_criterio=:id_tipo_criterio');
    $update->bindValue('id_tipo_criterio', $tipo_criterio->getId_tipo_criterio());
    $update->bindValue('nombre',$tipo_criterio->getNombre());
    $update->execute();
    header("location:../views/index_tipo_criterio.php");
}

// la función para eliminar por el id
public static function delete($id_tipo_criterio){
    $conexion=Conexion::getConnect();
    $delete=$conexion->prepare('DELETE FROM Tipo_criterio WHERE id_tipo_criterio=:id_tipo_criterio');
    $delete->bindValue('id_tipo_criterio',$id_tipo_criterio);
    $delete->execute();
    }

//la función para registrar un usuario
public static function save($tipo_criterio){
    $conexion=Conexion::getConnect();
    $insert=$conexion->prepare('INSERT INTO Tipo_criterio VALUES(NULL,:nombre)');
    $insert->bindValue('nombre',$tipo_criterio->getNombre());
    $insert->execute();
    header("location:../views/index_tipo_criterio.php");
}

}








