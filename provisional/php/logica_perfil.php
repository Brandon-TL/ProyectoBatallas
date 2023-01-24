<?php
    require_once './php/funciones.php';
    
    if (isset($_POST['ENTRAR'])) {
        $_logueo_usuario_err = $_logueo_password_err = null;
        $_valid_usuario = $_valid_password = null;

        $_usuario = htmlspecialchars($_POST["usuario"]);
        $_password = htmlspecialchars($_POST["password"]);

        if (empty(trim($_usuario))) {
            $_logueo_usuario_err = $lang['logueo_vacio_usuario'];
        } else {
            // echo $_usuario . " es el usuario<br>";
            $_valid_usuario = $_usuario;
        }
        
        if (empty(trim($_password))) {
            $_logueo_password_err = $lang['logueo_vacio_password'];
        } else {
            // echo $_password . " es la contraseña";
            $_valid_password = $_password;
        }

        if (is_null($_logueo_usuario_err)) {
            $encontrado = selectBD(array('nombreusuario'), 'credencial', 'nombreusuario', $_valid_usuario);
            // echo "<br>". $encontrado['nombreusuario'];
            if (!$encontrado) {
                // var_dump($encontrado);
                $_logueo_usuario_err = $lang['logueo_error_usuario'];
            } else if ($encontrado) {
                if (is_null($_logueo_password_err)) {  
                    if (!loguear($_valid_usuario, $_valid_password)) {
                        $_logueo_password_err = $lang['logueo_error_password'];
                    } else if ($_valid_usuario === 'admin' && loguear($_valid_usuario, $_valid_password)) {
                        header("Location: admin.php");
                        exit();
                    } else {
                        header("Location: user.php");
                        exit();
                    }
                }
            }
        }
    }
?>