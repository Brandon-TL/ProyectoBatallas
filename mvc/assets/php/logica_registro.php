<?php
    $_usuario = $_password = $_email = $_fecha = $_avatar =   NULL;

    $_usuario_err = $_password_err = $_password2_err = $_email_err = $_fecha_err = $_avatar_err = NULL;
    $_registro = NULL;

    if (isset($_POST['REGISTRARSE'])) {
        $v1 = htmlspecialchars($_POST["usuario"]);
        $v2 = htmlspecialchars($_POST["password"]);
        $v3 = htmlspecialchars($_POST["password2"]);
        $v4 = htmlspecialchars($_POST["email"]);
        $v5 = htmlspecialchars($_POST["fecha"]);
        $avatar = $_FILES['avatar']['name'];

        if (empty(trim($v1))) {
            $_usuario_err = $lang['registro_vacio_usuario'];
        } else {
            if (!validar($v1, VALID_USER)) {
                $_usuario_err = $lang['registro_error_usuario'];
            } else {
                $_usuario = $v1;
            }
        }

        if (empty(($v2))) {
            $_password_err = $lang['registro_vacio_password'];
        } else {
            if (!validar($v2, VALID_PASSWORD)) {
                $_password_err = $lang['registro_error_password'];
            } else {
                if (empty(($v3))) {
                    $_password2_err = $lang['registro_vacio_password'];
                } else {
                    if ($v3 === $v2) {
                        $_password = $v2;
                    } else {
                        $_password2_err = $lang['registro_error_match'];
                        $_password_err = $lang['registro_error_match'];
                    }
                }
            }
        }

        if (empty(trim($v4))) {
            $_email_err = $lang['registro_vacio_email'];
        } else {
            if (!validar($v4, VALID_EMAIL)) {
                $_email_err = $lang['registro_error_email'];
            } else {
                $_email = $v4;
            }
        }

        if (empty(trim($v5))) {
            $_fecha_err = $lang['registro_vacio_fecha'];
        } else {
            if (!validar($v5, VALID_DATE)) {
                $_fecha_err = $lang['registro_error_fecha'];
            } else {
                if (!validar_edad($v5)) {
                    $_fecha_err = $lang['registro_error_edad'];
                } else {
                    $_fecha = $v5;
                }
            }
        }

        $nombre = $_FILES['avatar']['name'];
        $size = $_FILES['avatar']['size'];
        $tipo = $_FILES['avatar']['type'];
        $rutaTemporal = $_FILES['avatar']['tmp_name'];

        if (isset($nombre) && $nombre != "") {
            if ($tipo == "image/jpg" || $tipo == "image/jpeg" || $tipo == "image/png") {
                move_uploaded_file($rutaTemporal, "./img/".$nombre);
                if ($size > SIZE_MB) {
                    $_avatar_err = $lang['registro_error_max'];
                } else {
                    $_avatar = "img/".$nombre;
                }
            } else {
                $_avatar_err = $lang['registro_error_extension'];
            }
        } else {
            $_avatar_err = $lang['registro_vacio_foto'];
        }

        $_rol = 'usuario';
        $USER = array($_fecha, $_avatar, $_email, $_COOKIE['tema'], $_COOKIE['lang'], $_rol, $_usuario, $_password);

        if (!is_null($_usuario) && !is_null($_password) && !is_null($_email) && !is_null($_fecha) && !is_null($_avatar)) {
            $return = registrarUsuarioBD($USER);
            if ($return == 'usuario') {
                $_usuario_err = $lang['registro_existing_usuario'];
            } else if ($return == 'email') {
                $_email_err = $lang['registro_existing_email'];
            } else {
                if (loguear($_usuario, $_password)) {
                    header("Location: inicio.php");
                    exit();
                } else {
                    echo $lang['registro_failed_new_login'];
                }
            }
        }
    }
?>