<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Bitacora</title>
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
        <section class="full-box nav-lateral">
            <div class="full-box nav-lateral-bg show-nav-lateral"></div>
            <div class="full-box nav-lateral-content">
                <figure class="full-box nav-lateral-avatar">
                    <figcaption class="roboto-medium text-center">NCLL<br><small
                            class="roboto-condensed-light">ADMINISTRADOR</small>
                    </figcaption>
                </figure>
                <div class="full-box nav-lateral-bar"></div>
                <nav class="full-box nav-lateral-menu">
                    <ul>
                        <li>
                            <a href="principal.html"><i class="fab fa-dashcube fa-fw"></i> &nbsp; </a>
                        </li>

                        <li>
                            <a href="#" class="nav-btn-submenu"><i class="fas fa-user-nurse"></i> &nbsp; Materiales<i
                                    class="fas fa-chevron-down"></i></a>
                            <ul>
                                <li>
                                    <a href="../admin/materiales/agrega_material.html"><i class="fas fa-plus fa-fw"></i>
                                        &nbsp; Agregar </a>
                                </li>
                                <li>
                                    <a href="../admin/materiales/lista_materiales.html"><i
                                            class="fas fa-clipboard-list fa-fw"></i> &nbsp;
                                        Lista</a>
                                </li>
                                <li>
                                    <a href="../admin/materiales/busca_materiales.html"><i
                                            class="fas fa-search fa-fw"></i> &nbsp; Buscar </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#" class="nav-btn-submenu"><i class="fas fa-ambulance"></i> &nbsp; Ambulancias<i
                                    class="fas fa-chevron-down"></i></a>
                            <ul>
                                <li>
                                    <a href="../admin/ambulancia/Agregar.html"><i class="fas fa-plus fa-fw"></i> &nbsp;
                                        Agregar</a>
                                </li>
                                <li>
                                    <a href="../admin/ambulancia/ListaMateriales.html"><i
                                            class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista</a>
                                </li>
                                <li>
                                    <a href="../admin/ambulancia/BuscarAmbulancia.html"><i
                                            class="fas fa-search fa-fw"></i> &nbsp; Buscar </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#" class="nav-btn-submenu"><i class="fas fa-user-shield"></i> &nbsp; Paciente<i
                                    class="fas fa-chevron-down"></i></a>
                            <ul>
                                <li>
                                    <a href="../admin/paciente/hojaprehospitalaria.html"><i
                                            class="fas fa-plus fa-fw"></i> &nbsp; Informe</a>
                                </li>
                                <li>
                                    <a href="../admin/paciente/listapaciente.html"><i
                                            class="fas fa-clipboard-list fa-fw"></i> &nbsp;Lista </a>
                                </li>
                                <li>
                                    <a href="../admin/paciente/Buscarpaciente.html"><i
                                            class="fas fa-search-dollar fa-fw"></i> &nbsp; Buscar </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </section>

        <section class="full-box page-content">

            <nav class="full-box navbar-info">
                <a href="#" class="float-left show-nav-lateral">
                    <i class="fas fa-exchange-alt"></i>
                </a>
            </nav>
            <div class="full-box page-header">
                <h3 class="text-left">
                    <i class="fas fa-sync-alt fa-fw"></i> &nbsp; BITACORA ESCENCIAL
                </h3>
                <p class="text-justify">
                    En esta seccion se dara a buscar el tipo de usuario que entro en el sistema.
                    los unicos usuarios destinados an sido 2 los cuales pertenecen a, "Paramedico= ppc3" y
                    "Administrador= admin".</p>
            </div>

            <form action="bitacora.php" method="post">
                <div class="col-sm-4">
                    <label>Ingrese busqueda:</label>
                    <input type="text" class="form-control" name="usuario_id" placeholder="ingrese dato"><br>
                    <input type="submit" class="btn btn-raised btn-info btn-sm" name="enviar" value="Buscar">
                </div>
            </form>

            <!-- Content here-->
            <div class="container-fluid">
                <div class="table-responsive">
                    <table class="table table-dark table-sm">
                        <thead>
                            <tr class="text-center roboto-medium">
                                <th>Id</th>
                                <th>Tipo de usuario</th>
                                <th>Accion</th>
                                <th>Fecha de ingreso</th>
                                <th>Direccion ip</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('../conexion.php');
                            if (isset($_POST['enviar'])) {
                                $usuario_id = $_POST['usuario_id'];
                                $condicion = "select * from bitacora_usuario where usuario_id='$usuario_id' ";
                                $con = new ConexionDB();
                                $lista = $con->consultar($condicion);

                                foreach ($lista as $v) {
                            ?>
                            <tr class="text-center">
                                <td><?php echo $v['id'] ?></td>
                                <td><?php echo $v['usuario_id'] ?></td>
                                <td><?php echo $v['accion'] ?></td>
                                <td><?php echo $v['fecha_hora'] ?></td>
                                <td><?php echo $v['direccion_ip'] ?></td>
                            </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
                <form>
                    <div class="col-12">
                        <p class="text-center" style="margin-top: 20px;">
                            <button type="submit" class="btn btn-raised btn-danger"><i class="far fa-trash-alt"></i>
                                &nbsp; ELIMINAR BÚSQUEDA</button>
                        </p>
                    </div>
                </form>

            </div>
        </section>
    </main>

    <script type="text/javascript" src="../js/jquery-3.7.0.min.js"></script>
    <script src="../js/registrom_am.js" type="text/javascript"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../js/bootstrap-material-design.min.js"></script>
    <script src="../js/main.js"></script>
    <script>
    $(document).ready(function() {
        $('body').bootstrapMaterialDesign();
    });
    </script>

    <script src="../js/main.js"></script>
</body>

</html>