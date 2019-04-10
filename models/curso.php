<?php
class Curso
{
    private $id_curso;
    private $nombre;

    public function getId_curso()
    {
        return $this->id_curso;
    }
    public function setId_curso($id_curso)
    {
        $this->id_curso = $id_curso;
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
