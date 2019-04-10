<?php 
if(isset($_GET['id_criterio'])){
    include("../controllers/criterio_controller.php");
    $cc = new criterio_controller();
    $id_criterio = $_GET['id_criterio'];
    $cc->delete($id_criterio);
    if($cc){
        header("location:./index_criterio.php");
    }else{
        echo "Error al eliminar el registro";
    }
}
?>