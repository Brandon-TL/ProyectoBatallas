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
    <title><?php echo $lang['registroTitle'] ?></title>
</head>
<body>
    <?php
        require_once 'php/funciones.php';
        require_once 'php/logica_registro.php';
    ?>
    <header>
        <div class="selectors">
            <div class="dropdown" title="Select language">
                <button><?php echo $lang['selectLang']; ?></button>
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
    <form action="" method="post" class="containerForm pre" enctype="multipart/form-data">
        <div>
            <label for="usuario">Nombre de usuario</label>
            <input type="text" name="usuario" value="<?php echo $_usuario;?>">
            <?php echo $_usuario_err; ?>
        </div>

        <div>
            <label for="password">Contraseña</label>
            <input type="password" name="password" value="<?php echo $_password; ?>">
            <?php echo $_password_err; ?>
        </div>

        <div>
            <label for="password2">Repita su contraseña</label>
            <input type="password" name="password2" value="<?php echo $_password; ?>">
            <?php echo $_password2_err; ?>
        </div>
        
        <div>
            <label for="email">E-mail</label>
            <input type="email" name="email" value="<?php echo $_email; ?>">
            <?php echo $_email_err; ?>
        </div>
        
        <div>
            <label for="fecha">Fecha de nacimiento</label>
            <input type="date" name="fecha" value="<?php echo $_fecha; ?>">
            <?php echo $_fecha_err; ?>
        </div>
        
        <div>
            <label for="avatar">Foto de perfil</label>
            <input type="file" name="avatar" accept="image/png, image/jpeg, image/jpg" value="<?php echo $_avatar; ?>">
            <?php echo $_avatar_err; ?>
        </div>
        
        <input type="button" value="VOLVER" class="registroButton btn" onclick="window.location.href='index.php'">
        
        <input type="submit" name="REGISTRARSE" value="REGISTRARSE" class="registroButton btn" />
    </form>
</body>
</html>