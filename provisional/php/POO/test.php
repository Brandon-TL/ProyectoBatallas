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
    echo $luis->nombre;
    echo '<br><br>';
    
    $luis->__set('nombre', 'Luiseta');
    echo $luis->nombre;
    echo '<br><br>';
    
    $email = $luis->__get('email');
    echo $email;
    echo '<br><br>';
    
    $conexion = new db();
    $conexion->registrarUsuario($luis);
?>