<?php
    require './assets/php/view.php';

    if (!isset($_GET) || isset($_GET) and empty($_GET)) {
        // Estoy en la página principal
        // NO necesito invocar a modelo alguno
        // Cargo la vista por defecto
        $vista = file_get_contents('./mvc/vistas/generalView.php');
        $vista = str_replace('{text_title}', 'Página principal', $vista);
        // 1.- Sustituir cabecera
        $vista = str_replace('{header}', file_get_contents('./assets/html/header.html'), $vista);
        data_replace($vista, './assets/dictionaries/header_noLink.php');

        // 2.- Sustituir body
        $vista = str_replace('{body}', file_get_contents('./assets/html/body_main.html'), $vista);
        // 3.- Sustituir footer
        $vista = str_replace('{footer}', file_get_contents('./assets/html/footer.html'), $vista);

        $vista = data_replace($vista, './assets/dictionaries/body_main.php');
    } else {
        // Compruebo que acción está ejecutando el usuario
        if (isset($_GET['crear'])) {
            switch (htmlspecialchars($_GET['crear'])) {
                case 'pagina':
                        // Invocar al modelo Persona
                        // Llamar a la vista que me carge un formulario de creación de objeto persona
                    break;
                case 'inventario':
                        // Invocar al modelo Inventario
                        // Llamar a la vista que me carge un formulario de creación de objeto inventario
                    break;
                case 'producto':
                        // Invocar al modelo Producto
                        // Llamar 
                    break;
                default:

                    break;
            }
        } else {
            if (isset($_GET['mostrar'])) {
                switch (htmlspecialchars($_GET['mostrar'])) {
                    case 'pagina':
                            // Invocar al modelo Persona
                            // Llamar a la vista que me carge un formulario de creación de objeto persona
                        break;
                    case 'inventario':
                            // Invocar al modelo Inventario
                            // Llamar a la vista que me carge un formulario de creación de objeto inventario
                        break;
                    case 'producto':
                            // Invocar al modelo Producto
                            // Llamar 
                        break;
                    default:
    
                        break;
                }
            }
        }
    }

    print $vista;
?>