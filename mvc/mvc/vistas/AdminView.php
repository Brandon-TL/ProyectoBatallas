<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/user.css">
    <?php
        require_once '../../assets/php/funciones.php';
        require_once '../../assets/php/visual.php';
    ?>
    <title>Inicio</title>
</head>
<body>
    <header>
        <nav class="tabs">
            <label for="tab88" class="tabs__label">Denuncias</label>
            <label for="tab87" class="tabs__label">Usuarios</label>
            <label for="tab2" class="tabs__label">{inicioBatalla}</label>
            <label for="tab3" class="tabs__label">{inicioElemento}</label>
        </nav>
        <div class="selectors">
            <div class="dropdown" title="Select language">
                <button><?php echo $lang['selected_lang']; ?></button>
                <ul>
                    <li><a href="AdminView.php?lang=en"><?php echo $lang['lang_en'] ?></a></li>
                    <hr style="border-color: #000;">
                    <li><a href="AdminView.php?lang=es"><?php echo $lang['lang_es'] ?></a></li>
                </ul>
            </div>
            <form action="" method="POST" class="theme-form">
                <button name="tema" value="dark" class="dark"><ion-icon name="moon-outline"></ion-icon></button>
                <button name="tema" value="light" class="light"><ion-icon name="sunny-outline"></ion-icon></button>
            </form>
            <button class="settings"><label for="ajustes"><ion-icon name="settings-outline"></ion-icon></label></button>
        </div>
    </header>
    <div class="tabs">
        <!-- |||||||||| CONTENIDO TAB DENUNCIAS |||||||||| -->
        <input type="radio" class="tabs__radio" name="slider" id="tab88" checked>
        <label for="tab88" class="tabs__label">Denuncias</label>
        <div class="tabs__content">
            TAB DENUNCIAS
        </div>
        <!-- |||||||||| CONTENIDO TAB USUARIOS |||||||||| -->
        <input type="radio" class="tabs__radio" name="slider" id="tab87" >
        <label for="tab87" class="tabs__label">Usuarios</label>
        <div class="tabs__content">
            TAB DE USUARIOS
            <?php
                // $usuarios = selectBD(array('*'), 'usuario', 'rol', 'usuario');
                // var_dump($usuarios);
                // foreach ($usuarios as $user) {
                //     //    echo $user['fechanacimiento']."<br>".$user['fechanacimiento']."<br>".$user['fechanacimiento']."<br>"; 
                // }
            ?>
        </div>
        <!-- |||||||||| CONTENIDO TAB BATALLAS |||||||||| -->
        <input type="radio" class="tabs__radio" name="slider" id="tab2">
        <div class="tabs__content">
            TAB BATALLAS
            <?php
                // require('./php/visual.php');

                // include_once('./php/funciones.php');

                // $datos = obtenerBatallas(false);
                // echo "<div class='contentBatallas'>" . formatoBatallas($datos) . "</div>";
                // votar(2, 2, 3);

            ?>
        </div>
        <!-- |||||||||| CONTENIDO TAB ELEMENTOS |||||||||| -->
        <input type="radio" class="tabs__radio" name="slider" id="tab3">
        <div class="tabs__content">
            TAB ELEMENTOS
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="../../assets/js/user.js"></script>
</body>
</html>