<?php
class Usuario
{
    //Atributos de la clase
    private $id_usuario;
    private $nombre;
    private $apellidos;
    private $id_rol;
    private $correo;
    private $contrasenia;


    //Método contructor de la clase


    //Métodos seter y getter
    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }
    public function getId_usuario()
    {
        return $this->id_usuario;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }
    public function getApellidos()
    {
        return $this->apellidos;
    }
    public function setId_rol($id_rol)
    {
        $this->id_rol = $id_rol;
    }
    public function getId_rol()
    {
        return $this->id_rol;
    }
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }
    public function getCorreo()
    {
        return $this->correo;
    }
    public function setContrasenia($contrasenia)
    {
        $this->contrasenia = $contrasenia;
    }
    public function getContrasenia()
    {
        return $this->contrasenia;
    }
}
?>