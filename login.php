<?php
//INICIAMOS LA SESION
session_start();

//EL USUARIO DA CLIC EN EL BOTON ENVIAR
if (isset($_POST['enviar'])) :
    //SE HACE LA CONEXION CON LA BASE DE DATOS
    include "conexion.php";
    //SE IN INICIA LA CONEXION
    $axer = new ConexionDB();

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
                header("location: principal.html");
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