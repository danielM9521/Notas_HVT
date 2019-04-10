<?php 
if(isset($_GET['id_sede'])){
    include("../controllers/sede_controller.php");
    $sc = new sede_controller();
    $id_sede = $_GET['id_sede'];
    $sc->delete($id_sede);
    if($sc){
        header("location:./index_sede.php");
    }else{
        echo "Error al eliminar el registro";
    }
}

?>