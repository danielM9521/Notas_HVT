<?php require_once("../header.php"); ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<!-- DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<link rel="stylesheet" href="./css/style.css">
<?php require_once '../controllers/cohorte_controller.php';
require_once '../controllers/alumno_controller.php';
require_once '../controllers/nota_controller.php';
//$id_cohorte = $_GET['id_cohorte'];
$id_cohorte = 1;
$cohorte = cohorte_controller::findById($id_cohorte);
$alumnos = alumno_controller::findByCohorte($id_cohorte);
?>

<table id="prueba" class="table-bordered">
<thead>
<tr>
<th class="criterios" >N°</th>
<th class="criterios" >Nombre completo</th>
<th class="criterios" colspan="2">Puntaje asignado</th>
</tr>
</thead>
<tbody>
    <tr>
 
<td class="notas">Nombre completo</td>
<td class="notas">Nota inicio</td>
<td class="notas">Nota final</td>
<td class="notas">Nota inicio</td>
<td class="notas">Nota final</td>
<td class="notas">Nota inicio</td>
<td class="notas">Nota final</td>
<td class="notas">Nota inicio</td>
<td class="notas">Nota final</td>
<td class="notas">Nota inicio</td>
<td class="notas">Nota final</td>
<td class="notas">Nota inicio</td>
<td class="notas">Nota final</td>
<td class="notas">Nota inicio</td>
<td class="notas">Nota final</td>
</tr>
<tr>
<?php
foreach($alumnos as $alumno){

echo '<td class="nombres">'.$alumno->getApellidos().', '.$alumno->getNombre().'</td>';
$notas = nota_controller::findAllByAC($alumno->getId_alumno(), 1); 
    foreach($notas as $nota){
        echo '<td class="notas">'.$nota->getNota_inicio().'</td>';
        echo '<td class="notas">'.$nota->getNota_fin().'</td>';
    }
    $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 2); 
    foreach($notas as $nota){
        echo '<td class="notas">'.$nota->getNota_inicio().'</td>';
        echo '<td class="notas">'.$nota->getNota_fin().'</td>';
    }
    $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 3); 
    foreach($notas as $nota){
        echo '<td class="notas">'.$nota->getNota_inicio().'</td>';
        echo '<td class="notas">'.$nota->getNota_fin().'</td>';
    }
    $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 4); 
    foreach($notas as $nota){
        echo '<td class="notas">'.$nota->getNota_inicio().'</td>';
        echo '<td class="notas">'.$nota->getNota_fin().'</td>';
    }
    $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 5); 
    foreach($notas as $nota){
        echo '<td class="notas">'.$nota->getNota_inicio().'</td>';
        echo '<td class="notas">'.$nota->getNota_fin().'</td>';
    }
    $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 6); 
    foreach($notas as $nota){
        echo '<td class="notas">'.$nota->getNota_inicio().'</td>';
        echo '<td class="notas">'.$nota->getNota_fin().'</td>';
    }
    $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 7); 
    foreach($notas as $nota){
        echo '<td class="notas">'.$nota->getNota_inicio().'</td>';
        echo '<td class="notas">'.$nota->getNota_fin().'</td>';
    }
}
?>
</tr>
</tbody>
</table>

<br><br>
<table id="prueba2" class="table-bordered">
<thead>
<tr>
<th class="criterios"><?php echo $cohorte->getNombre()?></th>
<th colspan="2">Pensar y actuar de manera creativa</th>
<th colspan="6">Traducir ideas en un plan de acción</th>
<th colspan="8">Trabajar de manera colaborativa</th>
</tr>
<tr>
<th class="criterios">Listado de jóvenes</th>
<th colspan="2">Identifica los aspectos del entorno visualizando necesidades, obstáculos y oportunidades para posible solución</th>
<th colspan="2">Considera importante pensar el futuro y trazarse un objetivo</th>
<th colspan="2">Especifica tiempos y recursos necesarios para cada acción propuesta</th>
<th colspan="2">Considera cuidadosamente ventajas y desventajas para valorar alternativas</th>
<th colspan="2">Participa y aporta conocimientos y capacidades para el desarrollo de una tarea u objetivo común</th>
<th colspan="2">Diferencia roles y funciones en el desarrollo de una tarea u objetivo común</th>
<th colspan="2">Interactúa con las y los demás y promueve el trabajo en equipo</th>
<th colspan="2">Se responsabiliza de cumplir con su parte para el logro común de los objetivos</th>
</tr>
</thead>
<tbody>
    <tr>
<td class="notas">Nombre completo</td>
<td class="notas">Nota inicio</td>
<td class="notas">Nota final</td>
<td class="notas">Nota inicio</td>
<td class="notas">Nota final</td>
<td class="notas">Nota inicio</td>
<td class="notas">Nota final</td>
<td class="notas">Nota inicio</td>
<td class="notas">Nota final</td>
<td class="notas">Nota inicio</td>
<td class="notas">Nota final</td>
<td class="notas">Nota inicio</td>
<td class="notas">Nota final</td>
<td class="notas">Nota inicio</td>
<td class="notas">Nota final</td>
<td class="notas">Nota inicio</td>
<td class="notas">Nota final</td>
</tr>
<tr>
<?php
foreach($alumnos as $alumno){
echo '<td class="nombres">'.$alumno->getApellidos().', '.$alumno->getNombre().'</td>';
$notas = nota_controller::findAllByAC($alumno->getId_alumno(), 8); 
    foreach($notas as $nota){
        echo '<td class="notas">'.$nota->getNota_inicio().'</td>';
        echo '<td class="notas">'.$nota->getNota_fin().'</td>';
    }
    $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 9); 
    foreach($notas as $nota){
        echo '<td class="notas">'.$nota->getNota_inicio().'</td>';
        echo '<td class="notas">'.$nota->getNota_fin().'</td>';
    }
    $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 10); 
    foreach($notas as $nota){
        echo '<td class="notas">'.$nota->getNota_inicio().'</td>';
        echo '<td class="notas">'.$nota->getNota_fin().'</td>';
    }
    $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 11); 
    foreach($notas as $nota){
        echo '<td class="notas">'.$nota->getNota_inicio().'</td>';
        echo '<td class="notas">'.$nota->getNota_fin().'</td>';
    }
    $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 12); 
    foreach($notas as $nota){
        echo '<td class="notas">'.$nota->getNota_inicio().'</td>';
        echo '<td class="notas">'.$nota->getNota_fin().'</td>';
    }
    $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 13); 
    foreach($notas as $nota){
        echo '<td class="notas">'.$nota->getNota_inicio().'</td>';
        echo '<td class="notas">'.$nota->getNota_fin().'</td>';
    }
    $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 14); 
    foreach($notas as $nota){
        echo '<td class="notas">'.$nota->getNota_inicio().'</td>';
        echo '<td class="notas">'.$nota->getNota_fin().'</td>';
    }
    $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 15); 
    foreach($notas as $nota){
        echo '<td class="notas">'.$nota->getNota_inicio().'</td>';
        echo '<td class="notas">'.$nota->getNota_fin().'</td>';
    }
}
?>
</tr>
</tbody>
</table>
<br><br>
<table id="prueba3" class="table-bordered">
<thead>
<tr>
<th class="criterios"><?php echo $cohorte->getNombre()?></th>
<th colspan="6">Actuar con iniciativa</th>
<th colspan="6">Adaptacion al cambio</th>
</tr>
<tr>
<th class="criterios">Listado de jóvenes</th>
<th colspan="2">Analiza de manera anticipada problemas, dificultades y riesgos; propone soluciones</th>
<th colspan="2">Moviliza continuamente proactivamente sus recursos para lograr resultados</th>
<th colspan="2">Hace lo que se necesita hacer antes que otras personas tengan que pedirle que lo haga</th>
<th colspan="2">Asimila con rapidez los nuevos conocimientos y los pone en practica cotidianamente</th>
<th colspan="2">Evalúa y revisa sus acciones, adecuándose a nuevas condiciones, entornos y personas</th>
<th colspan="2">Percibe los cambios o los desaciertos, como una posibilidad de nuevos aprendizajes</th>
</tr>
</thead>
<tbody>
    <tr>
<td class="notas">Nombre completo</td>
<td class="notas">Nota inicio</td>
<td class="notas">Nota final</td>
<td class="notas">Nota inicio</td>
<td class="notas">Nota final</td>
<td class="notas">Nota inicio</td>
<td class="notas">Nota final</td>
<td class="notas">Nota inicio</td>
<td class="notas">Nota final</td>
<td class="notas">Nota inicio</td>
<td class="notas">Nota final</td>
<td class="notas">Nota inicio</td>
<td class="notas">Nota final</td>
</tr>
<tr>
<?php
foreach($alumnos as $alumno){

echo '<td class="nombres">'.$alumno->getApellidos().', '.$alumno->getNombre().'</td>';
$notas = nota_controller::findAllByAC($alumno->getId_alumno(), 16); 
    foreach($notas as $nota){
        echo '<td class="notas">'.$nota->getNota_inicio().'</td>';
        echo '<td class="notas">'.$nota->getNota_fin().'</td>';
    }
    $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 17); 
    foreach($notas as $nota){
        echo '<td class="notas">'.$nota->getNota_inicio().'</td>';
        echo '<td class="notas">'.$nota->getNota_fin().'</td>';
    }
    $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 18); 
    foreach($notas as $nota){
        echo '<td class="notas">'.$nota->getNota_inicio().'</td>';
        echo '<td class="notas">'.$nota->getNota_fin().'</td>';
    }
    $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 19); 
    foreach($notas as $nota){
        echo '<td class="notas">'.$nota->getNota_inicio().'</td>';
        echo '<td class="notas">'.$nota->getNota_fin().'</td>';
    }
    $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 20); 
    foreach($notas as $nota){
        echo '<td class="notas">'.$nota->getNota_inicio().'</td>';
        echo '<td class="notas">'.$nota->getNota_fin().'</td>';
    }
    $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 21); 
    foreach($notas as $nota){
        echo '<td class="notas">'.$nota->getNota_inicio().'</td>';
        echo '<td class="notas">'.$nota->getNota_fin().'</td>';
    }
}
?>
</tr>
</tbody>
</table>

<script>
$(document).ready(function() {
  $('#prueba').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
$(document).ready(function() {
  $('#prueba2').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
$(document).ready(function() {
  $('#prueba3').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script>