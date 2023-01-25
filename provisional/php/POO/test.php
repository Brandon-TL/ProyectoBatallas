<style>
    body {
        background-color: gray;
        color: white;
    }
</style>
<?php
    require_once 'user.php';
    require_once 'db.php';

    $luis = new user(null, '1999-12-01', 'img/foto_perfil/IMG.jpg', 'luis@gmail.com', 'dark', 'es', 'Luisetepete', 'dawdawdaw123');
    // $luis->__set('nombre', 'Luiseta');

    // $luis->registrarUsuario();

   
    abrirConexion();
    $id = 7;

    $conexion->eliminarUsuario($id);

?>