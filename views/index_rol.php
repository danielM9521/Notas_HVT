<?php require_once("../header.php");?>
<link rel="stylesheet" href="./css/style.css">
<body>
<?php require_once("../navbar.php");?>
    <div style="padding-left:16px">
        <h2>Mantenimiento-Rol</h2>
        <a href="crear_rol.php">Agregar rol</a>
        <table class="table-hover table-bordered">
            <thead>
                <tr>
                    <th>
                        ID Rol
                    </th>
                    <th>
                        Rol
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

                        <td><a href="editar_rol.php?id_rol=<?php echo $rol->getId_rol(); ?>">Editar</a></td>
                        <td><a href="eliminar_rol.php?id_rol=<?php echo $rol->getId_rol(); ?>">Eliminar</a></td>
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