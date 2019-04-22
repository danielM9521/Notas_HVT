<?php 

require_once("../models/conexion.php");
require_once("../models/cohorte.php");

class cohorte_controller{

public static function findAll(){
    $coleccion = array();
    $db=Conexion::getConnect();
    $sql=$db->query('SELECT c.id_cohorte, c.nombre, c.fecha_inicio, c.fecha_fin, s.nombre, cu.nombre, c.estado FROM Cohorte c INNER JOIN Sede s ON c.id_sede = s.id_sede INNER JOIN Curso cu ON c.id_curso = cu.id_curso');
    // carga en la $listaUsuarios cada registro desde la base de datos
    foreach ($sql->fetchAll() as $cohorte) {
        $ch= new Cohorte();
        $ch->setId_cohorte($cohorte['0']);
        $ch->setNombre($cohorte['1']);
        $ch->setFecha_inicio($cohorte['2']);
        $ch->setFecha_fin($cohorte['3']);
        $ch->setId_sede($cohorte['4']);
        $ch->setId_curso($cohorte['5']);
        if($cohorte['6']==1){
            $ch->setEstado("Activo");
        }else{
            $ch->setEstado("Inactivo");
        }
       
        array_push($coleccion, $ch);
    }
    return $coleccion;
}

public static function findAllActives(){
    $coleccion = array();
    $db=Conexion::getConnect();
    $sql=$db->query('SELECT c.id_cohorte, c.nombre, c.fecha_inicio, c.fecha_fin, s.nombre, cu.nombre, c.estado FROM Cohorte c INNER JOIN Sede s ON c.id_sede = s.id_sede INNER JOIN Curso cu ON c.id_curso = cu.id_curso WHERE estado =1');
    // carga en la $listaUsuarios cada registro desde la base de datos
    foreach ($sql->fetchAll() as $cohorte) {
        $ch= new Cohorte();
        $ch->setId_cohorte($cohorte['0']);
        $ch->setNombre($cohorte['1']);
        $ch->setFecha_inicio($cohorte['2']);
        $ch->setFecha_fin($cohorte['3']);
        $ch->setId_sede($cohorte['4']);
        $ch->setId_curso($cohorte['5']);
        if($cohorte['6']==1){
            $ch->setEstado("Activo");
        }else{
            $ch->setEstado("Inactivo");
        }
       
        array_push($coleccion, $ch);
    }
    return $coleccion;
}

public static function findById($id_cohorte){
    //buscar
    $conexion=Conexion::getConnect();
    $select=$conexion->prepare('SELECT * FROM Cohorte WHERE id_cohorte=:id_cohorte');
    $select->bindValue('id_cohorte',$id_cohorte);
    $select->execute();
    //asignarlo al objeto usuario
    $CohorteDb=$select->fetch();
    $cohorte= new Cohorte();
    $cohorte->setId_cohorte($CohorteDb['id_cohorte']);
    $cohorte->setNombre($CohorteDb['nombre']);
    $cohorte->setFecha_inicio($CohorteDb['fecha_inicio']);
    $cohorte->setFecha_fin($CohorteDb['fecha_fin']);
    $cohorte->setId_sede($CohorteDb['id_sede']);
    $cohorte->setId_curso($CohorteDb['id_curso']);
    $cohorte->setEstado($CohorteDb['estado']);
    return $cohorte;
    }

    public static function findById2($id_cohorte){
        //buscar
        $conexion=Conexion::getConnect();
        $select=$conexion->prepare('SELECT c.id_cohorte, c.nombre, c.fecha_inicio, c.fecha_fin, s.nombre, cu.nombre, c.estado FROM Cohorte c INNER JOIN Sede s ON c.id_sede = s.id_sede INNER JOIN Curso cu ON c.id_curso = cu.id_curso WHERE id_cohorte=:id_cohorte');
        $select->bindValue('id_cohorte',$id_cohorte);
        $select->execute();
        //asignarlo al objeto usuario
        $CohorteDb=$select->fetch();
        $cohorte= new Cohorte();
        $cohorte->setId_cohorte($CohorteDb['0']);
        $cohorte->setNombre($CohorteDb['1']);
        $cohorte->setFecha_inicio($CohorteDb['2']);
        $cohorte->setFecha_fin($CohorteDb['3']);
        $cohorte->setId_sede($CohorteDb['4']);
        $cohorte->setId_curso($CohorteDb['5']);
        $cohorte->setEstado($CohorteDb['6']);
        return $cohorte;
        }

    //la función para actualizar 
public static function update($cohorte){
    $conexion=Conexion::getConnect();
    $update=$conexion->prepare('UPDATE Cohorte SET nombre=:nombre, fecha_inicio=:fecha_inicio, fecha_fin=:fecha_fin, id_sede=:id_sede, id_curso=:id_curso, estado=:estado WHERE id_cohorte=:id_cohorte');
    $update->bindValue('id_cohorte', $cohorte->getId_cohorte());
    $update->bindValue('nombre',$cohorte->getNombre());
    $update->bindValue('fecha_inicio',$cohorte->getFecha_inicio());
    $update->bindValue('fecha_fin',$cohorte->getFecha_fin());
    $update->bindValue('id_sede',$cohorte->getId_sede());
    $update->bindValue('id_curso',$cohorte->getId_curso());
    $update->bindValue('estado',$cohorte->getEstado());
    $update->execute();
    header("location:../views/index_cohorte.php");
}

// la función para eliminar por el id
public static function delete($id_cohorte){
    $conexion=Conexion::getConnect();
    $delete=$conexion->prepare('DELETE FROM Cohorte WHERE id_cohorte=:id_cohorte');
    $delete->bindValue('id_cohorte',$id_cohorte);
    $delete->execute();
    }

//la función para registrar un cohorte
public static function save($cohorte){
    $conexion=Conexion::getConnect();
    $insert=$conexion->prepare('INSERT INTO Cohorte VALUES(NULL,:nombre,:fecha_inicio,:fecha_fin,:id_sede,:id_curso,:estado)');
    $insert->bindValue('nombre',$cohorte->getNombre());
    $insert->bindValue('fecha_inicio',$cohorte->getFecha_inicio());
    $insert->bindValue('fecha_fin',$cohorte->getFecha_fin());
    $insert->bindValue('id_sede',$cohorte->getId_sede());
    $insert->bindValue('id_curso',$cohorte->getId_curso());
    $insert->bindValue('estado',$cohorte->getEstado());
    $insert->execute();
    header("location:../views/index_cohorte.php");
}

}
?>