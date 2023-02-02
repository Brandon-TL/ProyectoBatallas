<?php
    require_once 'funciones.php';

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
                    if ($_valid_usuario === 'admin' && comprobarCredenciales($_valid_usuario, $_valid_password)) {
                        header("Location: admin.php");
                        exit();
                    } else if (comprobarCredenciales($_valid_usuario, $_valid_password)) {
                        $_SESSION['usuario'] = $_valid_usuario;
                        header("Location: user.php");
                        exit();
                    } else {
                        $_logueo_password_err = $lang['logueo_error_password'];
                    }
                }
            }
        }
    } else if (isset($_POST['REGISTRARSE'])) {

        $_usuario = $_password = $_email = $_fecha = $_avatar =   NULL;

        $_registro_usuario_err = $_registro_password_err = $_registro_password2_err = $_registro_email_err = $_registro_fecha_err = $_registro_avatar_err = NULL;

        $v1 = htmlspecialchars($_POST["usuario"]);
        $v2 = htmlspecialchars($_POST["password"]);
        $v3 = htmlspecialchars($_POST["password2"]);
        $v4 = htmlspecialchars($_POST["email"]);
        $v5 = htmlspecialchars($_POST["fecha"]);
        $avatar = $_FILES['avatar']['name'];
        $nombre = $_FILES['avatar']['name'];
        $size = $_FILES['avatar']['size'];
        $tipo = $_FILES['avatar']['type'];
        $rutaTemporal = $_FILES['avatar']['tmp_name'];

        // Validación nuevo nombre
        if (empty(trim($v1))) {
            $_registro_usuario_err = $lang['registro_vacio_usuario'];
        } else {
            if (!validar($v1, VALID_USER)) {
                $_registro_usuario_err = $lang['registro_error_usuario'];
            } else {
                $_usuario = $v1;
            }
        }

        // Validación nueva contraseña
        if (empty(trim($v2))) {
            $_registro_password_err = $lang['registro_vacio_password'];
        } else {
            if (!validar($v2, VALID_PASSWORD)) {
                $_registro_password_err = $lang['registro_error_password'];
            } else {
                if (empty(($v3))) {
                    $_registro_password2_err = $lang['registro_vacio_password'];
                } else {
                    if ($v3 === $v2) {
                        $_password = $v2;
                    } else {
                        $_registro_password2_err = $lang['registro_error_match'];
                        $_registro_password_err = $lang['registro_error_match'];
                    }
                }
            }
        }

        // Validación nuevo email
        if (empty(trim($v4))) {
            $_registro_email_err = $lang['registro_vacio_email'];
        } else {
            if (!validar($v4, VALID_EMAIL)) {
                $_registro_email_err = $lang['registro_error_email'];
            } else {
                $_email = $v4;
            }
        }

        // Validación nueva fecha
        if (empty(trim($v5))) {
            $_registro_fecha_err = $lang['registro_vacio_fecha'];
        } else {
            if (!validar($v5, VALID_DATE)) {
                $_registro_fecha_err = $lang['registro_error_fecha'];
            } else {
                if (!validar_edad($v5)) {
                    $_registro_fecha_err = $lang['registro_error_edad'];
                } else {
                    $_fecha = $v5;
                }
            }
        }

        // Validación nueva foto de perfil
        if (isset($nombre) && $nombre != "") {
            if ($tipo == "image/jpg" || $tipo == "image/jpeg" || $tipo == "image/png") {
                if ($size <= SIZE_MB) {
                    move_uploaded_file($rutaTemporal, $nombre);
                    $_avatar = $nombre;
                } else {
                    $_registro_avatar_err = $lang['registro_error_max'];
                }
            } else {
                $_registro_avatar_err = $lang['registro_error_extension'];
            }
        } else {
            $_registro_avatar_err = $lang['registro_vacio_foto'];
        }
        
        // Creación del array con datos del usuario
        $USER = array($_fecha, $_avatar, $_email, $_COOKIE['tema'], $_COOKIE['lang'], 'usuario', $_usuario, $_password);

        // Registro de nuevo usuario (simpre que ninguno de los campos este vacío)
        if (!is_null($_usuario) && !is_null($_password) && !is_null($_email) && !is_null($_fecha) && !is_null($_avatar)) {
            $return = registrarUsuarioBD($USER);
            if ($return == 'usuario') {
                // Nombre de usuario ya en uso
                $_registro_usuario_err = $lang['registro_existing_usuario'];
            } else if ($return == 'email') {
                // Email de usuario ya en uso
                $_registro_email_err = $lang['registro_existing_email'];
            } else {
                // Si se registra correctamente, loguea al nuevo usuario
                if (comprobarCredenciales($_usuario, $_password)) {
                    header("Location: user.php");
                    exit();
                } else {
                    echo $lang['registro_failed_new_login'];
                }
            }
        }
    }
?>