<?php
include('../conexion.php');
$con = new conexionDB();
$d = $_GET['d'];

$delete = "DELETE FROM m_rescate WHERE d='$d'";
$lista = $con->insertar($delete);
header("Location:busqueda_r.php");

