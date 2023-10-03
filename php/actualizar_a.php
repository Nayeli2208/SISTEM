<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
                                    <a href="../materiales/agrega_material.html"><i class="fas fa-plus fa-fw"></i>
                                        &nbsp; Agregar
                                    </a>
                                </li>
                                <li>
                                    <a href="../materiales/lista_materiales.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp;
                                        Lista</a>
                                </li>
                                <li>
                                    <a href="../materiales/busca_materiales_a.php"><i class="fas fa-search fa-fw"></i>
                                        &nbsp; Buscar
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

                        <li>
                            <a href="#" class="nav-btn-submenu"><i class="fas fa-user-shield"></i> &nbsp;
                                Notificaciones<i class="fas fa-chevron-down"></i></a>
                            <ul>
                                <li>
                                    <a href="../alerta.html"><i class="fas fa-plus fa-fw"></i> &nbsp; Informe</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav><!--fin de barra de navegacion-->
            </div>
        </section><!--fin de 1ra seccion-->

        <!-- Contenido de página -->
        <section class="full-box page-content"><!--inicio de 2da seccion-->
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
                        <a href="../materiales/agrega_material.html"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR
                        </a>
                    </li>
                    <li>
                        <a href="../materiales/lista_materiales.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp;
                            LISTA </a>
                    </li>
                    <li>
                        <a class="active" href="../materiales/busca_materiales_a.php
						"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contenido aquí-->
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

            <?php
            include ('../conexion.php');
            $con = new conexionDB();
            $d = $_GET['d'];

            $consulta = "SELECT * FROM m_ambulancia WHERE d='$d'";
            $lista = $con->consultar($consulta);
            foreach ($lista as $v) {
            ?>
                <form action="update.php" method="POST"><!--metodo POST-->
                    <div class="container-fluid">
                        <h5 style="background:#aa5d74; font-style: italic; font-weight: bold;" class="text-center p-2">Ingrese los datos</h5>
                        <div class="row">
                            <div class="col-sm-4">
                                <input type="hidden" class="form-control" name="d" value="<?php echo $v['d'] ?>">
                                <label>Titular</label>
                                <input type="text" class="form-control" name="t" value="<?php echo $v['t'] ?>">
                            </div>
                            <div class="col-sm-4">
                                <label>Cantidad</label>
                                <input type="number" class="form-control" name="c" value="<?php echo $v['c'] ?>">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Fecha de ingreso</label>
                                <input type="date" class="form-control" name="f" value="<?php echo $v['f'] ?>">
                            </div>
                            <div class="col-sm-4">
                                <label>Recibe:</label>
                                <input type="text" class="form-control" name="nom_recibe" value="<?php echo $v['nom_recibe'] ?>">
                            </div>
                            <div class="col-sm-4">
                                <label>OBSERVACIONES</label>
                                <input type="text" class="form-control" name="obs_material " value="<?php echo $v['obs_material'] ?>">
                            </div>
                        </div>
                        <!--fin del formulario-->
                        <br>
                        <p class="text-center" style="margin-top: 40px;">
                        <input type="submit" name="enviar" class="btn btn-raised btn-info btn-sm" value="ACTUALIZAR"><!--boton de accion-->
                            <a href="busqueda_a.php" type="button" class="btn btn-outline-danger">Regresar</a><!--boton de accion-->
                        </p>
                    </div>
                <?php } ?>
                </form>
        </section><!--fin de 2da seccion-->
    </main>
    <!--enlace de librerias o link-->
    <script src="../js/registrom_am.js"></script>
    <script src="../js/jquery-3.7.0.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../js/bootstrap-material-design.min.js"></script>
    <script src="../js/main.js"></script>

</body>

</html>