<?php
class Alumno
{
    //Atributos de la clase
    private $id_alumno;
    private $nombre;
    private $apellidos;
    private $direccion;
    private $estado_civil;
    private $sexo;
    private $dui;
    private $nit;
    private $carnet_minoridad;
    private $discapacidad;
    private $telefono;
    private $correo;
    private $fecha_nac;
    private $id_cohorte;

    //Métodos seter y getter
    public function setId_alumno($id_alumno)
    {
        $this->id_alumno = $id_alumno;
    }
    public function getId_alumno()
    {
        return $this->id_alumno;
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
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setEstado_civil($estado_civil)
    {
        $this->estado_civil = $estado_civil;
    }
    public function getEstado_civil()
    {
        return $this->estado_civil;
    }

    public function setSexo($sexo)
    {
        $this->sexo= $sexo;
    }
    public function getSexo()
    {
        return $this->sexo;
    }

    public function setDui($dui)
    {
        $this->dui= $dui;
    }
    public function getDui()
    {
        return $this->dui;
    }
    public function setNit($nit)
    {
        $this->nit = $nit;
    }
    public function getNit()
    {
        return $this->nit;
    }
    public function setCarnet_minoridad($carnet_minoridad)
    {
        $this->carnet_minoridad = $carnet_minoridad;
    }
    public function getCarnet_minoridad()
    {
        return  $this->carnet_minoridad;
    }
    public function setDiscapacidad($discapacidad)
    {
        $this->discapacidad =$discapacidad;
    }
    public function getDiscapacidad()
    {
        return $this->discapacidad;
    }
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
    public function getTelefono()
    {
        return  $this->telefono;
    }

    public function setCorreo($correo)
    {
        $this->correo =$correo;
    }
    public function getCorreo()
    {
        return $this->correo;
    }
    public function setFecha_nac($fecha_nac)
    {
        $this->fecha_nac =$fecha_nac;
    }
    public function getFecha_nac()
    {
        return $this->fecha_nac;
    }

    public function setId_cohorte($id_cohorte)
    {
        $this->id_cohorte = $id_cohorte;
    }
    public function getId_cohorte()
    {
        return $this->id_cohorte;
    }
}
?>