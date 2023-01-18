<?php
    require_once 'funciones.php';
    if (isset($_POST['ENTRAR'])) {
        $_usuario_err = $_password_err = null;
        $_valid_usuario = $_valid_password = null;

        $_usuario = htmlspecialchars($_POST["usuario"]);
        $_password = htmlspecialchars($_POST["password"]);

        if (empty(trim($_usuario))) {
            $_usuario_err = $lang['index_vacio_usuario'];
        } else {
            $_valid_usuario = $_POST["usuario"];
        }
        
        if (empty(trim($_password))) {
            $_password_err = $lang['index_vacio_password'];
        } else {
            $_valid_password = $_POST["usuario"];
        }

        if (!is_null($_valid_usuario) || !is_null($_valid_password)) {
            $encontrado = selectBD(array('nombreusuario'), 'credencial', 'nombreusuario', $_valid_usuario);
            if ($encontrado) {
                echo "usuario no encontrado";
                $_usuario_err = $lang['index_error_usuario'];
            } else if (!loguear($_valid_usuario, $_valid_password)) {
                $_password_err = $lang['index_error_password'];
            } else {
                header("Location: inicio.php");
                exit();
            }
        }
    }
?>