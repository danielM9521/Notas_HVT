<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">

<body>
    <?php require_once("../navbar.php");?>
    

        <?php
//Para llenar la tabla con los alumnos
include_once("../controllers/alumno_controller.php");
include_once("../controllers/cohorte_controller.php");
$ac = new alumno_controller();
$cc = new cohorte_controller();
if (isset($_GET['id_cohorte'])) {
    $id_cohorte = $_GET['id_cohorte'];
    $cohorte = $cc->findById2($id_cohorte);
    $alumnos = $ac->findByCohorte($id_cohorte);
} else {
    header("location:../index.php");
}
$contador=1; //Para el correlativo de los estudiantes
//Para llenar la tabla con los criterio de evaluación
include_once("../controllers/tipo_criterio_controller.php");
$cr = new tipo_criterio_controller();
$tipos = $cr->findAll();
$tab_menu = "";
$tab_content = "";
$i=0;
?>


<label for="id_sede">Sede:</label>
<input type="text" name="id_sede" value="<?php echo $cohorte->getId_sede();?>" disabled><br>
<label for="materia">Materia: </label>
<input name="materia" type="text" value="Habilidades para la vida y el trabajo" disabled><br>
<label for="id_curso">Curso</label>
<input type="text" name="id_curso" value="<?php echo $cohorte->getId_curso();?>" disabled><br>
<label for="fecha_inicio">Fecha de inicio del curso:</label>
<input name="fecha_inicio" type="date" value="<?php echo $cohorte->getFecha_inicio();?>" disabled><br>
<label for="fecha_fin">Fecha de finalización del curso:</label>
<input type="date" name="fecha_fin" value="<?php echo $cohorte->getFecha_fin();?>" disabled><br>
<label for="fecha_llenado_inicio">Fecha de llenado al inicio:</label>
<input name="fecha_llenado_inicio" type="date"><br>
<label for="fecha_llenado_fin">Fecha de llenado al final:</label>
<input type="date" name="fecha_llenado_fin"><br>


<div class="container">
  <h4>Referencias de puntaje a asignar</h4>
  <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Mostrar</button>
  <div id="demo" class="collapse">
      <table>
          <tbody>
              <tr>
                  <td>1.</td>
                  <td>Demuestra ningún / muy escaso dominio de la habilidad/competencia evaluada. No se observa/no se infiere de la actuación del participante (no la tiene, ni en proceso, ni incorporada).</td>
              </tr>
              <tr>
                  <td>2.</td>
                  <td>Demuestra un dominio parcial de la habilidad/competencia evaluada. En proceso / medianamente incorporada, ya sea en el discurso o en la práctica.</td>
              </tr>
              <tr>
                  <td>3.</td>
                  <td>Demuestra un amplio dominio (en discurso y práctica) de la habilidad/competencia evaluada. Habilidad/competencia incorporada.</td>
              </tr>
          </tbody>
      </table>
  </div>
</div>





                <table>
                    <tr>
                        <th colspan="2">Lista de jóvenes</th>
                    <tr>
                        <th>N°</th>
                        <th>Nombre completo</th>
                    </tr>
                    <?php foreach ($alumnos as $alumno) {
    echo '<tr><td>'.$contador.'</td><td>'.$alumno->getNombre().'</td></tr>';
    $contador++;
}
?>
                </table>
           
</body>