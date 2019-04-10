<?php 
require_once("../models/conexion.php");
require_once("../models/curso.php");

class curso_controller{

public static function findAll(){
    $coleccion = array();
    $db=Conexion::getConnect();
    $sql=$db->query('SELECT * FROM Curso');
    // carga en la $listaUsuarios cada registro desde la base de datos
    foreach ($sql->fetchAll() as $curso) {
        $c= new Curso();
        $c->setId_curso($curso['id_curso']);
        $c->setNombre($curso['nombre']);
        array_push($coleccion, $c);
    }
    return $coleccion;
}

public static function findById($id_curso){
    //buscar
    $conexion=Conexion::getConnect();
    $select=$conexion->prepare('SELECT * FROM Curso WHERE id_curso=:id_curso');
    $select->bindValue('id_curso',$id_curso);
    $select->execute();
    //asignarlo al objeto usuario
    $CursoDb=$select->fetch();
    $curso= new Curso();
    $curso->setId_curso($CursoDb['id_curso']);
    $curso->setNombre($CursoDb['nombre']);
    return $curso;
    }

    //la función para actualizar 
public static function update($curso){
    $conexion=Conexion::getConnect();
    $update=$conexion->prepare('UPDATE Curso SET nombre=:nombre WHERE id_curso=:id_curso');
    $update->bindValue('id_curso', $curso->getId_curso());
    $update->bindValue('nombre',$curso->getNombre());
    $update->execute();
    header("location:../views/index_curso.php");
}

// la función para eliminar por el id
public static function delete($id_curso){
    $conexion=Conexion::getConnect();
    $delete=$conexion->prepare('DELETE FROM Curso WHERE id_curso=:id_curso');
    $delete->bindValue('id_curso',$id_curso);
    $delete->execute();
    }

//la función para registrar un usuario
public static function save($curso){
    $conexion=Conexion::getConnect();
    $insert=$conexion->prepare('INSERT INTO Curso VALUES(NULL,:nombre)');
    $insert->bindValue('nombre',$curso->getNombre());
    $insert->execute();
    header("location:../views/index_curso.php");
}

}








