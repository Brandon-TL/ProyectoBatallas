<style>
    body {
        background-color: gray;
        color: white;
    }
</style>
<?php
    require_once 'user.php';
    require_once 'db.php';

    $luis = new user('', 'Luisetepete', 'luis@gmail.com', 'img/luis.jpg', 'dark', 'es', 'dawdawdaw123');
    $luis->__set('nombre', 'Luiseta');

    $conexion = new db;
    $conexion->registrarUsuario($luis);
?>