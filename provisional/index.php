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
        require_once './php/logica_registro.php';
    ?>
    <!-- <header>
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
    </header> -->
    <h2><?php echo $lang['index_h2'] ?></h2>
    <div class="container" id="container">
        <!-- Sección logueo -->
        <div class="form-container sign-in-container">
            <form action="" method="post" enctype="multipart/form-data">
                <h1><?php echo $lang['logueo_h1'] ?></h1>
                <input type="text" name="usuario" placeholder="<?php echo $lang['logueo_label_nombre'] ?>" value="<?php  if (isset($_valid_usuario)) echo $_valid_usuario ?>">
                <?php if (isset($_usuario_err)) echo $_usuario_err; ?>

                <input type="password" name="password" placeholder="<?php echo $lang['logueo_label_password'] ?>">
                <?php if (isset($_password_err)) echo $_password_err; ?>

                <input type="submit" name="ENTRAR" value="<?php echo $lang['logueo_boton_entrar'] ?>" class="loginButton btn">
            </form>
        </div>
        <!-- Sección registro -->
        <div class="form-container sign-up-container">
            <form action="" method="post" enctype="multipart/form-data">
                <h1><?php echo $lang['registro_h1'] ?></h1>
                <input type="text" name="usuario" value="<?php if (isset($_usuario)) echo $_usuario;?>" placeholder="<?php echo $lang['registro_label_nombre']; ?>">
                <?php if (isset($_usuario_err)) echo $_usuario_err; ?>
                
                <input type="password" name="password" value="<?php if (isset($_password)) echo $_password; ?>" placeholder="<?php echo $lang['registro_label_password']; ?>">
                <?php if (isset($_password_err)) echo $_password_err; ?>
                
                <input type="password" name="password2" value="<?php if (isset($_password)) echo $_password; ?>" placeholder="<?php echo $lang['registro_label_password2']; ?>">
                <?php if (isset($_password2_err)) echo $_password2_err; ?>
                
                <input type="email" name="email" value="<?php if (isset($_email)) echo $_email; ?>" placeholder="<?php echo $lang['registro_label_email']; ?>">
                <?php if (isset($_email_err)) echo $_email_err; ?>
                
                <input type="text" name="fecha" value="<?php if (isset($_fecha)) echo $_fecha; ?>" placeholder="<?php echo $lang['registro_label_fecha']; ?>" onfocus="(this.type='date')">
                <?php if (isset($_fecha_err)) echo $_fecha_err; ?>
                    
                <input type="file" name="avatar" accept="image/png, image/jpeg, image/jpg" value="<?php if (isset($_)) echo $_avatar; ?>" placeholder="dwe">
                <?php if (isset($_avatar_err)) echo $_avatar_err; ?>
                
                <input type="submit" name="REGISTRARSE" value="<?php echo $lang['registro_boton_entrar']; ?>">
            </form>
        </div>
        <!-- Sección naranja -->
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1><?php echo $lang['registro_cambio_h1'] ?></h1>
                    <p><?php echo $lang['registro_cambio_text'] ?></p>
                    <button class="ghost" id="signIn"><?php echo $lang['registro_cambio_logueo'] ?></button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1><?php echo $lang['logueo_cambio_h1'] ?></h1>
                    <p><?php echo $lang['logueo_cambio_text'] ?></p>
                    <button class="ghost" id="signUp"><?php echo $lang['logueo_cambio_registro'] ?></button>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p><?php echo $lang['index_copyright_text']; ?> <a target="_blank" href="https://www.instagram.com/_time_leaper_/?hl=es">Brandon Martínez</a> & <a target="_blank" href="https://www.instagram.com/_luisetee__/?hl=es">Luis Sánchez</a></p>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="./js/index.js"></script>
</body>
</html>