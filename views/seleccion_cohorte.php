<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>



<body>
    <?php require_once("../navbar.php");?>
    <div class="container" style="margin-top:2%;">
        <div class="row justify-content-xl-center">
            <div class="col-xl-10">
            <div class="card">
            <div class="card-header">
            <h2>COHORTES ACTIVOS</h2>
            </div>
            </div>
            
                <form method="post">
<div class="card">
<div class="card-body">
<div class="table-responsive">
<table id="seleccion_cohorte" class="table-bordered table-hover">
<thead>
<tr>
<th>SEDE</th>
<th>NOMBRE</th>
<th>CURSO</th>
<th colspan="3">ACCIÓN</th>
</tr>
</thead>
<tbody>
<?php
 include_once("../controllers/cohorte_controller.php ");
                $cohortes = cohorte_controller::findAllActives();
								foreach ($cohortes as $cohorte) { ?>
									<tr>
                                        <td><?php echo $cohorte->getId_sede();?></td>
										<td><?php echo $cohorte->getNombre(); ?></td>
                                        <td><?php echo $cohorte->getId_curso();?></td>
                    <td><a  class="btn btn-success " href="registrar_nota_hvt.php?id_cohorte=<?php echo $cohorte->getId_cohorte();?>">Registrar notas</a></td>
                    <td><a class="btn btn-warning "  href="modificar_nota_hvt.php?id_cohorte=<?php echo $cohorte->getId_cohorte();?>">Modificar notas</a></td>
                    <td><a  class="btn btn-info " href="reporte_cohorte.php?id_cohorte=<?php echo $cohorte->getId_cohorte();?>">Generar reporte</a></td></tr>
                    
                <?php }?>
 </tbody>
</tbody>
</table>
</div>
</div>
</div>

                </form>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function () {
$('#seleccion_cohorte').DataTable();
$('.dataTables_length').addClass('bs-select');
});
</script>