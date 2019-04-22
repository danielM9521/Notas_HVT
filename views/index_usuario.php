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
        <h2>MANTENIMIENTO USUARIO</h2>
        <br>
        <a class="btn btn-success" href="crear_usuario.php">Agregar Usuario</a>
        <br><br>
        <div class="table-responsive">
          <table id="mantenimiento" class="table table-hover">
            <thead>
              <tr>
                <th>
                  ID Usuario
                </th>
                <th>
                  Nombre completo
                </th>
                <th>
                  Rol
                </th>
                <th>
                  Correo
                </th>
                <th>
                  Contraseña
                </th>
                <th colspan="2">
                  Acciones
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
              include_once("../controllers/usuario_controller.php ");
              $usuarios = usuario_controller::findAll();
              foreach ($usuarios as $usuario) { ?>
                <tr>
                  <td><?php echo $usuario->getId_usuario(); ?></td>
                  <td><?php echo $usuario->getApellidos() . ", " . $usuario->getNombre(); ?></td>
                  <td><?php echo $usuario->getId_rol(); ?></td>
                  <td><?php echo $usuario->getCorreo(); ?></td>
                  <td><?php echo $usuario->getContrasenia(); ?></td>
                  <td><a a class="btn btn-warning " href="editar_usuario.php?id_usuario=<?php echo $usuario->getId_usuario(); ?>">Editar</a></td>
                  <td><a a class="btn btn-danger" href="eliminar_usuario.php?id_usuario=<?php echo $usuario->getId_usuario(); ?>">Eliminar</a></td>

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