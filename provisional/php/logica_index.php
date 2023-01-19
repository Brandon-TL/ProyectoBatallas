<?php
    require_once 'funciones.php';
    if (isset($_POST['ENTRAR'])) {
        $_usuario_err = $_password_err = null;
        $_valid_usuario = $_valid_password = null;

        $_usuario = htmlspecialchars($_POST["usuario"]);
        $_password = htmlspecialchars($_POST["password"]);

        if (empty(trim($_usuario))) {
            $_usuario_err = $lang['logueo_vacio_usuario'];
        } else {
            // echo $_usuario . " es el usuario<br>";
            $_valid_usuario = $_usuario;
        }
        
        if (empty(trim($_password))) {
            $_password_err = $lang['logueo_vacio_password'];
        } else {
            // echo $_password . " es la contraseña";
            $_valid_password = $_password;
        }

        if (is_null($_usuario_err)) {
            $encontrado = selectBD(array('nombreusuario'), 'credencial', 'nombreusuario', $_valid_usuario);
            // echo "<br>". $encontrado['nombreusuario'];
            if (!$encontrado) {
                // var_dump($encontrado);
                $_usuario_err = $lang['logueo_error_usuario'];
            } else if ($encontrado) {
                if (is_null($_password_err)) {  
                    if (!loguear($_valid_usuario, $_valid_password)) {
                        $_password_err = $lang['logueo_error_password'];
                    } else if ($_valid_usuario == 'admin') {
                        header("Location: admin.php");
                        exit();
                    } else {
                        header("Location: inicio.php");
                        exit();
                    }
                }
            }
        }
    }
?>