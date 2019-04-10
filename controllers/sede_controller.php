<?php 
require_once("../models/conexion.php");
require_once("../models/sede.php");

class sede_controller{

public static function findAll(){
    $coleccion = array();
    $db=Conexion::getConnect();
    $sql=$db->query('SELECT * FROM Sede');
    // carga en la $listaUsuarios cada registro desde la base de datos
    foreach ($sql->fetchAll() as $sede) {
        $c= new Sede();
        $c->setId_sede($sede['id_sede']);
        $c->setNombre($sede['nombre']);
        $c->setDireccion($sede['direccion']);
        $c->setTelefono($sede['telefono']);
        $c->setCorreo($sede['correo']);
        $c->setDepartamento($sede['departamento']);
        $c->setMunicipio($sede['municipio']);
        array_push($coleccion, $c);
    }
    return $coleccion;
}

public static function findById($id_sede){
    //buscar
    $conexion=Conexion::getConnect();
    $select=$conexion->prepare('SELECT * FROM Sede WHERE id_sede=:id_sede');
    $select->bindValue('id_sede',$id_sede);
    $select->execute();
    //asignarlo al objeto usuario
    $SedeDb=$select->fetch();
    $sede= new Sede();
    $sede->setId_sede($SedeDb['id_sede']);
    $sede->setNombre($SedeDb['nombre']);
    $sede->setTelefono($SedeDb['telefono']);
    $sede->setCorreo($SedeDb['correo']);
    $sede->setDireccion($SedeDb['direccion']);
    $sede->setDepartamento($SedeDb['departamento']);
    $sede->setMunicipio($SedeDb['municipio']);
    return $sede;
    }

    //la función para actualizar 
public static function update($sede){
    $conexion=Conexion::getConnect();
    $update=$conexion->prepare('UPDATE Sede SET nombre=:nombre, telefono=:telefono, correo=:correo, direccion=:direccion, departamento=:departamento, municipio=:municipio WHERE id_sede=:id_sede');
    $update->bindValue('id_sede', $sede->getId_sede());
    $update->bindValue('nombre',$sede->getNombre());
    $update->bindValue('telefono',$sede->getTelefono());
    $update->bindValue('correo',$sede->getCorreo());
    $update->bindValue('direccion',$sede->getDireccion());
    $update->bindValue('departamento',$sede->getDepartamento());
    $update->bindValue('municipio',$sede->getMunicipio());
    $update->execute();
    require_once("../views/index_sede.php");
}


}

















?>