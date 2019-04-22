<?php require_once("../header.php"); ?>
<link rel="stylesheet" href="./css/style.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<body>
  <?php require_once("../navbar.php"); ?>

  <div class="container" style="margin-top:2%;">
    <div class="row justify-content-xl-center">
      <div class="col-xl-12">
        <br>
        <h2>MANTENIMIENTO ALUMNO</h2><br>
        <a class="btn btn-success" href="crear_alumno.php">Agregar Alumno</a>
        <br><br>
        <div class="table-responsive">
          <table id="mantenimiento_alumno" class="table-bordered table-hover">
            <thead>
              <tr>
                <th>
                  ID Alumno
                </th>
                <th>
                  Nombre completo
                </th>
                <th>
                  Dirección
                </th>
                <th>
                  Estado civil
                </th>
                <th>
                  Sexo
                </th>
                <th>
                  Cohorte
                </th>
                <th colspan="2">
                  Acciones
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
              include_once("../controllers/alumno_controller.php ");
              $alumnos = alumno_controller::findAll();
              foreach ($alumnos as $alumno) {
                ?>
                <tr>
                  <td><?php echo $alumno->getId_alumno(); ?>
                  </td>
                  <td><?php echo $alumno->getApellidos() . ", " . $alumno->getNombre(); ?>
                  </td>
                  <td><?php echo $alumno->getDireccion(); ?>
                  </td>
                  <td><?php echo $alumno->getEstado_civil(); ?>
                  </td>
                  <td><?php echo $alumno->getSexo(); ?>
                  </td>
                  <td><?php echo $alumno->getId_cohorte(); ?>
                  </td>
                  <td><a class="btn btn-warning " href="editar_alumno.php?id_alumno=<?php echo $alumno->getId_alumno(); ?>">Editar</a>
                  </td>
                  <td><a class="btn btn-danger " href="eliminar_alumno.php?id_alumno=<?php echo $alumno->getId_alumno(); ?>">Eliminar</a>
                  </td>

                <?php
              } ?>
            </tbody>
          </table>
        </div>
        <script>
          function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
              x.className += " responsive";
            } else {
              x.className = "topnav";
            }
          }
        </script>
        <script>
          $(document).ready(function() {
            $('#mantenimiento_alumno').DataTable();
            $('.dataTables_length').addClass('bs-select');
          });
        </script>
      </div>
    </div>
  </div>
</body>