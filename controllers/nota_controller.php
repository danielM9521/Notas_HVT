<?php 
require_once("../models/conexion.php");
require_once("../models/nota.php");

class nota_controller{

public static function findAll(){
    $coleccion = array();
    $db=Conexion::getConnect();
    $sql=$db->query('SELECT * FROM Nota');
    // carga en la $listaUsuarios cada registro desde la base de datos
    foreach ($sql->fetchAll() as $nota) {
        $c= new Nota();
        $c->setId_nota($nota['id_nota']);
        $c->setNombre_materia($nota['nombre_materia']);
        $c->setId_criterio($_POST['id_criterio']);
        $c->setNota_inicio($_POST['nota_inicio']);
        $c->setNota_fin($_POST['nota_fin']);
        $c->setFecha_llenado_inicio($_POST['fecha_llenado_inicio']);
        $c->setFecha_llenado_fin($_POST['fecha_llenado_fin']);
        $c->setId_alumno($_POST['id_alumno']);
        $c->setId_usuario($_POST['id_usuario']);
        array_push($coleccion, $c);
    }
    return $coleccion;
}

public static function findById($id_nota){
    //buscar
    $conexion=Conexion::getConnect();
    $select=$conexion->prepare('SELECT * FROM Nota WHERE id_nota=:id_nota');
    $select->bindValue('id_nota',$id_nota);
    $select->execute();
    //asignarlo al objeto usuario
    $NotaDb=$select->fetch();
    $nota= new Nota();
    $nota->setId_nota( $NotaDb['id_nota']);
    $nota->setNombre_materia( $NotaDb['nombre_materia']);
    $nota->setId_criterio( $NotaDb['id_criterio']);
    $nota->setNota_inicio( $NotaDb['nota_inicio']);
    $nota->setNota_fin( $NotaDb['nota_fin']);
    $nota->setFecha_llenado_inicio( $NotaDb['fecha_llenado_inicio']);
    $nota->setFecha_llenado_fin( $NotaDb['fecha_llenado_fin']);
    $nota->setId_alumno( $NotaDb['id_alumno']);
    $nota->setId_usuario( $NotaDb['id_usuario']);
    return $nota;
    }

    //la función para actualizar 
public static function update($nota){
    $conexion=Conexion::getConnect();
    $update=$conexion->prepare('UPDATE Nota SET nombre_materia=:nombre_materia, id_criterio=:id_criterio, nota_inicio=:nota_inicio, nota_fin=:nota_fin, fecha_llenado_inicio=:fecha_llenado_inicio,
     fecha_llenado_fin=:fecha_llenado_fin,id_alumno = :id_alumno,id_usuario =:id_usuario  WHERE id_nota=:id_nota');
     $update->bindValue('id_nota',$nota->getId_nota());
     $update->bindValue('nombre_materia',$nota->getinombre_materia());
     $update->bindValue('id_criterio',$nota->getId_criterio());
     $update->bindValue('nota_inicio',$nota->getnota_inicio());
     $update->bindValue('nota_fin',$nota->getnota_fin());
     $update->bindValue('fecha_llenado_inicio',$nota->getfecha_llenado_inicio());
     $update->bindValue('fecha_llenado_fin',$nota->getfecha_llenado_fin());
     $update->bindValue('id_alumno',$nota->getId_alumno());
     $update->bindValue('id_usuario',$nota->getId_usuario());
    $update->execute();
    require_once("../views/index_nota.php");
}


}





?>