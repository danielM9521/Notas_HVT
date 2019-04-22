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
                <h2>MANTENIMIENTO ROL</h2>
                <br>
                <a class="btn btn-success" href="crear_rol.php">Agregar Rol</a>
                <br><br>
                <div class="table-responsive">
                    <table id="mantenimiento" class="table table-hover">
                        <thead>
                            <tr>
                                <th>
                                    ID Rol
                                </th>
                                <th>
                                    Rol
                                </th>
                                <th colspan="2">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once("../controllers/rol_controller.php ");
                            $roles = rol_controller::findAll();
                            foreach ($roles as $rol) { ?>
                                <tr>
                                    <td><?php echo $rol->getId_rol(); ?></td>
                                    <td><?php echo $rol->getNombre(); ?></td>

                                    <td><a class="btn btn-warning " href="editar_rol.php?id_rol=<?php echo $rol->getId_rol(); ?>">Editar</a></td>
                                    <td><a class="btn btn-danger " href="eliminar_rol.php?id_rol=<?php echo $rol->getId_rol(); ?>">Eliminar</a></td>

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