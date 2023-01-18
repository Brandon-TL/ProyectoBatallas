<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require_once './php/visual.php';
        if (isset($_SESSION["usuario"])) {
            header("Location: perfil.php");
            exit();
        }
    ?>
    <title>Inicio</title>
</head>
<body>
    <!-- comit -->
    <header>
        <ul>
            <li><?php echo $lang['inicioPerfil']?></li>
            <li><?php echo $lang['inicioBatalla']?></li>
            <li><?php echo $lang['inicioElemento']?></li>
            <li><?php echo $lang['inicioLogro']?></li>
            <li><?php echo $lang['inicioInstrucciones']?></li>
        </ul>
    </header>
    <h1>Estas en inicio</h1>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>