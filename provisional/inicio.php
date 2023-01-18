<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/perfil.css">
    <?php
        include_once './php/funciones.php';
        require_once './php/visual.php';
        
        $datos;
        session_start();
        if (isset($_SESSION["usuario"])) {
            $datos = datosUsuario($_SESSION['usuario']);
        }
    ?>
    <title>Inicio</title>
</head>
<body>
    <div class="tabs">
        <input type="radio" class="tabs__radio" name="slider" id="tab1" checked>
        <label for="tab1" class="tabs__label"><?php echo $lang['inicioPerfil'] ?></label>
        <div class="tabs__content">
            <!-- Contenido para perfil -->
                
        <div>
            <div
                style="background: url(./tabs/<?php echo $datos[2]; ?>);
                        background-position: center;
                        background-size: cover;
                        background-repeat: no-repeat;">
            </div>
            <div class="datos">
                <span><?php echo $_SESSION['usuario']; ?></span><br>
                <span><?php echo $datos[1]; ?></span><br>
                <span><?php echo $datos[3]; ?></span>
                <span><?php echo $datos[0]; ?></span>
            </div>
        </div>

        </div>
        <input type="radio" class="tabs__radio" name="slider" id="tab2">
        <label for="tab2" class="tabs__label"><?php echo $lang['inicioBatalla'] ?></label>
        <div class="tabs__content">
            Batalla
            <!-- Contenido para perfil -->
        </div>
        <input type="radio" class="tabs__radio" name="slider" id="tab3">
        <label for="tab3" class="tabs__label"><?php echo $lang['inicioElemento'] ?></label>
        <div class="tabs__content">
            Batalla
            <!-- Contenido para perfil -->
        </div>
        <input type="radio" class="tabs__radio" name="slider" id="tab4">
        <label for="tab4" class="tabs__label"><?php echo $lang['inicioLogro'] ?></label>
        <div class="tabs__content">
            Batalla
            <!-- Contenido para perfil -->
        </div>
        <input type="radio" class="tabs__radio" name="slider" id="tab5">
        <label for="tab5" class="tabs__label"><?php echo $lang['inicioInstrucciones'] ?></label>
        <div class="tabs__content">
            Batalla
            <!-- Contenido para perfil -->
        </div>
    </div>
    <h1>Estas en inicio</h1>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>