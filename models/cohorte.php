<?php
class Cohorte
{
    //Atributos de la clase
    private $id_cohorte;
    private $nombre;
    private $fecha_inicio;
    private $fecha_fin;
    private $id_sede;
    private $estado;
    private $id_curso;

    //Métodos seter y getter
    public function setId_cohorte($id_cohorte)
    {
        $this->id_cohorte = $id_cohorte;
    }
    public function getId_cohorte()
    {
        return $this->id_cohorte;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setFecha_inicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;
    }
    public function getFecha_inicio()
    {
        return $this->fecha_inicio;
    }
    public function setFecha_fin($fecha_fin)
    {
        $this->fecha_fin = $fecha_fin;
    }
    public function getFecha_fin()
    {
        return $this->fecha_fin;
    }
    public function setId_sede($id_sede)
    {
        $this->id_sede = $id_sede;
    }
    public function getId_sede()
    {
        return $this->id_sede;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    public function setId_curso($id_curso)
    {
        $this->id_curso = $id_curso;
    }
    public function getId_curso()
    {
        return $this->id_curso;
    }
}

?>