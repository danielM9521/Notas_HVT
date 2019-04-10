<?php
class Rol
{
    private $id_rol;
    private $nombre;

    public function getId_rol()
    {
        return $this->id_rol;
    }
    public function setId_rol($id_rol)
    {
        $this->id_rol = $id_rol;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
}
