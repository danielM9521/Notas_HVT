<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
    <div style="padding-left:16px">
    <br>
<h1 style="margin-left:33%;">Mantenimiento Rol</h1>
<br>
<a class="btn btn-success" href="crear_rol.php">Agregar Rol</a>
<br><br>
<div class="table-responsive">
 <table class="table table-bordered">
            <thead>
                <tr>
                    <th>
                        ID Rol
                    </th>
                    <th>
                        Rol
                    </th>
                    <th colspan = "2">
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
                        <td></td>
                    </tr>
                <?php } ?>
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
</body>