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
        $c->setId_criterio($nota['id_criterio']);
        $c->setNota_inicio($nota['nota_inicio']);
        $c->setNota_fin($nota['nota_fin']);
        $c->setFecha_llenado_inicio($nota['fecha_llenado_inicio']);
        $c->setFecha_llenado_fin($nota['fecha_llenado_fin']);
        $c->setId_alumno($nota['id_alumno']);
        $c->setId_usuario($nota['id_usuario']);
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

    public static function findByAlumno($id_alumno){
        //buscar
        $conexion=Conexion::getConnect();
        $select=$conexion->prepare('SELECT * FROM Nota WHERE id_alumno=:id_alumno');
        $select->bindValue('id_alumno',$id_alumno);
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

        public static function findAllByAC($id_alumno, $id_criterio){
            $coleccion = array();
            $db=Conexion::getConnect();
            $sql=$db->prepare('SELECT * FROM Nota WHERE id_alumno=:id_alumno AND id_criterio=:id_criterio');
            $sql->bindValue('id_alumno',$id_alumno);
            $sql->bindValue('id_criterio',$id_criterio);
            $sql->execute();
            // carga en la $listaUsuarios cada registro desde la base de datos
            foreach ($sql->fetchAll() as $nota) {
                $c= new Nota();
                $c->setId_nota($nota['id_nota']);
                $c->setNombre_materia($nota['nombre_materia']);
                $c->setId_criterio($nota['id_criterio']);
                $c->setNota_inicio($nota['nota_inicio']);
                $c->setNota_fin($nota['nota_fin']);
                $c->setFecha_llenado_inicio($nota['fecha_llenado_inicio']);
                $c->setFecha_llenado_fin($nota['fecha_llenado_fin']);
                $c->setId_alumno($nota['id_alumno']);
                $c->setId_usuario($nota['id_usuario']);
                array_push($coleccion, $c);
            }
            return $coleccion;
        }





    //la función para actualizar 
public static function update($nota){
    $conexion=Conexion::getConnect();
    $update=$conexion->prepare('UPDATE Nota SET nombre_materia=:nombre_materia, id_criterio=:id_criterio, nota_inicio=:nota_inicio, nota_fin=:nota_fin, fecha_llenado_inicio=:fecha_llenado_inicio,
     fecha_llenado_fin=:fecha_llenado_fin,id_alumno = :id_alumno,id_usuario =:id_usuario  WHERE id_nota=:id_nota');
     $update->bindValue('id_nota',$nota->getId_nota());
     $update->bindValue('nombre_materia',$nota->getNombre_materia());
     $update->bindValue('id_criterio',$nota->getId_criterio());
     $update->bindValue('nota_inicio',$nota->getNota_inicio());
     $update->bindValue('nota_fin',$nota->getNota_fin());
     $update->bindValue('fecha_llenado_inicio',$nota->getFecha_llenado_inicio());
     $update->bindValue('fecha_llenado_fin',$nota->getFecha_llenado_fin());
     $update->bindValue('id_alumno',$nota->getId_alumno());
     $update->bindValue('id_usuario',$nota->getId_usuario());
    $update->execute();
    require_once("../home.php");
}
public static function delete($id_nota){
    $conexion=Conexion::getConnect();
    $delete=$conexion->prepare('DELETE FROM Nota WHERE id_nota=:id_nota');
    $delete->bindValue('id_nota',$id_nota);
    $delete->execute();
    }

//la función para registrar un usuario
public static function save($nota){
    $conexion=Conexion::getConnect();
    $insert=$conexion->prepare('INSERT INTO Nota VALUES(NULL,:nombre_materia, :id_criterio, :nota_inicio, :nota_fin, :fecha_llenado_inicio,
    :fecha_llenado_fin, :id_alumno,:id_usuario)');
  $insert->bindValue('nombre_materia',$nota->getNombre_materia());
  $insert->bindValue('id_criterio',$nota->getId_criterio());
  $insert->bindValue('nota_inicio',$nota->getNota_inicio());
  $insert->bindValue('nota_fin',$nota->getNota_fin());
  $insert->bindValue('fecha_llenado_inicio',$nota->getFecha_llenado_inicio());
  $insert->bindValue('fecha_llenado_fin',$nota->getFecha_llenado_fin());
  $insert->bindValue('id_alumno',$nota->getId_alumno());
  $insert->bindValue('id_usuario',$nota->getId_usuario());
  $insert->execute();
    header("location:../home.php");
}

}


?>