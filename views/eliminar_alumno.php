<?php 
if(isset($_GET['id_alumno'])){
    include("../controllers/alumno_controller.php");
    $cc = new alumno_controller();
    $id_alumno = $_GET['id_alumno'];
    $cc->delete($id_alumno);
    if($cc){
        header("location:./index_alumno.php");
    }else{
        echo "Error al eliminar el registro";
    }
}

?>