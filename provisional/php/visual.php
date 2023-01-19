<?php
    // Cambiar idioma
    if(!isset($_COOKIE["lang"]) && !isset($_GET["lang"])) {
        setcookie("lang", "en", time()+60*60*24*30);
        require_once "dictionaries/en.php";
    } else if (isset($_GET['lang'])) {
        setcookie("lang", $_GET['lang'], time()+60*60*24*30);
        header("Location: ".$_SERVER['PHP_SELF']);
        require_once "dictionaries/".$_COOKIE['lang'].".php";
    } else {
        // Solicitar datos del idioma seleccionado
        require_once "dictionaries/".$_COOKIE['lang'].".php";
    }
	
    // Cambiar tema
    $link_css = 'dark';

    if(!isset($_COOKIE["tema"]) && !isset($_POST["tema"])) {
        setcookie("tema", "dark", time()+60*60*24*30);
        $link_css = 'dark';
    } else if (isset($_POST['tema'])) {
        setcookie("tema", $_POST['tema'], time()+60*60*24*30);
        $link_css = $_COOKIE['tema'];
        header("Location: ".$_SERVER['PHP_SELF']);
    } else if (isset($_COOKIE['tema'])) {
        $link_css = $_COOKIE['tema'];
    }

    // Imprimir etiqueta html con link css seleccionado
    echo '<link rel="stylesheet" href="./css/'.$link_css.'.css">';
?>