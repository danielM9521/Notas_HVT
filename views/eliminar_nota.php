<?php 
if(isset($_GET['id_nota'])){
    include("../controllers/nota_controller.php");
    $sc = new nota_controller();
    $id_nota = $_GET['id_nota'];
    $sc->delete($id_nota);
    if($sc){
        header("location:./index_nota.php");
    }else{
        echo "Error al eliminar el registro";
    }
}

?>