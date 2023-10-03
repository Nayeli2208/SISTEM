<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"><!--Intrucciones de interaccion-->
    <title>Buscar </title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-material-design.min.css">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

    <main class="full-box main-container">
        <section class="full-box nav-lateral"><!--inicio de seccion principal -->
            <div class="full-box nav-lateral-bg show-nav-lateral"></div>
            <div class="full-box nav-lateral-content">
                <figure class="full-box nav-lateral-avatar">
                    <figcaption class="roboto-medium text-center">
                        Paramédicos<br><small class="roboto-condensed-light">Usuario</small>
                    </figcaption>
                </figure>
                <div class="full-box nav-lateral-bar"></div>
                <nav class="full-box nav-lateral-menu"><!--fin de barra de navegacion-->
                    <ul>
                        <li>
                            <a href="../principal.html"><i class="fab fa-dashcube fa-fw"></i> INICIO</a>
                        </li>

                        <li>
                            <a href="#" class="nav-btn-submenu"><i class="fas fa-user-nurse"></i> &nbsp; Materiales<i
                                    class="fas fa-chevron-down"></i></a>
                            <ul>
                                <li>
                                    <a href="agrega_material.html"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar
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
                            <a href="#" class="nav-btn-submenu"><i class="fas fa-user-shield"></i> &nbsp; Paciente<i
                                    class="fas fa-chevron-down"></i></a>
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
        </section><!--fin de seccion-->

        <section class="full-box page-content">
            <nav class="full-box navbar-info">
                <a href="#" class="float-left show-nav-lateral">
                    <i class="fas fa-exchange-alt"></i>
                </a>
            </nav>

            <div class="full-box page-header"><!--titulo integrado N°2-->
                <h3 class="text-left">
                    <i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR
                </h3>
            </div>

            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">
                    <li>
                        <a href="agrega_material.html"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR </a><!--Acceso para ingreso de nuevo amterial-->
                    </li>
                    <li>
                        <a href="lista_materiales.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA </a><!--Acceso a nuevo material-->
                    </li>
                    <li>
                        <a class="active" href="busca_materiales_a.php
						"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR
                        </a>
                    </li>
                </ul>
            </div>

            <div class="container-fluid">
                <form class="form-neon" action="busca_materiales_a.php" method="post"><!--se ingresa con el metodo post-->
                    <div class="container-fluid">
                        <ul class="full-box list-unstyled page-nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link" href="../php/busqueda_a.php">Ambulancia</a><!--direccion a los resultados de busqueda-->
                            </li>
                            <br>
                            <li class="nav-item">
                                <a class="nav-link" href="../php/busqueda_r.php">Rescate</a><!--direccion a los resultados de busqueda-->
                            </li>
                        </ul>
                    </div>
                </form><!--fin de form-->
            </div>
        </section><!--fin de seccion pantalla-->
    </main>
    <script src="../js/jquery-3.7.0.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../js/bootstrap-material-design.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>