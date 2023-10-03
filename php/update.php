<?php
include('../conexion.php');//se ingresa la coneccion por medio de clase en el codigo PHP
$con = new conexionDB();

if (isset($_POST['enviar'])) {
    $t = $_POST['t'];
    $d = $_POST['d'];
    $c = $_POST['c'];
    $f = $_POST['f'];
    $nom_recibe = $_POST['nom_recibe'];
    $obs_material = $_POST['obs_material'];

    $condicion = "UPDATE m_ambulancia SET t='$t', c='$c', f='$f', nom_recibe='$nom_recibe', obs_material='$obs_material' where d='$d'";//se ingresa a la tabla con los datos
    
    $update = $con->insertar($condicion);
    header("Location:busqueda_a.php");
}
?>