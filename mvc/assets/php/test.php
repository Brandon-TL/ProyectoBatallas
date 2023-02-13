<?php
    require_once 'funciones.php';
    require_once 'logica_user.php';
    require_once 'logica_index.php';

    $id = eliminarUsuarioBD('Luiseta');
    echo $id;