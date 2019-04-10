<?php 
if(isset($_GET['id_tipo_criterio'])){
    include("../controllers/tipo_criterio_controller.php");
    $cc = new tipo_criterio_controller();
    $id_tipo_criterio = $_GET['id_tipo_criterio'];
    $cc->delete($id_tipo_criterio);
    if($cc){
        header("location:./index_tipo_criterio.php");
    }else{
        echo "Error al eliminar el registro";
    }
}
?>