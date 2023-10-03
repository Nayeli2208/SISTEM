<?php
//INICIAMOS LA SESION
session_start();

//EL USUARIO DA CLIC EN EL BOTON ENVIAR
if (isset($_POST['enviar'])) :
    //SE HACE LA CONEXION CON LA BASE DE DATOS
    include "conexion.php";
    //SE IN INICIA LA CONEXION
    $axer = new ConexionDB ();

    //SE DECLARA LAS VARIABLES PARA QUE EL USUARIO INGRESE
    $usu = $_POST['usu'];
    $passd = $_POST['passd'];

    //SE RELAIZA LA CONSULTA
    $form = "usu='" . $usu . "' AND passd ='" . $passd . "'";
    //SE INDICA LA FUNCION
    $validado = $axer->buscar("usuario", $form);

    //SE EJECUTAL EL RESULTADO ENCONTRADO
    if ($validado) :
        foreach ($validado as $resultado) :
            //SI EL INVEL ES ADMI
            $_SESSION['usu'] = $resultado['usu'];
            if ($resultado['tipo'] == "administrador") :
                //SE INCIA COMO ADMINISTRADOR
                header("location: ./admin/principal.html");
            endif;
            if ($resultado['tipo'] == "paramedico") :
                //SE INCIA COMO ADMINISTRADOR
                header("location: ./principal.html");
            endif;
      //....................................
    endforeach;
    else :
        //DE TAL MANERA NO SE ENTRA AL SISTEMA
        header("location: index.html");
    endif;
else :
endif;
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Acceso</title>

	<link rel="stylesheet" href="./css/normalize.css">
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/bootstrap-material-design.min.css">
	<link rel="stylesheet" href="./css/all.css">
	<link rel="stylesheet" href="./css/sweetalert2.min.css">
	<script src="./js/sweetalert2.min.js" ></script>
	<link rel="stylesheet" href="./css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="./css/style.css">
</head>
<body>

	<div class="login-container">
		<div class="login-content">
			<p class="text-center">
				<i class="fas fa-user-circle fa-5x"></i>
			</p>
			<p class="text-center">
				Inicia sesión con tu cuenta
			</p>
			<form action="index.php" method="POST">
				<div class="form-group">
					<label for="UserName" class="bmd-label-floating"><i class="fas fa-user-secret"></i> Usuario</label>
					<input type="text" class="form-control" name="usu">
				</div>
				<div class="form-group">
					<label for="UserPassword" class="bmd-label-floating"><i class="fas fa-key"></i> Contraseña</label>
					<input type="password" class="form-control" name="passd">
				</div>
				<button type="submit" name="enviar" class="btn-login text-center">Ingresar</button>
			</form>
		</div>
	</div>

	<?php
// Obtiene el ID del usuario que realiza la acción (puedes obtener esta información de tu sistema de autenticación)
$usuario_id = $_SESSION['usu'];
// Obtiene la acción realizada por el usuario
$accion = "Ingreso al sistema";
$direccion_ip = $_SERVER['REMOTE_ADDR']; // Dirección IP del usuario
// Establece la conexión a la base de datos (asegúrate de reemplazar los valores con los correctos)
$conexion = new mysqli("localhost", "root", "n@y@l@2208", "amp");

// Verifica si hay algún error en la conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Prepara la consulta SQL para insertar el registro en la tabla
$sql = "INSERT INTO bitacora_usuario (usuario_id, accion,direccion_ip) VALUES ('$usuario_id', '$accion','$direccion_ip')";

// Ejecuta la consulta
if ($conexion->query($sql) === TRUE) {
    echo "Acción registrada exitosamente en la bitácora de usuarios.";
} else {
    echo "Error al registrar la acción: " . $conexion->error;
}

// Cierra la conexión
$conexion->close();
?>

	<script src="./js/jquery-3.4.1.min.js" ></script>
	<script src="./js/popper.min.js" ></script>
	<script src="./js/bootstrap.min.js" ></script>
	<script src="./js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="./js/bootstrap-material-design.min.js" ></script>
	<script src="./js/main.js" ></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	
	<script src="./js/alert_principal.js"></script>
</body>
</html>