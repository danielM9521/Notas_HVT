<?php
require_once '../mpdf/vendor/autoload.php';
require_once '../controllers/cohorte_controller.php';
require_once '../controllers/alumno_controller.php';
require_once '../controllers/nota_controller.php';
//echo $html;
if(isset($_GET['id_cohorte'])){
$id_cohorte = $_GET['id_cohorte'];
$cohorte = cohorte_controller::findById($id_cohorte);
$alumnos = alumno_controller::findByCohorte($id_cohorte);
$html .='<table>
<thead>
<tr>
<th class="criterios"><?php echo $cohorte->getNombre()?></th>
<th class="criterios" colspan="6">Gestionar el desarrollo personal</th>
<th class="criterios" colspan="4">Comunicar con efectividad</th>
<th class="criterios" colspan="4">Identificar oportunidades</th>
</tr>
<tr>
<th class="criterios">Listado de jóvenes</th>
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
}
$mpdf = new \Mpdf\Mpdf([
    'default_font_size' => 11,
    'default_font' => 'dejavusans'
]);
$style = file_get_contents('mpdf/style.css');
$mpdf -> SetTitle('REPORTE DE NOTAS - '.$cohorte->getNombre());
$mpdf -> WriteHTML($html);
$mpdf -> Output('reporte_'.strtolower($cohorte->getNombre()).'.pdf', 'I');

?>



