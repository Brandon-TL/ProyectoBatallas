<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <?php
        require_once './php/visual.php';
        if (isset($_SESSION["usuario"])) {
            header("Location: perfil.php");
            exit();
        }
    ?>
    <title><?php echo $lang['index_title'] ?></title>
</head>
    <?php
        require_once './php/funciones.php';
        require_once './php/logica_index.php';
    ?>
    <header>
        <div class="selectors">
            <div class="dropdown" title="Select language">
                <button><?php echo $lang['selected_lang']; ?></button>
                <ul>
                    <li><a href="index.php?lang=en"><div class="flag en"></div><?php echo $lang['lang_en'] ?></a></li>
                    <li><a href="index.php?lang=es"><div class="flag es"></div><?php echo $lang['lang_es'] ?></a></li>
                </ul>
            </div>
            <form action="" method="POST" class="theme-form">
                <button name="tema" value="dark" class="dark"><ion-icon name="moon-outline"></ion-icon></button>
                <button name="tema" value="light" class="light"><ion-icon name="sunny-outline"></ion-icon></button>
            </form>
        </div>
    </header>
    <h1><?php echo $lang['index_h1'] ?></h1>
    <form action="" method="post" class="containerForm pre" enctype="multipart/form-data">
        <div>
            <input type="text" name="usuario" placeholder="<?php echo $lang['index_label_nombre'] ?>" value="<?php  if (isset($_valid_usuario)) echo $_valid_usuario ?>">
            <?php if (isset($_usuario_err)) echo $_usuario_err; ?>
        </div>

        <div>
            <input type="password" name="password" placeholder="<?php echo $lang['index_label_password'] ?>">
            <?php if (isset($_password_err)) echo $_password_err; ?>
        </div>

        <a href="registro.php"><?php echo $lang['index_pregunta'] ?></a><br>
        <input type="submit" name="ENTRAR" value="<?php echo $lang['index_boton_entrar'] ?>" class="loginButton btn">
    </form>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>