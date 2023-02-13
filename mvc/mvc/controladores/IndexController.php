<?php
    session_start();
    if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] != 'admin') {
        header("Location: ../vistas/UserView.php");
        exit();
    } else if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] == 'admin') {
        header("Location: ../vistas/AdminView.php");
        exit();
    } else {
        header("Location: ../vistas/IndexView.php");
        exit();
    }
?>