<?php
class Nota {
private $id_nota;
private $nombre_materia;
private $id_criterio;
private $nota_inicio;
private $nota_fin;
private $fecha_llenado_inicio;
private $fecha_llenado_fin;
private $id_alumno;
private $id_usuario;

//metodos set y get

public function setId_nota($id_nota){
$this->id_nota = $id_nota;

}
public function getId_nota(){
    return $this->id_nota;
}

public function setNombre_materia($nombre_materia){
    $this->nombre_materia = $nombre_materia;
}
public function getNombre_materia (){
    return $this->nombre_materia;
}

public function setId_criterio($id_criterio){
$this->id_criterio = $id_criterio;
}

public function getId_criterio(){
    return $this->id_criterio;
}

public function setNota_inicio($nota_inicio){
    $this->nota_inicio =$nota_inicio;
}
public function getNota_inicio(){
    return $this->nota_inicio;
}
public function setNota_fin($nota_fin){
    $this->nota_fin =$nota_fin;
}
public function getNota_fin(){
    return $this->nota_fin;
}
public function getFecha_llenado_inicio(){
    return $this->fecha_llenado_inicio;
}
public function setFecha_llenado_inicio($fecha_llenado_inicio){
    $this->fecha_llenado_inicio =$fecha_llenado_inicio ;
}
public function getFecha_llenado_fin(){
    return $this->fecha_llenado_fin;
}
public function setFecha_llenado_fin($fecha_llenado_fin){
    $this->fecha_llenado_fin =$fecha_llenado_fin ;
}
public function setId_alumno($id_alumno){
    $this->id_alumno = $id_alumno;
}
public function getId_alumno(){
    return $this->id_alumno;
}
public function setId_usuario($id_usuario){
    $this->id_usuario = $id_usuario;
}
public function getId_usuario(){
    return $this->id_usuario; 
}

public function save($nota){
    $conexion = Conexion::getConnect();
    $insert =$conexion->prepare('INSERT INTO Nota values (null, :nombre_materia,:id_criterio,:nota_inicio,:nota_fin,:fecha_llenado_inicio,:fecha_llenado_fin,:id_alumno,:id_usuario)');
    $insert->bindValue('nombre_materia',$nota->nombre_materia);
    $insert->bindValue('id_criterio',$nota->id_criterio);
    $insert->bindValue('nota_inicio',$nota->nota_inicio);
    $insert->bindValue('nota_fin',$nota->nota_fin);
    $insert->bindValue('fecha_llenado_inicio',$nota->fecha_llenado_inicio);
    $insert->bindValue('fecha_llenado_fin',$nota->fecha_llenado_fin);
    $insert->bindValue('id_alumno',$nota->id_alumno);
    $insert->bindValue('id_usuario',$nota->id_usuario);
    $insert->execute();
    }

    public static function delete($id_nota){
        $conexion=Conexion::getConnect();
        $delete=$conexion->prepare('DELETE FROM Nota WHERE id_nota=:id_nota');
        $delete->bindValue('id_nota',$id_nota);
        $delete->execute();
        }
    }