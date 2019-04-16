<?php require_once("../header.php"); ?>
<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<!-- DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>


<?php
    //Para llenar la tabla con los alumnos
    include_once("../controllers/alumno_controller.php");
    $ac = new alumno_controller();
    if (isset($_POST['fecha_llenado_inicio']) && isset($_POST['fecha_llenado_fin']) && isset($_POST['evaluar'])) {
        $fecha_llenado_inicio = $_POST['fecha_llenado_inicio'];
        $fecha_llenado_fin = $_POST['fecha_llenado_fin'];
        $id_cohorte = $_POST['id_cohorte'];
        $alumnos = $ac->findByCohorte($id_cohorte);
        $cantidadAlumnos = count($alumnos);
   
    //Para llenar la tabla con los criterio de evaluación
    include_once("../controllers/criterio_controller.php");
    $cco = new criterio_controller();
    $criterios1 = $cco->findByTipoCriterio(1);
    $criterios2 = $cco->findByTipoCriterio(2);
    $criterios3 = $cco->findByTipoCriterio(3);
    $criterios4 = $cco->findByTipoCriterio(4);
    $criterios5 = $cco->findByTipoCriterio(5);
    $criterios6 = $cco->findByTipoCriterio(6);
    $criterios7 = $cco->findByTipoCriterio(7);
    $criterios8 = $cco->findByTipoCriterio(8);
    $cantidadCriterios = count($criterios1)+count($criterios2)+count($criterios3)+count($criterios4)+count($criterios5)+count($criterios6)+count($criterios7)+count($criterios8);
    }
        
    ?>
<?php require_once("../navbar.php"); ?>

<?php
include_once("../controllers/criterio_controller.php");
$cco = new criterio_controller();
$criterios1 = $cco->findByTipoCriterio(1);
$criterios2 = $cco->findByTipoCriterio(2);
$criterios3 = $cco->findByTipoCriterio(3);
$criterios4 = $cco->findByTipoCriterio(4);
$criterios5 = $cco->findByTipoCriterio(5);
$criterios6 = $cco->findByTipoCriterio(6);
$criterios7 = $cco->findByTipoCriterio(7);
$criterios8 = $cco->findByTipoCriterio(8);
$cuentac1 = count($criterios1);
$cuentac2 = count($criterios2);
$cuentac3 = count($criterios3);
$cuentac4 = count($criterios4);
$cuentac5 = count($criterios5);
$cuentac6 = count($criterios6);
$cuentac7 = count($criterios7);
$cuentac8 = count($criterios8);
if (isset($_POST['guardar'])) {
    $fecha_llenado_inicio = $_POST['fecha_llenado_inicio'];
    $fecha_llenado_fin = $_POST['fecha_llenado_fin'];
    $id_cohorte = $_POST['id_cohorte'];
    $ac = new alumno_controller();
    $alumnos = $ac->findByCohorte($id_cohorte);
    $cantidadAlumnos = count($alumnos);
    include_once("../controllers/criterio_controller.php");
    $cco = new criterio_controller();
    $criterios1 = $cco->findByTipoCriterio(1);
    $criterios2 = $cco->findByTipoCriterio(2);
    $criterios3 = $cco->findByTipoCriterio(3);
    $criterios4 = $cco->findByTipoCriterio(4);
    $criterios5 = $cco->findByTipoCriterio(5);
    $criterios6 = $cco->findByTipoCriterio(6);
    $criterios7 = $cco->findByTipoCriterio(7);
    $criterios8 = $cco->findByTipoCriterio(8);
    $cantidadCriterios = count($criterios1)+count($criterios2)+count($criterios3)+count($criterios4)+count($criterios5)+count($criterios6)+count($criterios7)+count($criterios8);
    //Acá viene el código maravilloso que permitirá ingresar las notas a la base de datos
    require_once('../controllers/nota_controller.php');
    $nc = new nota_controller();
    $id_usuario = 6;
    $id_alumnos = array();
    $id_criterios = array();
    for ($k=1; $k <= $cantidadAlumnos; $k++) {
        array_push($id_alumnos, $_POST[''.$k]);
    }
    for ($q=1; $q <= $cantidadCriterios; $q++) {
        array_push($id_criterios, $_POST['id_criterio_'.$q]);
    }
    
    $cuenta = 1;
    $cuentac1 = count($criterios1);
    $cuentac2 = count($criterios2);
    $cuentac3 = count($criterios3);
    $cuentac4 = count($criterios4);
    $cuentac5 = count($criterios5);
    $cuentac6 = count($criterios6);
    $cuentac7 = count($criterios7);
    $cuentac8 = count($criterios8);

    $cuentacr1 = count($criterios1);
    $cuentacr2 = count($criterios2);
    $cuentacr3 = count($criterios3);
    $cuentacr4 = count($criterios4);
    $cuentacr5 = count($criterios5);
    $cuentacr6 = count($criterios6);
    $cuentacr7 = count($criterios7);
    $cuentacr8 = count($criterios8);
    

    for ($m=1; $m <= $cantidadAlumnos; $m++) {
      
        for ($cuenta;$cuenta<=($cantidadCriterios*$m);$cuenta++) {
            $notas = array();
            if ($cuenta<=$cuentac1) {//Guardar notas del criterios #1 
                $nota = new Nota();
                $id=$cuentacr1-($cuentac1-$cuenta+1);
                array_push($notas, $_POST['nota_inicio_'.$cuenta]);
                array_push($notas, $_POST['nota_fin_'.$cuenta]);
                $nota->setId_alumno($id_alumnos[($m-1)]);
                $nota->setFecha_llenado_fin($fecha_llenado_fin);
                $nota->setFecha_llenado_inicio($fecha_llenado_inicio);
                $nota->setNombre_materia("Habilidades para la vida y el trabajo");
                $nota->setId_criterio($id);
                $nota->setId_usuario($id_usuario);
                $nota->setNota_inicio($notas[0]);
                $nota->setNota_fin($notas[1]);
                $nc->save($nota);
                unset($notas);
            } elseif ($cuenta>$cuentac1 && $cuenta<=($cuentac1+$cuentac2)) {//Guardar notas del criterios #2
                $nota = new Nota();
                array_push($notas, $_POST['nota_inicio_'.$cuenta]);
                array_push($notas, $_POST['nota_fin_'.$cuenta]);
                $nota->setId_alumno($id_alumnos[($m-1)]);
                $nota->setFecha_llenado_fin($fecha_llenado_fin);
                $nota->setFecha_llenado_inicio($fecha_llenado_inicio);
                $nota->setNombre_materia("Habilidades para la vida y el trabajo");
                $nota->setId_criterio(1);
                $nota->setId_usuario($id_usuario);
                $nota->setNota_inicio($notas[0]);
                $nota->setNota_fin($notas[1]);
                $nc->save($nota);
                $id++;
                unset($notas);
            } elseif ($cuenta>($cuentac1+$cuentac2) && $cuenta<=($cuentac1+$cuentac2+$cuentac3)) {
                $nota = new Nota();
                array_push($notas, $_POST['nota_inicio_'.$cuenta]);
                array_push($notas, $_POST['nota_fin_'.$cuenta]);
                $nota->setId_alumno($id_alumnos[($m-1)]);
                $nota->setFecha_llenado_fin($fecha_llenado_fin);
                $nota->setFecha_llenado_inicio($fecha_llenado_inicio);
                $nota->setNombre_materia("Habilidades para la vida y el trabajo");
                $nota->setId_criterio(1);
                $nota->setId_usuario($id_usuario);
                $nota->setNota_inicio($notas[0]);
                $nota->setNota_fin($notas[1]);
                $nc->save($nota);
                $id++;
                unset($notas);
            } elseif ($cuenta>($cuentac1+$cuentac2+$cuentac3) && $cuenta<=($cuentac1+$cuentac2+$cuentac3+$cuentac4)) {
                $nota = new Nota();
                array_push($notas, $_POST['nota_inicio_'.$cuenta]);
                array_push($notas, $_POST['nota_fin_'.$cuenta]);
                $nota->setId_alumno($id_alumnos[($m-1)]);
                $nota->setFecha_llenado_fin($fecha_llenado_fin);
                $nota->setFecha_llenado_inicio($fecha_llenado_inicio);
                $nota->setNombre_materia("Habilidades para la vida y el trabajo");
                $nota->setId_criterio(1);
                $nota->setId_usuario($id_usuario);
                $nota->setNota_inicio($notas[0]);
                $nota->setNota_fin($notas[1]);
                $nc->save($nota);
                $id++;
                unset($notas);
            } elseif ($cuenta>($cuentac1+$cuentac2+$cuentac3+$cuentac4) && $cuenta<=($cuentac1+$cuentac2+$cuentac3+$cuentac4+$cuentac5)) {
                $nota = new Nota();
                array_push($notas, $_POST['nota_inicio_'.$cuenta]);
                array_push($notas, $_POST['nota_fin_'.$cuenta]);
                $nota->setId_alumno($id_alumnos[($m-1)]);
                $nota->setFecha_llenado_fin($fecha_llenado_fin);
                $nota->setFecha_llenado_inicio($fecha_llenado_inicio);
                $nota->setNombre_materia("Habilidades para la vida y el trabajo");    
                $nota->setId_criterio(1);
                $nota->setId_usuario($id_usuario);
                $nota->setNota_inicio($notas[0]);
                $nota->setNota_fin($notas[1]);
                $nc->save($nota);
                $id++;
                unset($notas);
            } elseif ($cuenta>($cuentac1+$cuentac2+$cuentac3+$cuentac4+$cuentac5) && $cuenta<=($cuentac1+$cuentac2+$cuentac3+$cuentac4+$cuentac5+$cuentac6)) {
                $nota = new Nota();
                array_push($notas, $_POST['nota_inicio_'.$cuenta]);
                array_push($notas, $_POST['nota_fin_'.$cuenta]);
                $nota->setId_alumno($id_alumnos[($m-1)]);
                $nota->setFecha_llenado_fin($fecha_llenado_fin);
                $nota->setFecha_llenado_inicio($fecha_llenado_inicio);
                $nota->setNombre_materia("Habilidades para la vida y el trabajo");
                $nota->setId_criterio(1);
                $nota->setId_usuario($id_usuario);
                $nota->setNota_inicio($notas[0]);
                $nota->setNota_fin($notas[1]);
                $nc->save($nota);
                $id++;
                unset($notas);
            } elseif ($cuenta>($cuentac1+$cuentac2+$cuentac3+$cuentac4+$cuentac5+$cuentac6) && $cuenta<=($cuentac1+$cuentac2+$cuentac3+$cuentac4+$cuentac5+$cuentac6+$cuentac7)) {
                $nota = new Nota();
                array_push($notas, $_POST['nota_inicio_'.$cuenta]);
                array_push($notas, $_POST['nota_fin_'.$cuenta]);
                $nota->setId_alumno($id_alumnos[($m-1)]);
                $nota->setFecha_llenado_fin($fecha_llenado_fin);
                $nota->setFecha_llenado_inicio($fecha_llenado_inicio);
                $nota->setNombre_materia("Habilidades para la vida y el trabajo");
                $nota->setId_criterio(1);
                $nota->setId_usuario($id_usuario);
                $nota->setNota_inicio($notas[0]);
                $nota->setNota_fin($notas[1]);
                $nc->save($nota);
                $id++;
                unset($notas);
            } elseif ($cuenta>($cuentac1+$cuentac2+$cuentac3+$cuentac4+$cuentac5+$cuentac6+$cuentac7) && $cuenta<=($cuentac1+$cuentac2+$cuentac3+$cuentac4+$cuentac5+$cuentac6+$cuentac7+$cuentac8)) {
                $nota = new Nota();
                array_push($notas, $_POST['nota_inicio_'.$cuenta]);
                array_push($notas, $_POST['nota_fin_'.$cuenta]);
                $nota->setId_alumno($id_alumnos[($m-1)]);
                $nota->setFecha_llenado_fin($fecha_llenado_fin);
                $nota->setFecha_llenado_inicio($fecha_llenado_inicio);
                $nota->setNombre_materia("Habilidades para la vida y el trabajo");
                $nota->setId_criterio(1);
                $nota->setId_usuario($id_usuario);
                $nota->setNota_inicio($notas[0]);
                $nota->setNota_fin($notas[1]);
                $nc->save($nota);
                $id++;
                unset($notas);
            }
        }
        $cuenta = (($cantidadCriterios*$m)+1);
        $cuentac1 = $cuentac1 + $cantidadCriterios;
    }
}
?>

<body>
    <form method="post">
        <input type="hidden" name="id_cohorte" value="<?php echo $id_cohorte?>">
        <input type="hidden" name="fecha_llenado_inicio" value="<?php echo $fecha_llenado_inicio?>">
        <input type="hidden" name="fecha_llenado_fin" value="<?php echo $fecha_llenado_fin?>">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <!-- Inicion del encabezado hasta el hr -->
                    <div class="container">
                        <div class="row">
                            <span class="titulo">Hoja de evaluación<br>Habilidades para la vida y el trabajo</span>
                            <!-- Inicio del acordeón -->
                            <div class="container">
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="card-link subtitulo" data-toggle="collapse" href="#collapseOne">
                                                Referencias de puntaje a asignar
                                            </a>
                                        </div>
                                        <div id="collapseOne" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table-bordered">
                                                        <thead>
                                                            <th class="referenciath">Puntaje</th>
                                                            <th class="referenciath">Descripción</th>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th class="referencia">1</th>
                                                                <td class="referencia2">Demuestra ningún / muy escaso
                                                                    dominio de
                                                                    la habilidad/competencia evaluada.
                                                                    No se observa/no
                                                                    se infiere de la actuación del participante (no la
                                                                    tiene, ni
                                                                    en proceso, ni
                                                                    incorporada).
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th class="referencia">2</th>
                                                                <td class="referencia2">Demuestra un dominio parcial de
                                                                    la
                                                                    habilidad/competencia evaluada. En
                                                                    proceso / medianamente
                                                                    incorporada, ya sea en el discurso o en la práctica.
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th class="referencia">3</th>
                                                                <td class="referencia2">Demuestra un amplio dominio (en
                                                                    discurso
                                                                    y práctica) de la
                                                                    habilidad/competencia evaluada.
                                                                    Habilidad/competencia incorporada.</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Fin del acordeón -->
                        </div>
                    </div>
                    <!-- Fin del encabezado hasta el hr -->
                    <hr class="divisor">
                    <!-- Inicio de formulario para ingresar las notas -->

                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs responsive justify-content-center" role="tablist">
                                <li class="nav-item active">
                                    <a class="nav-link tab-letra" href="#1" role="tab" data-toggle="tab">1.
                                        Gestionar
                                        el desarrollo personal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tab-letra" href="#2" role="tab" data-toggle="tab">2. Comunicar
                                        con
                                        efectividad</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tab-letra" href="#3" role="tab" data-toggle="tab">3. Identificar
                                        oportunidades</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tab-letra" href="#4" role="tab" data-toggle="tab">4.
                                        Pensar y
                                        actuar
                                        de manera creativa</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tab-letra" href="#5" role="tab" data-toggle="tab">5. Traducir
                                        ideas en
                                        un
                                        plan
                                        de
                                        acción</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tab-letra" href="#6" role="tab" data-toggle="tab">6. Trabajar de
                                        manera
                                        colaborativa</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tab-letra" href="#7" role="tab" data-toggle="tab">7.
                                        Actuar con
                                        iniciativa</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link tab-letra" href="#8" role="tab" data-toggle="tab">8. Adaptacion
                                        al
                                        cambio</a>
                                </li>
                            </ul>



                            <!-- Contenido de las tabs -->
                            <div class="tab-content">
                                <!-- Tab#1 -->
                                <div role="tabpanel" class="tab-pane fade in active" id="1">
                                    <div class="table-responsive">
                                        <table id="registro_notas"
                                            class="tablac1 table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="criteriosth" colspan="2">
                                                        Listado de jóvenes</th>
                                                    <?php $p =1; foreach ($criterios1 as $criterio1) {
    echo '<th colspan="2" class="criteriosth">' . $criterio1->getNombre() . '<input type="hidden" name="id_criterio_'.$p.'" value"'.$criterio1->getId_criterio().'"></th>'; $p++;
} ?>
                                                    <th rowspan="2" class="criteriosth no-sort">Diferencia</th>
                                                </tr>
                                                <tr>
                                                    <th class="criterios no-sort" width="25px;">N°</th>
                                                    <th class="criterios no-sort" width="400px;">Nombre completo</th>
                                                    <th class="criterios no-sort">Nota inicio</th>
                                                    <th class="criterios no-sort">Nota fin</th>
                                                    <th class="criterios no-sort">Nota inicio</th>
                                                    <th class="criterios no-sort">Nota fin</th>
                                                    <th class="criterios no-sort">Nota inicio</th>
                                                    <th class="criterios no-sort">Nota fin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $j = 1;//Variable que sirve para el correlativo de los alumnos
                                                $x = 1;//Variable que sirve para poner id a las notas de inicio y fin
                                                $y=1;//Variable que controla los name para guardar el id del alumno
                                                foreach ($alumnos as $alumno) {
                                                    echo '<td class="criterios"><input name="'.$y.'" type="hidden" value="'.$alumno->getId_alumno().'">' . $j . '</td><td class="nombres">' . $alumno->getApellidos().', '.$alumno->getNombre() . '</td><td class="notas"><input  type="number" min="1" step="1" max="3"  name="nota_inicio_'.$x.'"></td><td class="notas"><input type="number" min="1" step="1" max="3" name="nota_fin_'.$x.'"></td><td class="notas"><input  min="1" step="1" max="3" type="number" name="nota_inicio_'.($x+1).'"></td><td class="notas"><input min="1" step="1" max="3" type="number"  name="nota_fin_'.($x+1).'"></td><td class="notas"><input min="1" step="1" max="3" type="number"  name="nota_inicio_'.($x+2).'"></td><td class="notas"><input min="1" step="1" max="3" type="number" name="nota_fin_'.($x+2).'"></td><td class="notas"><input min="1" step="1" max="3" type="number" name="diferencia' . $j . '"></td></tr>';
                                                    $x= $x+$cantidadCriterios;
                                                    $j++;
                                                    $y++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Fin de tab #1 -->

                                <!-- Tab#2 -->
                                <div role="tabpanel" class="tab-pane fade" id="2">
                                    <div class="table-responsive">
                                        <table id="registro_notas2"
                                            class="tablac1 table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="criteriosth" colspan="2">
                                                        Listado de jóvenes</th>
                                                    <?php $p=1+$cuentac1; foreach ($criterios2 as $criterio2) {
                                                    echo '<th colspan="2" class="criteriosth">' . $criterio2->getNombre() . '<input type="hidden" name="id_criterio_'.$p.'" value"'.$criterio2->getId_criterio().'"></th>'; $p++;
                                                } ?>
                                                    <th rowspan="2" class="criteriosth no-sort">Diferencia</th>
                                                </tr>
                                                <tr>
                                                    <th class="criterios no-sort" width="25px;">N°</th>
                                                    <th class="criterios no-sort" width="400px;">Nombre completo</th>
                                                    <th class="criterios no-sort">Nota inicio</th>
                                                    <th class="criterios no-sort">Nota fin</th>
                                                    <th class="criterios no-sort">Nota inicio</th>
                                                    <th class="criterios no-sort">Nota fin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $correlativo=1;
                                                $y=1;//Variable que controla los name para guardar el id del alumno
                                                $j = $cantidadAlumnos+1;
                                                $x = count($criterios1)+1;
                                                foreach ($alumnos as $alumno) {
                                                    echo '<td class="criterios"><input type="hidden" name="'.$y.'" value="'.$alumno->getId_alumno().'">' . $correlativo . '</td><td class="nombres">' . $alumno->getApellidos().', '.$alumno->getNombre() . '</td><td class="notas"><input  type="number" min="1" step="1" max="3"  name="nota_inicio_'.$x.'"></td><td class="notas"><input type="number" min="1" step="1" max="3" name="nota_fin_'.$x.'"></td><td class="notas"><input  min="1" step="1" max="3" type="number" name="nota_inicio_'.($x+1).'"></td><td class="notas"><input min="1" step="1" max="3" type="number"  name="nota_fin_'.($x+1).'"></td><td class="notas"><input min="1" step="1" max="3" type="number" name="diferencia' . $j . '"></td></tr>';
                                                    $x= $x+$cantidadCriterios;
                                                    $j++;
                                                    $y++;
                                                    $correlativo++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>



                                </div>
                                <!-- Fin de tab #2 -->

                                <!-- Tab#3 -->
                                <div role="tabpanel" class="tab-pane fade" id="3">
                                    <div class="table-responsive">
                                        <table id="registro_notas3"
                                            class="tablac1 table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="criteriosth" colspan="2">
                                                        Listado de jóvenes</th>
                                                    <?php $p=1+$cuentac1+$cuentac2 ; foreach ($criterios3 as $criterio3) {
                                                    echo '<th colspan="2" class="criteriosth">' . $criterio3->getNombre() . '<input type="hidden" name="id_criterio_'.$p.'" value"'.$criterio3->getId_criterio().'"></th>'; $p++;
                                                } ?>
                                                    <th rowspan="2" class="criteriosth no-sort">Diferencia</th>
                                                </tr>
                                                <tr>
                                                    <th class="criterios no-sort" width="25px;">N°</th>
                                                    <th class="criterios no-sort" width="400px;">Nombre completo</th>
                                                    <th class="criterios no-sort">Nota inicio</th>
                                                    <th class="criterios no-sort">Nota fin</th>
                                                    <th class="criterios no-sort">Nota inicio</th>
                                                    <th class="criterios no-sort">Nota fin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $correlativo = 1;
                                                $y=1;//Variable que controla los name para guardar el id del alumno
                                                $j = ($cantidadAlumnos*2)+1;
                                                $x = (count($criterios1)+count($criterios2)+1);
                                                foreach ($alumnos as $alumno) {
                                                    echo '<td class="criterios"><input type="hidden" name="'.$y.'" value="'.$alumno->getId_alumno().'">' . $correlativo . '</td><td class="nombres">' . $alumno->getApellidos().', '.$alumno->getNombre() . '</td><td class="notas"><input  type="number" min="1" step="1" max="3"  name="nota_inicio_'.$x.'"></td><td class="notas"><input type="number" min="1" step="1" max="3" name="nota_fin_'.$x.'"></td><td class="notas"><input  min="1" step="1" max="3" type="number" name="nota_inicio_'.($x+1).'"></td><td class="notas"><input min="1" step="1" max="3" type="number"  name="nota_fin_'.($x+1).'"></td><td class="notas"><input min="1" step="1" max="3" type="number" name="diferencia' . $j . '"></td></tr>';
                                                    $x= $x+$cantidadCriterios;
                                                    $j++;
                                                    $y++;
                                                    $correlativo++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Fin de tab #3 -->

                                <!-- Tab#4 -->
                                <div role="tabpanel" class="tab-pane fade" id="4">
                                    <div class="table-responsive">
                                        <table id="registro_notas4"
                                            class="tablac1 table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="criteriosth" colspan="2">
                                                        Listado de jóvenes</th>
                                                    <?php $p=1+$cuentac1+$cuentac2+$cuentac3; foreach ($criterios4 as $criterio4) {
                                                    echo '<th colspan="2" class="criteriosth">' . $criterio4->getNombre() . '<input type="hidden" name="id_criterio_'.$p.'" value"'.$criterio4->getId_criterio().'"></th>'; $p++;
                                                } ?>
                                                    <th rowspan="2" class="criteriosth no-sort">Diferencia</th>
                                                </tr>
                                                <tr>
                                                    <th class="criterios no-sort" width="25px;">N°</th>
                                                    <th class="criterios no-sort" width="400px;">Nombre completo</th>
                                                    <th class="criterios no-sort">Nota inicio</th>
                                                    <th class="criterios no-sort">Nota fin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $correlativo = 1;
                                                $y=1;//Variable que controla los name para guardar el id del alumno
                                                $j = ($cantidadAlumnos*3)+1;
                                                $x = (count($criterios1)+count($criterios2)+count($criterios3)+1);
                                                foreach ($alumnos as $alumno) {
                                                    echo '<td class="criterios"><input type="hidden" name="'.$y.'" value="'.$alumno->getId_alumno().'">' . $correlativo . '</td><td class="nombres">' . $alumno->getApellidos().', '.$alumno->getNombre() . '</td><td class="notas"><input  type="number" min="1" step="1" max="3"  name="nota_inicio_'.$x.'"></td><td class="notas"><input type="number" min="1" step="1" max="3" name="nota_fin_'.$x.'"></td><td class="notas"><input min="1" step="1" max="3" type="number" name="diferencia' . $j . '"></td></tr>';
                                                    $x= $x+$cantidadCriterios;
                                                    $j++;
                                                    $correlativo++;
                                                    $y++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Fin de tab #4 -->

                                <!-- Tab#5 -->
                                <div role="tabpanel" class="tab-pane fade" id="5">
                                    <div class="table-responsive">
                                        <table id="registro_notas5"
                                            class="tablac1 table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="criteriosth" colspan="2">
                                                        Listado de jóvenes</th>
                                                    <?php $p=1+$cuentac1+$cuentac2+$cuentac3+$cuentac4; foreach ($criterios5 as $criterio5) {
                                                    echo '<th colspan="2" class="criteriosth">' . $criterio5->getNombre() . '<input type="hidden" name="id_criterio_'.$p.'" value"'.$criterio5->getId_criterio().'"></th>'; $p++;
                                                } ?>
                                                    <th rowspan="2" class="criteriosth no-sort">Diferencia</th>
                                                </tr>
                                                <tr>
                                                    <th class="criterios no-sort" width="25px;">N°</th>
                                                    <th class="criterios no-sort" width="400px;">Nombre completo</th>
                                                    <th class="criterios no-sort">Nota inicio</th>
                                                    <th class="criterios no-sort">Nota fin</th>
                                                    <th class="criterios no-sort">Nota inicio</th>
                                                    <th class="criterios no-sort">Nota fin</th>
                                                    <th class="criterios no-sort">Nota inicio</th>
                                                    <th class="criterios no-sort">Nota fin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $correlativo = 1;
                                                $y=1;//Variable que controla los name para guardar el id del alumno
                                                $j = ($cantidadAlumnos*4)+1;
                                                $x = (count($criterios1)+count($criterios2)+count($criterios3)+count($criterios4)+1);
                                                foreach ($alumnos as $alumno) {
                                                    echo '<td class="criterios"><input type="hidden" name="'.$y.'" value="'.$alumno->getId_alumno().'">' . $correlativo . '</td><td class="nombres">' . $alumno->getApellidos().', '.$alumno->getNombre() . '</td><td class="notas"><input  type="number" min="1" step="1" max="3"  name="nota_inicio_'.$x.'"></td><td class="notas"><input type="number" min="1" step="1" max="3" name="nota_fin_'.$x.'"></td><td class="notas"><input  min="1" step="1" max="3" type="number" name="nota_inicio_'.($x+1).'"></td><td class="notas"><input min="1" step="1" max="3" type="number"  name="nota_fin_'.($x+1).'"></td><td class="notas"><input min="1" step="1" max="3" type="number"  name="nota_inicio_'.($x+2).'"></td><td class="notas"><input min="1" step="1" max="3" type="number" name="nota_fin_'.($x+2).'"></td><td class="notas"><input min="1" step="1" max="3" type="number" name="diferencia' . $j . '"></td></tr>';
                                                    $x= $x+$cantidadCriterios;
                                                    $j++;
                                                    $y++;
                                                    $correlativo++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Fin de tab #5 -->

                                <!-- Tab#6 -->
                                <div role="tabpanel" class="tab-pane fade" id="6">
                                    <div class="table-responsive">
                                        <table id="registro_notas6"
                                            class="tablac1 table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="criteriosth" colspan="2">
                                                        Listado de jóvenes</th>
                                                    <?php $p=1+$cuentac1+$cuentac2+$cuentac3+$cuentac4+$cuentac5; foreach ($criterios6 as $criterio6) {
                                                    echo '<th colspan="2" class="criteriosth">' . $criterio6->getNombre() . '<input type="hidden" name="id_criterio_'.$p.'" value"'.$criterio6->getId_criterio().'"></th>'; $p++;
                                                } ?>
                                                    <th rowspan="2" class="criteriosth no-sort">Diferencia</th>
                                                </tr>
                                                <tr>
                                                    <th class="criterios no-sort" width="25px;">N°</th>
                                                    <th class="criterios no-sort" width="400px;">Nombre completo</th>
                                                    <th class="criterios no-sort">Nota inicio</th>
                                                    <th class="criterios no-sort">Nota fin</th>
                                                    <th class="criterios no-sort">Nota inicio</th>
                                                    <th class="criterios no-sort">Nota fin</th>
                                                    <th class="criterios no-sort">Nota inicio</th>
                                                    <th class="criterios no-sort">Nota fin</th>
                                                    <th class="criterios no-sort">Nota inicio</th>
                                                    <th class="criterios no-sort">Nota fin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $correlativo = 1;
                                                $y=1;//Variable que controla los name para guardar el id del alumno
                                                $j = ($cantidadAlumnos*5)+1;
                                                $x = (count($criterios1)+count($criterios2)+count($criterios3)+count($criterios4)+count($criterios5)+1);
                                                foreach ($alumnos as $alumno) {
                                                    echo '<td class="criterios"><input type="hidden" name="'.$y.'" value="'.$alumno->getId_alumno().'">' . $correlativo . '</td><td class="nombres">' . $alumno->getApellidos().', '.$alumno->getNombre() . '</td><td class="notas"><input  type="number" min="1" step="1" max="3"  name="nota_inicio_'.$x.'"></td><td class="notas"><input type="number" min="1" step="1" max="3" name="nota_fin_'.$x.'"></td><td class="notas"><input  min="1" step="1" max="3" type="number" name="nota_inicio_'.($x+1).'"></td><td class="notas"><input min="1" step="1" max="3" type="number"  name="nota_fin_'.($x+1).'"></td><td class="notas"><input min="1" step="1" max="3" type="number"  name="nota_inicio_'.($x+2).'"></td><td class="notas"><input min="1" step="1" max="3" type="number" name="nota_fin_'.($x+2).'"></td><td class="notas"><input min="1" step="1" max="3" type="number"  name="nota_inicio_'.($x+3).'"></td><td class="notas"><input min="1" step="1" max="3" type="number" name="nota_fin_'.($x+3).'"></td><td class="notas"><input min="1" step="1" max="3" type="number" name="diferencia' . $j . '"></td></tr>';
                                                    $x= $x+$cantidadCriterios;
                                                    $j++;
                                                    $correlativo++;
                                                    $y++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Fin de tab #6 -->

                                <!-- Tab#7 -->
                                <div role="tabpanel" class="tab-pane fade" id="7">
                                    <div class="table-responsive">
                                        <table id="registro_notas7"
                                            class="tablac1 table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="criteriosth" colspan="2">
                                                        Listado de jóvenes</th>
                                                    <?php $p=1+$cuentac1+$cuentac2+$cuentac3+$cuentac4+$cuentac5+$cuentac6; foreach ($criterios7 as $criterio7) {
                                                    echo '<th colspan="2" class="criteriosth">' . $criterio7->getNombre() . '<input type="hidden" name="id_criterio_'.$p.'" value"'.$criterio7->getId_criterio().'"></th>'; $p++;
                                                } ?>
                                                    <th rowspan="2" class="criteriosth no-sort">Diferencia</th>
                                                </tr>
                                                <tr>
                                                    <th class="criterios no-sort" width="25px;">N°</th>
                                                    <th class="criterios no-sort" width="400px;">Nombre completo</th>
                                                    <th class="criterios no-sort">Nota inicio</th>
                                                    <th class="criterios no-sort">Nota fin</th>
                                                    <th class="criterios no-sort">Nota inicio</th>
                                                    <th class="criterios no-sort">Nota fin</th>
                                                    <th class="criterios no-sort">Nota inicio</th>
                                                    <th class="criterios no-sort">Nota fin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $correlativo = 1;
                                                $y=1;//Variable que controla los name para guardar el id del alumno
                                                $j = ($cantidadAlumnos*6)+1;
                                                $x = (count($criterios1)+count($criterios2)+count($criterios3)+count($criterios4)+count($criterios5)+count($criterios6)+1);
                                                foreach ($alumnos as $alumno) {
                                                    echo '<td class="criterios"><input type="hidden" name="'.$y.'" value="'.$alumno->getId_alumno().'">' . $correlativo . '</td><td class="nombres">' . $alumno->getApellidos().', '.$alumno->getNombre() . '</td><td class="notas"><input  type="number" min="1" step="1" max="3"  name="nota_inicio_'.$x.'"></td><td class="notas"><input type="number" min="1" step="1" max="3" name="nota_fin_'.$x.'"></td><td class="notas"><input  min="1" step="1" max="3" type="number" name="nota_inicio_'.($x+1).'"></td><td class="notas"><input min="1" step="1" max="3" type="number"  name="nota_fin_'.($x+1).'"></td><td class="notas"><input min="1" step="1" max="3" type="number"  name="nota_inicio_'.($x+2).'"></td><td class="notas"><input min="1" step="1" max="3" type="number" name="nota_fin_'.($x+2).'"></td></td><td class="notas"><input min="1" step="1" max="3" type="number" name="diferencia' . $j . '"></td></tr>';
                                                    $x= $x+$cantidadCriterios;
                                                    $j++;
                                                    $correlativo++;
                                                    $y++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Fin de tab #7 -->

                                <!-- Tab#8 -->
                                <div role="tabpanel" class="tab-pane fade" id="8">
                                    <div class="table-responsive">
                                        <table id="registro_notas8"
                                            class="tablac1 table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="criteriosth" colspan="2">
                                                        Listado de jóvenes</th>
                                                    <?php $p=1+$cuentac1+$cuentac2+$cuentac3+$cuentac4+$cuentac5+$cuentac6+$cuentac7; foreach ($criterios8 as $criterio8) {
                                                    echo '<th colspan="2" class="criteriosth">' . $criterio8->getNombre() . '<input type="hidden" name="id_criterio_'.$p.'" value"'.$criterio8->getId_criterio().'"></th>'; $p++;
                                                } ?>
                                                    <th rowspan="2" class="criteriosth no-sort">Diferencia</th>
                                                </tr>
                                                <tr>
                                                    <th class="criterios no-sort" width="25px;">N°</th>
                                                    <th class="criterios no-sort" width="400px;">Nombre completo</th>
                                                    <th class="criterios no-sort">Nota inicio</th>
                                                    <th class="criterios no-sort">Nota fin</th>
                                                    <th class="criterios no-sort">Nota inicio</th>
                                                    <th class="criterios no-sort">Nota fin</th>
                                                    <th class="criterios no-sort">Nota inicio</th>
                                                    <th class="criterios no-sort">Nota fin</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $correlativo = 1;
                                                $y=1;//Variable que controla los name para guardar el id del alumno
                                                $j = ($cantidadAlumnos*7)+1;
                                                $x = (count($criterios1)+count($criterios2)+count($criterios3)+count($criterios4)+count($criterios5)+count($criterios6)+count($criterios7)+1);
                                                foreach ($alumnos as $alumno) {
                                                    echo '<td class="criterios"><input type="hidden" name="'.$y.'" value="'.$alumno->getId_alumno().'">' . $correlativo . '</td><td class="nombres">' . $alumno->getApellidos().', '.$alumno->getNombre() . '</td><td class="notas"><input  type="number" min="1" step="1" max="3"  name="nota_inicio_'.$x.'"></td><td class="notas"><input type="number" min="1" step="1" max="3" name="nota_fin_'.$x.'"></td><td class="notas"><input  min="1" step="1" max="3" type="number" name="nota_inicio_'.($x+1).'"></td><td class="notas"><input min="1" step="1" max="3" type="number"  name="nota_fin_'.($x+1).'"></td><td class="notas"><input min="1" step="1" max="3" type="number"  name="nota_inicio_'.($x+2).'"></td><td class="notas"><input min="1" step="1" max="3" type="number" name="nota_fin_'.($x+2).'"></td></td><td class="notas"><input min="1" step="1" max="3" type="number" name="diferencia' . $j . '"></td></tr>';
                                                    $x= $x+$cantidadCriterios;
                                                    $j++;
                                                    $y++;
                                                    $correlativo++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Fin de tab #8 -->

                            </div>
                            <!-- Fin del contenido de las tabs -->

                        </div>
                    </div>



                    <!-- Inicio sección botones -->
                    <div class="container" style="margin-top:2%;">
                        <div class="row justify-content-xl-center">
                            <div class="col-xl-10">
                                <div class="form-row">
                                    <div class="form-group col-xl-3"></div>
                                    <div class="form-group col-xl-3">
                                        <input type="submit" class="btn btn-success btn-responsive form-control"
                                            name="guardar" value='Guardar notas'>
                                    </div>
                                    <div class="form-group col-xl-3">
                                        <a class="btn btn-danger btn-responsive form-control"
                                            href="../home.php">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Fin de sección botones -->
                </div>
                <!-- Fin del card body -->
            </div>
        </div>
    </form>
</body>

<script>
    $(document).ready(function() {
        $('#registro_notas').DataTable({
            responsive: true,
            language: {
                url: './js/es.json'
            },
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            }]
        });
        $('#registro_notas2').DataTable({
            responsive: true,
            language: {
                url: './js/es.json'
            },
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            }]
        });
        $('#registro_notas3').DataTable({
            responsive: true,
            language: {
                url: './js/es.json'
            },
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            }]
        });
        $('#registro_notas4').DataTable({
            responsive: true,
            language: {
                url: './js/es.json'
            },
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            }]
        });
        $('#registro_notas5').DataTable({
            responsive: true,
            language: {
                url: './js/es.json'
            },
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            }]
        });
        $('#registro_notas6').DataTable({
            responsive: true,
            language: {
                url: './js/es.json'
            },
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            }]
        });
        $('#registro_notas7').DataTable({
            responsive: true,
            language: {
                url: './js/es.json'
            },
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            }]
        });
        $('#registro_notas8').DataTable({
            responsive: true,
            language: {
                url: './js/es.json'
            },
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            }]
        });





        $('.dataTables_length').addClass('bs-select');

    });
</script>