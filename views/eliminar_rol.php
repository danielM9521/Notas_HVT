<?php 
if(isset($_GET['id_rol'])){
    include("../controllers/rol_controller.php");
    $cc = new rol_controller();
    $id_rol = $_GET['id_rol'];
    $cc->delete($id_rol);
    if($cc){
        header("location:./index_rol.php");
    }else{
        echo "Error al eliminar el registro";
    }
}
?>