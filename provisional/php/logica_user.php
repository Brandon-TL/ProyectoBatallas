<?php
    require_once 'funciones.php';

    if (isset($_POST['NO_IGNORAR'])) {
        // ACCION CUANDO SE RETIRE EL VOTO DE IGNORAR DE UNA BATALLA
    } else if (isset($_POST['NO_DENUNCIA'])) {
        // ACCION CUANDO SE RETIRE EL VOTO DE DENUNCIA DE UNA BATALLA
    } else if (isset($_POST['SALIR'])) {
        if(!isset($_SESSION)) { 
            session_start(); 
        }
        // Obtener datos de la sesión y almacenarlos en un array
        $sesion = array( $usuario = $_SESSION["usuario"],$fechainicio = $_SESSION["fInicio"] , $fechafinal = date('Y-m-d H:i:s'));
        // Registrar la sesión en la base de datos
        registrarSesion($sesion);
        // Destruir sesión
        session_destroy();
        // Eliminar cookies de sesión
        unset($_COOKIE["PHPSESSID"]);
        setcookie("PHPSESSID", null, -1, '/');
        // Redirigir a página principal
        header("Location: index.php");
    }
?>