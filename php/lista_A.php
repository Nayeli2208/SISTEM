<?php
// Paso 1: Establecer la conexión con la base de datos
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "amp";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Paso 2: Ejecutar la consulta SQL
$sql = "SELECT * FROM m_rescate";
$resultado = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Lista </title>
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
                            <a href="./../principal.html"><i class="fab fa-dashcube fa-fw"></i>INICIO</a>
                        </li>

                        <li>
                            <a href="#" class="nav-btn-submenu"><i class="fas fa-user-nurse"></i> &nbsp; Materiales<i
                                    class="fas fa-chevron-down"></i></a>
                            <ul>
                                <li>
                                    <a href="../materiales/agrega_material.html"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar </a>
                                </li>
                                <li>
                                    <a href="../materiales/lista_materiales.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp;
                                        Lista</a>
                                </li>
                                <li>
                                    <a href="../materiales/busca_materiales_a.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar
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
                                        &nbsp;
                                        Informe</a>
                                </li>
                                <li>
                                    <a href="../paciente/Buscarpaciente.html"><i class="fas fa-search-dollar fa-fw"></i>
                                        &nbsp;
                                        Buscar </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav><!--find e barra de navegacion-->
            </div>
        </section><!--fin de 1ra seccion-->

        <section class="full-box page-content">
            <nav class="full-box navbar-info">
                <a href="#" class="float-left show-nav-lateral">
                    <i class="fas fa-exchange-alt"></i>
                </a>
            </nav>

<!-- Contenido de página -->
            <div class="full-box page-header">
                <h3 class="text-left">
                    <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA
                </h3>
                <p class="text-justify">

                </p>
            </div>

            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">
                    <li>
                        <a href="../materiales/agrega_material.html"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR</a>
                    </li>
                    <li>
                        <a class="active" href="../materiales/lista_materiales.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp;
                            LISTA</a>
                    </li>
                    <li>
                        <a href="../materiales/busca_materiales_a.php"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR</a>
                    </li>
                </ul>
            </div>
            <h6 class="text-left">
                <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Seleccione Lista
            </h6>
            <br>
            <!-- Contenido de página -->
            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="../php/lista_B.php">Ambulancia</a>
                    </li>
                    <br>
                    <li class="nav-item">
                        <a class="nav-link" href="../php/lista_A.php">Rescate</a>
                    </li>
                </ul>
            </div>
            <form id="miFormulario">
            <div class="container-fluid">
                <div class="table-responsive">
                    <table border="1" class="table table-bordered text-center table-sm" id="tabla"><!--inicio de tabla-->
                        <thead>
                            <tr style="background-color: black;">
                                <th>ID</th>
                                <th>TITULAR</th>
                                <th>DESCRIPCION</th>
                                <th>CANTIDAD</th>
                                <th>FECHA DE INGRESO</th>
                                <th>RECIBIDO POR</th>
                                <th>OBSERVACIONES</th>
                            </tr>
                            <?php
                    // Paso 3: Recorrer los resultados y generar el HTML
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<td>" . $fila['id'] . "</td>";
                        echo "<td>" . $fila['t'] . "</td>";
                        echo "<td>" . $fila['d'] . "</td>";
                        echo "<td>" . $fila['c'] . "</td>";
                        echo "<td>" . $fila['sm'] . "</td>";
                        echo "<td>" . $fila['rc'] . "</td>";
                        echo "<td>" . $fila['ob'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                        </thead>
                    </table><!--fin de tabla/php-->
                </div>
            </div>
            <p class="text-center" style="margin-top: 40px;">
				<button type="button" class="btn btn-raised btn btn-info btn-sm" onclick="imprimirTabla()">Imprimir</button><!--boton de acciones-->
                </p>
            </form><!--fin del formulario-->
		</section><!--fin de 2da seccion-->
    </main>
<!--enlace de librerias o link-->
    <script type="text/javascript" src="../js/jquery-3.7.0.min.js"></script>
    <script src="../js/registrom_am.js" type="text/javascript"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../js/bootstrap-material-design.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script>
        function imprimirTabla() {
            const tabla = document.getElementById("tabla");
            const tablaHTML = tabla.outerHTML;

            const ventanaImpresion = window.open('', '_blank');
            ventanaImpresion.document.write(tablaHTML);
            ventanaImpresion.document.close();
            ventanaImpresion.print();
        }
    </script>
</body>

</html>
<?php
// Cerrar la conexión
mysqli_close($conn);
?>