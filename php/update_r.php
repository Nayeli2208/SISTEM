<?php
include('../conexion.php');//se ingresa la coneccion por medio de clase en el codigo PHP
$con = new conexionDB();

if (isset($_POST['enviar'])) {
    $t = $_POST['t'];
    $d = $_POST['d'];
    $c = $_POST['c'];
    $sm = $_POST['sm'];
    $rc = $_POST['rc'];
    $ob = $_POST['ob'];

    $condicion = "UPDATE m_rescate SET t='$t', c='$c', sm='$sm', rc='$rc', ob='$ob' where d='$d'";//se ingresa a la tabla con los datos
    
    $update = $con->insertar($condicion);
    header("Location:busqueda_r.php");
}
?>