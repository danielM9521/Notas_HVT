<?php 
if(isset($_GET['id_curso'])){
    include("../controllers/curso_controller.php");
    $cc = new curso_controller();
    $id_curso = $_GET['id_curso'];
    $cc->delete($id_curso);
    if($cc){
        header("location:./index_curso.php");
    }else{
        echo "Error al eliminar el registro";
    }
}
?>