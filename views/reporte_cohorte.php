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
foreach($alumnos as $alumno){
$fechas = nota_controller::findAllByAC($alumno->getId_alumno(), 1); 
}
$html = '<h3>Reporte de notas - '.$cohorte->getNombre().'</h3>';
$html.='Centro de formación: '.$cohorte->getId_sede();
$html.='<br>Nombre del curso: '.$cohorte->getId_curso();
foreach($fechas as $fecha){
$fi = $fecha->getFecha_llenado_inicio();
$ff = $fecha->getFecha_llenado_fin();
}
$html.='<br>Fecha de evaluación de inicio: '.$fi;
$html.='<br>Fecha de evaluacion final: '.$ff;

$html .='<table class="tablac1">
<thead>
';

$html.= ''.$cohorte->getNombre();

$html.='<tr>
<th class="criterios" rowspan="2" colspan="1">N°</th> 
<th class="criterios" rowspan="2" colspan="1">Nombre completo</th> 
<th class="criterios" colspan="2">Puntaje asignado</th>
<th class="criterios" rowspan="2">Resultado</th>
</tr>
</thead>
<tbody>
<tr> 

<td class="notas">Nota inicio</td>
<td class="notas">Nota final</td>

</tr>';
$i=1;
$inicio=0;
$fin=0;
foreach($alumnos as $alumno){
    
    $html.='<tr><td class="notas">'.$i.'</td><td class="nombres">'.$alumno->getApellidos().', '.$alumno->getNombre().'</td>';
    $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 1); 
        foreach($notas as $nota){
        //     $html.='<td class="notas">'.$nota->getNota_inicio().'</td>';
        //     $html.='<td class="notas">'.$nota->getNota_fin().'</td>';
        $inicio+=$nota->getNota_inicio();
        $fin+=$nota->getNota_fin();
        }
        $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 2); 
        foreach($notas as $nota){
            // $html.='<td class="notas">'.$nota->getNota_inicio().'</td>';
            // $html.='<td class="notas">'.$nota->getNota_fin().'</td>';
            $inicio+=$nota->getNota_inicio();
        $fin+=$nota->getNota_fin();
        }
        $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 3); 
        foreach($notas as $nota){
            // $html.='<td class="notas">'.$nota->getNota_inicio().'</td>';
            // $html.='<td class="notas">'.$nota->getNota_fin().'</td>';
            $inicio+=$nota->getNota_inicio();
        $fin+=$nota->getNota_fin();
        }
        $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 4); 
        foreach($notas as $nota){
            // $html.='<td class="notas">'.$nota->getNota_inicio().'</td>';
            // $html.='<td class="notas">'.$nota->getNota_fin().'</td>';
            $inicio+=$nota->getNota_inicio();
        $fin+=$nota->getNota_fin();
        }
        $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 5); 
        foreach($notas as $nota){
            // $html.='<td class="notas">'.$nota->getNota_inicio().'</td>';
            // $html.='<td class="notas">'.$nota->getNota_fin().'</td>';
            $inicio+=$nota->getNota_inicio();
        $fin+=$nota->getNota_fin();
        }
        $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 6); 
        foreach($notas as $nota){
            // $html.='<td class="notas">'.$nota->getNota_inicio().'</td>';
            // $html.='<td class="notas">'.$nota->getNota_fin().'</td>';
            $inicio+=$nota->getNota_inicio();
        $fin+=$nota->getNota_fin();
        }
        $notas = nota_controller::findAllByAC($alumno->getId_alumno(), 7); 
        foreach($notas as $nota){
            // $html.='<td class="notas">'.$nota->getNota_inicio().'</td>';
            // $html.='<td class="notas">'.$nota->getNota_fin().'</td></tr>';
            $inicio+=$nota->getNota_inicio();
        $fin+=$nota->getNota_fin();
        }
        $html.='<td class="notas">'.$inicio.'</td>';
        $html.='<td class="notas">'.$fin.'</td>';
        $i++;
        if($fin>$inicio){
            $html.='<td class="notas">Mejoró</td></tr>';
        }elseif($fin==$inicio){
            $html.='<td class="notas">Se mantuvo</td></tr>';
        }else{
            $html.='<td class="notas">No mejoró</td></tr>';
        }
    }


$html.='</table>';
}
$mpdf = new \Mpdf\Mpdf([
    'default_font_size' => 11,
    'default_font' => 'dejavusans'
]);

$mpdf -> SetTitle('REPORTE DE NOTAS - '.$cohorte->getNombre());
$style = file_get_contents('../mpdf/style.css'); 
$mpdf -> WriteHTML($style,1);
$mpdf -> WriteHTML($html,2);
$mpdf -> Output('reporte_'.strtolower($cohorte->getNombre()).'.pdf', 'I');

?>



