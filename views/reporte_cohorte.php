<?php
require_once '../mpdf/vendor/autoload.php';
require_once '../controllers/cohorte_controller.php';
require_once '../controllers/alumno_controller.php';
require_once '../controllers/nota_controller.php';
//echo $html;
if(isset($_GET['id_cohorte'])){
$id_cohorte = $_GET['id_cohorte'];
$cohorte = cohorte_controller::findById2($id_cohorte);
$alumnos = alumno_controller::findByCohorte($id_cohorte);


$html = '<h3>Reporte de notas - '.$cohorte->getNombre().'</h3>';
$html.='Centro de formación: '.$cohorte->getId_sede();
$html.='<br>Nombre del curso: '.$cohorte->getId_curso();
$html.='<br>Fecha de evaluación de inicio: '.$cohorte->getId_sede();
$html.='<br>Fecha de evaluacion final: '.$cohorte->getId_sede();
$html .='<table class="tablac1">
<thead>
<tr>
<th class="criterios">';

$html.= ''.$cohorte->getNombre();

$html.='</th>
<th class="criterios" colspan="6">Gestionar el desarrollo personal</th>
<th class="criterios" colspan="4">Comunicar con efectividad</th>
<th class="criterios" colspan="4">Identificar oportunidades</th>
</tr>
<tr>

<th class="criterios" colspan="2">Identifica sus fortalezas y aspectos a mejorar</th>
<th class="criterios" colspan="2">Identifica y relaciona sus intereses con las posibilidades de desarrollo personal, profesional y laboral</th>
<th class="criterios" colspan="2">Asume y responde oportuna y eficientemente a los compromisos adquiridos</th>
<th class="criterios" colspan="2">Utiliza el lenguaje escrito con claridad, fluidez y adecuadamente, para interactuar en distintos contextos sociales y con otras personas</th>
<th class="criterios" colspan="2">Utiliza el lenguaje oral con claridad, fluidez y adecuadamente, para interactuar en distintos contextos sociales y con otras personas</th>
<th class="criterios" colspan="2">Analiza el entorno y las diferentes situaciones de la vida, desde diversos puntos de vista</th>
<th class="criterios" colspan="2">Transforma necesidades u obstáculos en oportunidades</th>
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
</tr>';

foreach($alumnos as $alumno){

    $html.='<tr><td class="nombres">'.$alumno->getApellidos().', '.$alumno->getNombre().'</td>';
    $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 1); 
        foreach($notas as $nota){
            $html.='<td class="notas">'.$nota->getNota_inicio().'</td>';
            $html.='<td class="notas">'.$nota->getNota_fin().'</td>';
        }
        $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 2); 
        foreach($notas as $nota){
            $html.='<td class="notas">'.$nota->getNota_inicio().'</td>';
            $html.='<td class="notas">'.$nota->getNota_fin().'</td>';
        }
        $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 3); 
        foreach($notas as $nota){
            $html.='<td class="notas">'.$nota->getNota_inicio().'</td>';
            $html.='<td class="notas">'.$nota->getNota_fin().'</td>';
        }
        $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 4); 
        foreach($notas as $nota){
            $html.='<td class="notas">'.$nota->getNota_inicio().'</td>';
            $html.='<td class="notas">'.$nota->getNota_fin().'</td>';
        }
        $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 5); 
        foreach($notas as $nota){
            $html.='<td class="notas">'.$nota->getNota_inicio().'</td>';
            $html.='<td class="notas">'.$nota->getNota_fin().'</td>';
        }
        $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 6); 
        foreach($notas as $nota){
            $html.='<td class="notas">'.$nota->getNota_inicio().'</td>';
            $html.='<td class="notas">'.$nota->getNota_fin().'</td>';
        }
        $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 7); 
        foreach($notas as $nota){
            $html.='<td class="notas">'.$nota->getNota_inicio().'</td>';
            $html.='<td class="notas">'.$nota->getNota_fin().'</td></tr>';
        }
    }


$html.='</table>';
}
$mpdf = new \Mpdf\Mpdf([
    'default_font_size' => 11,
    'default_font' => 'dejavusans',
    'orientation' => 'L'
]);

$mpdf -> SetTitle('REPORTE DE NOTAS - '.$cohorte->getNombre());
$style = file_get_contents('../mpdf/style.css'); 
$mpdf -> WriteHTML($style,1);
$mpdf -> WriteHTML($html,2);
$mpdf -> Output('reporte_'.strtolower($cohorte->getNombre()).'.pdf', 'I');

?>



