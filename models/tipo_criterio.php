<?php
class Tipo_criterio
{
    private $id_tipo_criterio;
    private $nombre;

    public function getId_tipo_criterio()
    {
        return $this->id_tipo_criterio;
    }
    public function setId_tipo_criterio($id_tipo_criterio)
    {
        $this->id_tipo_criterio = $id_tipo_criterio;
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
