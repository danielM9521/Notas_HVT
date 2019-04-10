<?php 
if(isset($_GET['id_usuario'])){
    include("../controllers/usuario_controller.php");
    $sc = new usuario_controller();
    $id_usuario = $_GET['id_usuario'];
    $sc->delete($id_usuario);
    if($sc){
        header("location:./index_usuario.php");
    }else{
        echo "Error al eliminar el registro";
    }
}

?>