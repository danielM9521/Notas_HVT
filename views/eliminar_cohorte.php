<?php 
if(isset($_GET['id_cohorte'])){
    include("../controllers/cohorte_controller.php");
    $cc = new cohorte_controller();
    $id_cohorte = $_GET['id_cohorte'];
    $cc->delete($id_cohorte);
    if($cc){
        header("location:./index_cohorte.php");
    }else{
        echo "Error al eliminar el registro";
    }
}

?>