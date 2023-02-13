<?php
    session_start();
    if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] != 'admin') {
        header("Location: ./mvc/vistas/UserView.php");
        exit();
    } else if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] == 'admin') {
        header("Location: ./mvc/vistas/AdminView.php");
        exit();
    } else {
        header("Location: ./mvc/vistas/IndexView.php");
        exit();
    }
?>