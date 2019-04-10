<?php
class Sede {
//Atributos de la clase
private $id_sede;
private $nombre;
private $direccion;
private $telefono;
private $correo;
private $departamento;
private $municipio;

//Métodos setter y getter
public function setId_sede($id_sede){
    $this->id_sede = $id_sede;
}
public function getId_sede(){
    return $this->id_sede;
}
public function setNombre($nombre){
    $this->nombre = $nombre;
}
public function getNombre(){
    return $this->nombre;
}
public function setDireccion($direccion){
    $this->direccion = $direccion;
}
public function getDireccion(){
    return $this->direccion;
}
public function setTelefono($telefono){
    $this->telefono = $telefono;
}
public function getTelefono(){
    return $this->telefono;
}
public function setCorreo($correo){
    $this->correo = $correo;
}
public function getCorreo(){
    return $this->correo;
}
public function setDepartamento($departamento){
    $this->departamento = $departamento;
}
public function getDepartamento(){
    return $this->departamento;
}
public function setMunicipio($municipio){
    $this->municipio = $municipio;
}
public function getMunicipio(){
    return $this->municipio;
}

}

?>
