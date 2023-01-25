<?php
    require './assets/php/view.php';

    if (isset($_SESSION['usuario']) && $_SESSION['usuario'] === 'admin') {
        // Estoy en la página principal
        // NO necesito invocar a modelo alguno
        // Cargo la vista por defecto
        $vista = file_get_contents('./mvc/vistas/adminView.php');
        $vista = str_replace('{text_title}', 'Página principal', $vista);
        // 1.- Sustituir cabecera
        $vista = str_replace('{admin_header}', file_get_contents('./assets/html/admin/header.html'), $vista);
        data_replace($vista, './assets/dictionaries/header_noLink.php');

        // 2.- Sustituir body
        $vista = str_replace('{body}', file_get_contents('./assets/html/admin/body.html'), $vista);
        // 3.- Sustituir footer
        $vista = str_replace('{footer}', file_get_contents('./assets/html/admin/footer.html'), $vista);

        $vista = data_replace($vista, './assets/dictionaries/body_main.php');
    } else if (isset($_SESSION['usuario']) && $_SESSION['usuario'] != 'admin') {

    } else {
        // Si no se detecta un usuario en la sesión cargar la vista de logueo
        $vista = file_get_contents('./mvc/vistas/indexView.php');
        // Cambiar <title> de la vista login.php
        $vista = str_replace('{text_title}', 'Log to Batallas', $vista);
        // Cambiar {header} de la vista login.php
        $vista = str_replace('{header}', file_get_contents('./assets/html/user/header.html'), $vista);
        


    }

    print $vista;
?>