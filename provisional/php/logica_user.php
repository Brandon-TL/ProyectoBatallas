<?php
    require_once 'funciones.php';

    if (isset($_POST['NO_IGNORAR'])) {
        // ACCION CUANDO SE RETIRE EL VOTO DE IGNORAR DE UNA BATALLA
    } else if (isset($_POST['NO_DENUNCIA'])) {
        // ACCION CUANDO SE RETIRE EL VOTO DE DENUNCIA DE UNA BATALLA
    }else if (isset($_POST['ELIMINAR'])) {
        $_eliminar_usuario_err = $_eliminar_password_err = $_confirmar_password_err = $_palabra = null;
        
        // Obtener datos relacionados con el botón eliminar
        $_usuario = htmlspecialchars($_POST["usuario_eliminar"]);
        $_password = htmlspecialchars($_POST["password_eliminar"]);
        $_confirm = htmlspecialchars($_POST["confirmar_eliminar"]);

        // Comprobar el idioma y establecer la palabra de seguridad al respecto
        if ($_COOKIE['lang'] == 'es') {
            $_palabra = 'CONFIRMAR';
        } else if ($_COOKIE['lang'] == 'en') {
            $_palabra = 'CONFIRM';
        }

        // Comprobar credenciales y palabra de seguridad
        if (comprobarCredenciales($_usuario, $_password) && $_confirm == $_palabra) {
            // // Eliminar usuario y sus información de la base de datos

            // // testing on test.php
            // eliminarUsuarioBD($_SESSION['usuario']);
            // // Esta función incluye "cerrarSesion()"
        }
    } else if (isset($_POST['SALIR'])) {
        // Ejecutar función para cerrar sesión
        cerrarSesion();
    }
?>