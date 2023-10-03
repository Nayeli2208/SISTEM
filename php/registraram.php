<?php
include('../conexion.php');//se ingresa la coneccion por medio de clase en el codigo PHP

$t = $_POST['t'];
$d = $_POST['d'];
$c = $_POST['c'];
$f = $_POST['f'];
$nom_recibe = $_POST['nom_recibe'];
$obs_material = $_POST['obs_material'];
$m_ambulancia = ("INSERT INTO m_ambulancia (t,d,c,f,nom_recibe,obs_material)
VALUES('$t','$d','$c','$f','$nom_recibe','$obs_material')"); //se ingresa a la tabla con los datos

$con = new ConexionDB();

$con->insertar($m_ambulancia);

print json_encode($con);
?>

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
$sql = "SELECT * FROM m_ambulancia";
$resultado = mysqli_query($conn, $sql);

?>