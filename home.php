<?php include("header.php");?>
<link rel="stylesheet" href="./views/css/style.css">

<body>

	<div class="topnav" id="myTopnav">
		<a href="home	.php" class="active"><i class="fas fa-home"></i></a>

		<div class="drop">
			<button class="dropbtn"><i class="fas fa-tools left"></i> Mantenimiento
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="drop-content">
				<a href="views/index_sede.php">Sede</a>
				<a href="views/index_curso.php">Curso</a>
				<a href="views/index_cohorte.php">Cohorte</a>
				<a href="views/index_rol.php">Rol</a>
				<a href="views/index_usuario.php">Usuario</a>
				<a href="views/index_alumno.php">Alumno</a>
				<a href="views/index_tipo_criterio.php">Competencia</a>
				<a href="views/index_criterio.php">Criterio</a>
			</div>
		</div>
		<a href="views/acerca_de.php"><i class="fas fa-question-circle"></i> Acerca de</a>
		<a href="controllers/logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>
		<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
	</div>

	<div style="padding-left:16px">

	

		<!------ Include the above in your HEAD tag ---------->
		<form method="post">
		<link rel="stylesheet" href="views/css/menu.css">
		<h1 class="text-center">COHORTES ACTIVOS</h1>
		<div class="container">
			<div class="row">
				<?php
                        include_once("./controllers/cohorte_controller_2.php");
            $cc = new cohorte_controller_2();
            $cohortes = $cc->findAllActives();
            foreach ($cohortes as $cohorte) {
                ?>
				<!--team-1-->
				<div class="col-lg-4">
					<div class="our-team-main">
						<div class="team-front">
							<h2 class="cursocard"><?php echo $cohorte->getId_curso(); ?>
							</h2><br><br>
							<input type="hidden" name="nombre_cohorte" value="<?php echo $cohorte->getNombre(); ?>">
							<p class="cohortecard"><?php echo $cohorte->getNombre(); ?>
							</p>
						</div>
						<div class="team-back"><br><br><br>
								<a href="./views/registrar_nota.php?id_cohorte=<?php echo $cohorte->getId_cohorte(); ?>"
									class="btn btn-primary">Registrar Notas</a>
								<a href="" class="btn btn-secondary">Ver Notas</a>
							</span>
						</div>
					</div>
				</div>
				<!--team-1-->
				<?php
            }
        ?>
		</form>
</body>

</html>