<?php
class Criterio
{
    private $id_criterio;
    private $id_tipo_criterio;
    private $nombre;

    public function getId_criterio()
    {
        return $this->id_criterio;
    }
    public function setId_criterio($id_criterio)
    {
        $this->id_criterio= $id_criterio;
    }
    public function getId_tipo_criterio()
    {
        return $this->id_tipo_criterio;
    }
    public function setId_tipo_criterio($id_tipo_criterio)
    {
        $this->id_tipo_criterio= $id_tipo_criterio;
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
