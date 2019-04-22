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
        <h2>MANTENIMIENTO CURSO</h2>
        <br>
        <a class="btn btn-success" href="crear_curso.php">Agregar curso</a>
        <br><br>
        <div class="table-responsive">
          <table id="mantenimiento" class="table table-hover">
            <thead>
              <tr>
                <th>
                  ID Curso
                </th>
                <th>
                  Curso
                </th>
                <th colspan="2">
                  Acciones
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
              include_once("../controllers/curso_controller.php ");
              $cursos = curso_controller::findAll();
              foreach ($cursos as $curso) { ?>
                <tr>
                  <td><?php echo $curso->getId_curso(); ?></td>
                  <td><?php echo $curso->getNombre(); ?></td>

                  <td><a class="btn btn-warning " href="editar_curso.php?id_curso=<?php echo $curso->getId_curso(); ?>">Editar</a></td>
                  <td><a class="btn btn-danger " href="eliminar_curso.php?id_curso=<?php echo $curso->getId_curso(); ?>">Eliminar</a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
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
      $('#mantenimiento').DataTable();
      $('.dataTables_length').addClass('bs-select');
    });
  </script>
</body>