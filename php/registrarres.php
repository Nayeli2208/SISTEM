<?php
include('../conexion.php');//se ingresa la coneccion por medio de clase en el codigo PHP

$t = $_POST['t'];
$d = $_POST['d'];
$c = $_POST['c'];
$sm = $_POST['sm'];
$rc = $_POST['rc'];
$ob = $_POST['ob'];
$m_rescate = ("INSERT INTO m_rescate (t,d,c,sm,rc,ob)
VALUES('$t','$d','$c','$sm','$rc','$ob')");//se ingresa a la tabla con los datos

$con = new ConexionDB();

$con->insertar($m_rescate);

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
$sql = "SELECT * FROM m_rescate";
$resultado = mysqli_query($conn, $sql);

?>
<?php
// Cerrar la conexión
mysqli_close($conn);
?>