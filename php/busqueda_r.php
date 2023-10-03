<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Buscar </title>
<!--link de para la interaccion de las interfaces-->
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap-material-design.min.css">
	<link rel="stylesheet" href="../css/all.css">
	<link rel="stylesheet" href="../css/sweetalert2.min.css">
	<script src="../js/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="../css/style.css">
</head>

<body>
	<main class="full-box main-container">
		<!--inicio de 1ra seccion-->
		<section class="full-box nav-lateral">
			<div class="full-box nav-lateral-bg show-nav-lateral"></div>
			<div class="full-box nav-lateral-content">
				<figure class="full-box nav-lateral-avatar">
					<figcaption class="roboto-medium text-center">
						Paramédicos<br><small class="roboto-condensed-light">Usuario</small>
					</figcaption>
				</figure>
				<div class="full-box nav-lateral-bar"></div>
				<nav class="full-box nav-lateral-menu"><!--inicio de barra de navegacion-->
					<ul>
						<li>
							<a href="../principal.html"><i class="fab fa-dashcube fa-fw"></i> INICIO</a>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-user-nurse"></i> &nbsp; Materiales<i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="sagrega_material.html"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar
									</a>
								</li>
								<li>
									<a href="lista_materiales.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp;
										Lista</a>
								</li>
								<li>
									<a href="busca_materiales_a.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar
									</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-user-shield"></i> &nbsp; Paciente<i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="../paciente/hojaprehospitalaria.html"><i class="fas fa-plus fa-fw"></i>
										&nbsp; Informe</a>
								</li>
								<li>
									<a href="../paciente/Buscarpaciente.html"><i class="fas fa-search-dollar fa-fw"></i>
										&nbsp; Buscar </a>
								</li>
							</ul>
						</li>
					</ul>
				</nav><!--fin de barra de navegacion-->
			</div>
		</section><!--fin de 1ra seccion-->

		<!-- Contenido de página -->
		<section class="full-box page-content">
			<nav class="full-box navbar-info">
				<a href="#" class="float-left show-nav-lateral">
					<i class="fas fa-exchange-alt"></i>
				</a>
			</nav>

			<!-- Encabezado de página -->
			<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR
				</h3>

			</div>

			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="../materiales/agrega_material.html"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR </a>
					</li>
					<li>
						<a href="../materiales/lista_materiales.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA </a>
					</li>
					<li>
						<a class="active" href="../materiales/busca_materiales_a.php "><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR
						</a>
					</li>
				</ul>
			</div>

			<!-- Contenido de página -->
			<div class="container-fluid">
				<form class="form-neon" action="busqueda_r.php" method="post">
				<div class="container-fluid">
                        <ul class="full-box list-unstyled page-nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link" href="../php/busqueda_a.php">Ambulancia</a>
                            </li>
                            <br>
                            <li class="nav-item">
                                <a class="nav-link" href="../php/busqueda_r.php">Rescate</a>
                            </li>
                        </ul>
                    </div>
					<div class="container-fluid">
						<div class="row justify-content-md-center">
							<div class="col-12 col-md-6">
								<div class="form-group">
									<label for="inputSearch" class="bmd-label-floating">Busqueda R</label>
									<input type="text" class="form-control" name="d" id="inputSearch" maxlength="30">
								</div>
							</div>
							<div class="col-12">
								<p class="text-center" style="margin-top: 40px;">
										<input type="submit" class="btn btn-raised btn-info fas fa-search" name="enviar" value="BUSCAR">
								</p>
							</div>
							<br>

								<div class="table-responsive">
									<table border="1" class="table table-bordered text-center table-sm"><!--inicio de tabla-->
										<thead>
											<tr style="background-color: black;">
												<th>#</th>
												<th>TITULAR</th>
												<th>DESCRIPCION</th>
												<th>CANTIDAD</th>
												<th>FECHA DE INGRESO</th>
												<th>RECIBIDO POR</th>
												<th>OBSERVACIONES</th>
											</tr>
										</thead>
										<tbody>
											<?php
											include('../conexion.php');
											if (isset($_POST['enviar'])) {
												$d = $_POST['d'];
												$condicion = "select * from m_rescate where d='$d'";
												$con = new ConexionDB();
												$lista = $con->consultar($condicion);
												
												foreach ($lista as $v) {
											?>
													<tr>
													    <td><?php echo $v['id'] ?></td>
														<td><?php echo $v['t'] ?></td>
														<td><?php echo $v['d'] ?></td>
														<td><?php echo $v['c'] ?></td>
														<td><?php echo $v['sm'] ?></td>
														<td><?php echo $v['rc'] ?></td>
														<td><?php echo $v['ob'] ?></td>
														<td><a href="actualizar_r.php?d=<?php echo $v['d'] ?>" class="btn btn-success">Actualizar</a>
															<a href="eliminar_r.php?d=<?php echo $v['d'] ?>" class="btn btn-danger"><i
                                            class="far fa-trash-alt"></i></a>
														</td>
													</tr>
											<?php }
											} ?>
										</tbody>
									</table>
								</div>

							<div class="col-12">
								<p class="text-center" style="margin-top: 20px;">
									<button type="submit" class="btn btn-raised btn-danger"><i class="far fa-trash-alt"></i> &nbsp; ELIMINAR BÚSQUEDA</button><!--boton de acciones-->
								</p>
							</div>
						</div>
					</div>
				</form>
			</div><!--fin del formulario-->
		</section><!--fin de 2da seccion-->
	</main>
	    <!--enlace de librerias o link-->
	<script src="../js/jquery-3.7.0.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="../js/bootstrap-material-design.min.js"></script>
	<script src="../js/main.js"></script>
</body>

</html>