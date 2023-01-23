<?php
    require_once './php/funciones.php';

    /**
     * Función para obtener datos de la tabla de usuarios
     * @param string:user nombre del usuario del que requieren sus datos
     * 
     * @return object:array conjunto de datos del usuario
     */
    function datos_de_usuario ($user)
    {
        $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);
        $conexion->beginTransaction();
    
        $id = selectBD(array("id_usuario"), "usuario_credencial", "nombreusuario", $user)[0];
        return selectBD(array("*"), "usuario", "id", $id);
    };
?>