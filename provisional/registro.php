<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require_once './php/visual.php';
        session_start();
        if (isset($_SESSION["usuario"])) {
            header("Location: perfil.php");
            exit();
        }
    ?>
    <title><?php echo $lang['registro_title'] ?></title>
</head>
<body>
    <?php
        require_once 'php/funciones.php';
        require_once 'php/logica_registro.php';
    ?>
    <header>
        <div class="selectors">
            <div class="dropdown" title="Select language">
                <button><?php echo $lang['selected_lang']; ?></button>
                <ul>
                    <li><a href="registro.php?lang=en"><div class="flag en"></div><?php echo $lang['lang_en'] ?></a></li>
                    <li><a href="registro.php?lang=es"><div class="flag es"></div><?php echo $lang['lang_es'] ?></a></li>
                </ul>
            </div>
            <form action="" method="POST" class="theme-form">
                <button name="tema" value="dark" class="dark"><ion-icon name="moon-outline"></ion-icon></button>
                <button name="tema" value="light" class="light"><ion-icon name="sunny-outline"></ion-icon></button>
            </form>
        </div>
    </header>
    <h1><?php echo $lang['registro_h1'] ?></h1>
    <form action="" method="post" class="containerForm pre" enctype="multipart/form-data">
        <div>
            <input type="text" name="usuario" value="<?php echo $_usuario;?>" placeholder="<?php echo $lang['registro_label_nombre']; ?>">
            <?php if (isset($_usuario_err)) echo $_usuario_err; ?>
        </div>

        <div>
            <input type="password" name="password" value="<?php echo $_password; ?>" placeholder="<?php echo $lang['registro_label_password']; ?>">
            <?php if (isset($_password_err)) echo $_password_err; ?>
        </div>

        <div>
            <input type="password" name="password2" value="<?php echo $_password; ?>" placeholder="<?php echo $lang['registro_label_password2']; ?>">
            <?php if (isset($_password2_err)) echo $_password2_err; ?>
        </div>
        
        <div>
            <input type="email" name="email" value="<?php echo $_email; ?>" placeholder="<?php echo $lang['registro_label_email']; ?>">
            <?php if (isset($_email_err)) echo $_email_err; ?>
        </div>
        
        <div>
            <input type="text" name="fecha" value="<?php echo $_fecha; ?>" placeholder="<?php echo $lang['registro_label_fecha']; ?>" onfocus="(this.type='date')">
            <?php if (isset($_fecha_err)) echo $_fecha_err; ?>
        </div>
        
        <div>
            <input type="file" name="avatar" accept="image/png, image/jpeg, image/jpg" value="<?php echo $_avatar; ?>" placeholder="dwe">
            <?php if (isset($_avatar_err)) echo $_avatar_err; ?>
        </div>
        
        <input type="button" value="<?php echo $lang['registro_boton_volver']; ?>" onclick="window.location.href='index.php'">
        
        <input type="submit" name="REGISTRARSE" value="<?php echo $lang['registro_boton_entrar']; ?>">
    </form>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>