<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/perfil.css">
    <?php
        require_once './php/funciones.php';
        require_once './php/visual.php';
    ?>
    <title>Inicio</title>
</head>
<body>
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
        <label for="tab2" class="tabs__label"><?php echo $lang['inicioBatalla'] ?></label>
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
        <label for="tab3" class="tabs__label"><?php echo $lang['inicioElemento'] ?></label>
        <div class="tabs__content">
            TAB ELEMENTOS
        </div>
    </div>
</body>
</html>