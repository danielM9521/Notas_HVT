<?php 
require_once("../models/conexion.php");
require_once("../models/alumno.php");

class alumno_controller{

public static function findAll(){
    $coleccion = array();
    $db=Conexion::getConnect();
    $sql=$db->query('SELECT a.id_alumno, a.nombre, a.apellidos, a.direccion, a.estado_civil, a.sexo, a.dui, a.nit, a.carnet_minoridad, a.discapacidad, a.telefono, a.correo, a.fecha_nac, c.nombre FROM Alumno a INNER JOIN Cohorte c ON a.id_cohorte = c.id_cohorte');
    // carga en la $listaUsuarios cada registro desde la base de datos
    foreach ($sql->fetchAll() as $alumno) {
        $a= new Alumno();
        $a->setId_alumno($alumno['0']);
        $a->setNombre($alumno['1']);
        $a->setApellidos($alumno['2']);
        $a->setDireccion($alumno['3']);
        $a->setEstado_civil($alumno['4']);
        $a->setSexo($alumno['5']);
        $a->setDui($alumno['6']);
        $a->setNit($alumno['7']);
        $a->setCarnet_minoridad($alumno['8']);
        $a->setDiscapacidad($alumno['9']);
        $a->setTelefono($alumno['10']);
        $a->setCorreo($alumno['11']);
        $a->setFecha_nac($alumno['12']);
        $a->setId_cohorte($alumno['13']);
        array_push($coleccion, $a);
    }
    return $coleccion;
}

//Método para registrar las notas
public static function findByCohorte($id_cohorte){
    $coleccion = array();
    $db=Conexion::getConnect();
    $sql=$db->prepare('SELECT id_alumno, nombre, apellidos, direccion, estado_civil, sexo, dui, nit, carnet_minoridad, discapacidad, telefono, correo, fecha_nac, id_cohorte FROM Alumno WHERE id_cohorte=:id_cohorte ORDER BY apellidos');
$sql->bindValue('id_cohorte',$id_cohorte);
$sql->execute();
    foreach ($sql->fetchAll() as $alumno) {
        $a= new Alumno();
        $a->setId_alumno($alumno['0']);
        $a->setNombre($alumno['1']);
        $a->setApellidos($alumno['2']);
        $a->setDireccion($alumno['3']);
        $a->setEstado_civil($alumno['4']);
        $a->setSexo($alumno['5']);
        $a->setDui($alumno['6']);
        $a->setNit($alumno['7']);
        $a->setCarnet_minoridad($alumno['8']);
        $a->setDiscapacidad($alumno['9']);
        $a->setTelefono($alumno['10']);
        $a->setCorreo($alumno['11']);
        $a->setFecha_nac($alumno['12']);
        $a->setId_cohorte($alumno['13']);
        array_push($coleccion, $a);
    }
    return $coleccion;
}


public static function findById($id_alumno){
    //buscar
    $conexion=Conexion::getConnect();
    $select=$conexion->prepare('SELECT * FROM Alumno WHERE id_alumno=:id_alumno');
    $select->bindValue('id_alumno',$id_alumno);
    $select->execute();
    //asignarlo al objeto usuario
    $AlumnoDb=$select->fetch();
    $alumno= new Alumno();
    $alumno->setId_alumno($AlumnoDb['id_alumno']);
    $alumno->setNombre($AlumnoDb['nombre']);
    $alumno->setApellidos($AlumnoDb['apellidos']);
    $alumno->setDireccion($AlumnoDb['direccion']);
    $alumno->setEstado_civil($AlumnoDb['estado_civil']);
    $alumno->setSexo($AlumnoDb['sexo']);
    $alumno->setDui($AlumnoDb['dui']);
    $alumno->setNit($AlumnoDb['nit']);
    $alumno->setCarnet_minoridad($AlumnoDb['carnet_minoridad']);
    $alumno->setDiscapacidad($AlumnoDb['discapacidad']);
    $alumno->setTelefono($AlumnoDb['telefono']);
    $alumno->setCorreo($AlumnoDb['correo']);
    $alumno->setFecha_nac($AlumnoDb['fecha_nac']);
    $alumno->setId_cohorte($AlumnoDb['id_cohorte']);
    return $alumno;
    }

    //la función para actualizar 
public static function update($alumno){
    $conexion=Conexion::getConnect();
    $update=$conexion->prepare('UPDATE Alumno SET nombre=:nombre, apellidos=:apellidos, direccion=:direccion, estado_civil=:estado_civil, sexo=:sexo, dui=:dui, nit=:nit, carnet_minoridad=:carnet_minoridad, discapacidad=:discapacidad, telefono=:telefono, correo=:correo, fecha_nac=:fecha_nac, id_cohorte=:id_cohorte WHERE id_alumno=:id_alumno');
    $update->bindValue('id_alumno', $alumno->getId_alumno());
    $update->bindValue('nombre',$alumno->getNombre());
    $update->bindValue('apellidos',$alumno->getApellidos());
    $update->bindValue('direccion',$alumno->getDireccion());
    $update->bindValue('estado_civil',$alumno->getEstado_civil());
    $update->bindValue('sexo',$alumno->getSexo());
    $update->bindValue('dui',$alumno->getDui());
    $update->bindValue('nit',$alumno->getNit());
    $update->bindValue('carnet_minoridad', $alumno->getCarnet_minoridad());
    $update->bindValue('discapacidad',$alumno->getDiscapacidad());
    $update->bindValue('telefono',$alumno->getTelefono());
    $update->bindValue('correo',$alumno->getCorreo());
    $update->bindValue('fecha_nac', $alumno->getFecha_nac());
    $update->bindValue('id_cohorte',$alumno->getId_cohorte());
    $update->execute();
    header("location:../views/index_alumno.php");
}

// la función para eliminar por el id
public static function delete($id_alumno){
    $conexion=Conexion::getConnect();
    $delete=$conexion->prepare('DELETE FROM Alumno WHERE id_alumno=:id_alumno');
    $delete->bindValue('id_alumno',$id_alumno);
    $delete->execute();
    }

//la función para registrar un usuario
public static function save($alumno){
    $conexion=Conexion::getConnect();
    $insert=$conexion->prepare('INSERT INTO Alumno VALUES(NULL,:nombre,:apellidos,:direccion,:estado_civil,:sexo,:dui,:nit,:carnet_minoridad,:discapacidad,:telefono,:correo,:fecha_nac,:id_cohorte)');
    $insert->bindValue('nombre',$alumno->getNombre());
    $insert->bindValue('apellidos',$alumno->getApellidos());
    $insert->bindValue('direccion',$alumno->getDireccion());
    $insert->bindValue('estado_civil',$alumno->getEstado_civil());
    $insert->bindValue('sexo',$alumno->getSexo());
    $insert->bindValue('dui',$alumno->getDui());
    $insert->bindValue('nit',$alumno->getNit());
    $insert->bindValue('carnet_minoridad',$alumno->getCarnet_minoridad());
    $insert->bindValue('discapacidad',$alumno->getDiscapacidad());
    $insert->bindValue('telefono',$alumno->getTelefono());
    $insert->bindValue('correo',$alumno->getCorreo());
    $insert->bindValue('fecha_nac',$alumno->getFecha_nac());
    $insert->bindValue('id_cohorte',$alumno->getId_cohorte());
    $insert->execute();
    header("location:../views/index_alumno.php");
}

}
?>