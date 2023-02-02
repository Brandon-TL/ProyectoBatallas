<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require_once './php/logica_user.php';
        session_start();
        if (isset($_SESSION["usuario"])) {
            // cargarPreferencias($_SESSION["usuario"]);
        } else {
            header("Location: index.php");
            exit();
        }
        require_once './php/visual.php';
    ?>
    <link rel="stylesheet" href="./css/user.css">
    <link rel="stylesheet" href="./css/tabs/perfil.css">
    <link rel="stylesheet" href="./css/tabs/creador.css">
    <link rel="stylesheet" href="./css/tabs/como.css">
    <link rel="stylesheet" href="./css/tabs/ajustes.css">
    <title><?php echo $lang['user_title']; ?></title>
</head>
<body>
    <header>
        <nav class="tabs">
            <label for="perfil" class="tabs__label"><?php echo $lang['user_tab_perfil_title'] ?></label>
            <label for="batallas" class="tabs__label active"><?php echo $lang['user_tab_batallas_title'] ?></label>
            <label for="creador" class="tabs__label"><?php echo $lang['user_tab_creador_title'] ?></label>
            <label for="logros" class="tabs__label"><?php echo $lang['user_tab_logros_title'] ?></label>
            <label for="como" class="tabs__label"><?php echo $lang['user_tab_como_title'] ?></label>
        </nav>
        <div class="selectors">
            <div class="dropdown" title="Select language">
                <button><?php echo $lang['selected_lang']; ?></button>
                <ul>
                    <li><a href="user.php?lang=en"><?php echo $lang['lang_en'] ?></a></li>
                    <hr style="border-color: #000;">
                    <li><a href="user.php?lang=es"><?php echo $lang['lang_es'] ?></a></li>
                </ul>
            </div>
            <form action="" method="POST" class="theme-form">
                <button name="tema" value="dark" class="dark"><ion-icon name="moon-outline"></ion-icon></button>
                <button name="tema" value="light" class="light"><ion-icon name="sunny-outline"></ion-icon></button>
            </form>
            <button class="settings"><label for="ajustes"><ion-icon name="settings-outline"></ion-icon></label></button>
        </div>
    </header>
    <input type="radio" class="tabs__radio" name="slider" id="perfil">
    <input type="radio" class="tabs__radio" name="slider" id="batallas" checked>
    <input type="radio" class="tabs__radio" name="slider" id="creador">
    <input type="radio" class="tabs__radio" name="slider" id="logros">
    <input type="radio" class="tabs__radio" name="slider" id="como">
    <input type="radio" class="tabs__radio" name="slider" id="ajustes">
    <section>
        <div class="tab__1 tabs__content"><?php require_once ('./tabs/perfil.php') ?></div>
        <div class="tab__2 tabs__content"><?php require_once ('./tabs/batallas.php') ?></div>
        <div class="tab__3 tabs__content"><?php require_once ('./tabs/creador.php') ?></div>
        <div class="tab__4 tabs__content"><?php require_once ('./tabs/logros.php') ?></div>
        <div class="tab__5 tabs__content"><?php require_once ('./tabs/faq.php') ?></div>
        <div class="tab__6 tabs__content"><?php require_once ('./tabs/ajustes.php') ?></div>
    </section>
    <footer>
        <p><?php echo $lang['footer_text']; ?> <a target="_blank" href="https://www.instagram.com/_time_leaper_/?hl=es">Brandon Martínez</a> & <a target="_blank" href="https://www.instagram.com/_luisetee__/?hl=es">Luis Sánchez</a></p>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="./js/user.js"></script>
</body>
</html>