<?php
require_once("./models/conexion.php");
require_once("./models/usuario.php");

class login_controller{

    private $nombre;
    private $username;

    public function userExists($user, $pass){
        try{
        $md5pass = md5($pass);
        $conexion=Conexion::getConnect();
        $query = $conexion->prepare('SELECT * FROM Usuario WHERE correo = :user AND contrasenia = :pass');
        $query->execute(['user' => $user, 'pass' => $md5pass]);
        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    } catch (Exception $e) {
        //Mensaje de error al no poder obtener los registros
        echo "No se pudo obtener los datos: ".$e->errorMessage(); 
    }
    }
    public function setUser($user){
        $conexion=Conexion::getConnect();
        $query = $conexion->prepare('SELECT * FROM Usuario WHERE nombre = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nombre'];
            $this->usename = $currentUser['nombre'];
        }
    }
    public function getNombre(){
        return $this->nombre;
    }
}

?>