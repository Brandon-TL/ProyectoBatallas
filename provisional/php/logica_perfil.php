<?php
    require_once './php/funciones.php';

    /**
     * Función para obtener datos de la tabla de usuarios
     * @param string:user nombre del usuario del que requieren sus datos
     * 
     * @return object:array conjunto de datos del usuario
     */
    function datos_de_usuario ($user) {
        $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);
        $conexion->beginTransaction();
    
        $id = selectBD(array("id_usuario"), "usuario_credencial", "nombreusuario", $user)[0];
        return selectBD(array("*"), "usuario", "id", $id);
    }

    /**
     * Función para obtener los datos del los elementos
     * @param string:id_elemento id del elemento cuyos datos se solicitan
     * 
     * @return array de dos posicines, array[0] = nombre del elemento, array[1] = ruta de la imagen
     */
    function datosElemento($id_elemento) {
        $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);
        // Obtener los datos de los elementos
        $datoNombre = selectBD(array('nombre'), 'elemento', 'id', $id_elemento);
        $datoFoto = selectBD(array('foto'), 'elemento', 'id', $id_elemento);

        return array(strtoupper($datoNombre[0]), $datoFoto[0]);
    }

    /**
     * Función para obtener los datos sobre las batallas
     * @param true:creadas solo batallas creadas por el usuario
     * @param false:creadas solo batallas que el usuario no ha creado
     * 
     * @return array:datos de las batallas solicitadas
     */
    function obtenerBatallas($creadas) {
        $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);

        // Obetener el id del usuario que ha iniciado sesión
        $id_usuario = selectBD(array('id_usuario'), 'usuario_credencial', 'nombreusuario', $_SESSION['usuario'])[0];
        // var_dump($id_usuario);
        // Como solo es un array de una posición se puede guardar en una variable string, para un uso más fácil
        // $id_usuario = $id_usuario[0];

        // Obtener todas las batallas creadas por el usuario que ha iniciado sesión
        $batallasDeUsuario = selectBD(array('id_batalla'), 'usuario_batalla', 'id_usuario', $id_usuario);
        // var_dump($batallasDeUsuario);

        // Obtener todas las batallas existentes y filtrar a un array solo las que no ha creado el usuario en cuestión
        $sql = "SELECT * FROM `batalla_elemento`;";
        $resultBatalla = $conexion->query($sql);

        $datos = array();
        // Para cada uno de los id's de batallas creadas por el usuario logeado
        for ($i = 0; $i < count($batallasDeUsuario); $i++) {
            // Comparar con el id de cada batalla obtenida en el resultado del fetch() $tupla[0]
            while ($tupla = $resultBatalla->fetch()) {
                if ($creadas) {
                    // Si el id de la batalla creada por el usuario coincide con de el la batalla obtenida en el fetch()
                    if ($batallasDeUsuario[$i] == $tupla[0]) {
                        // Se añade la información de la batalla al array $datos
                        $datos[count($datos)] = $tupla;
                    }
                    // Si los id's no coinciden, continuar...
                } else {
                    // Si el id de la batalla creada por el usuario es distinto al de la batalla obtenida en el fetch()
                    if ($batallasDeUsuario[$i] != $tupla[0]) {
                        // Se añade la información de la batalla al array $datos
                        $datos[count($datos)] = $tupla;
                    }
                    // Si los id's coinciden, continuar...
                }
            }
        }

        // Devolver todas las batallas que no han sido creadas por el usuario logeado
        return $datos;
    }
    
    /**
     * Función para obtener los datos sobre las batallas filtradas por el usuario logueado
     * @param ignorar:filtro solo batallas ignoradas por el usuario
     * @param denunciar:filtro solo batallas denunciadas el usuario no ha creado
     * 
     * @return array:ids especificos de las batallas solicitadas
     */
    function ignoradas_o_denunciadas ($filtro) {
        $filtro = trim($filtro);
        
        if ($filtro === 'ignorar' || $filtro === 'denunciar') {   
            $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);

            // Obetener el id del usuario que ha iniciado sesión
            $id_usuario = selectBD(array('id_usuario'), 'usuario_credencial', 'nombreusuario', $_SESSION['usuario'])[0];
            echo 'id de usuario = ' . $id_usuario. '<br><br>';

            if ($filtro === 'ignorar') {
                // Obtener todas las batallas ignoradas por el usuario que ha iniciado sesión
                $batallas = selectBD(array('*'), 'usuario_batalla', 'accion', 'ignorar');
                var_dump($batallas);
                echo '<br><br>';
                foreach ($batallas as $key => $value) {
                    if (!is_numeric($key)) {
                        echo $key. ' = '. $value. '<br><br>';
                        if ($key == 'id_usuario' && $value == $id_usuario) {
                            echo $key. ' = '. $value. '<br><br>';
                        }
                    }
                }
            } else if ($filtro === 'denunciar') {
                // Obtener todas las batallas ignoradas por el usuario que ha iniciado sesión
                $batallas = selectBD(array('*'), 'usuario_batalla', 'accion', 'denunciar');
                var_dump($batallas);
                echo '<br><br>';
                foreach ($batallas as $key => $value) {
                    if (!is_numeric($key)) {
                        echo $key. ' = '. $value. '<br><br>';
                        if ($key == 'id_usuario' && $value == $id_usuario) {
                            echo $key. ' = '. $value. '<br><br>';
                        }
                    }
                }
            }
        }
    }

    /**
     * Función para crear etiquetas especificas y mostrar batallas por pantalla y facilitando dar estilos css y clases
     * @param array:datos 
     * @return string:html de la información de todas las batallas con clases especificas para cada elemento y batalla
     *                      incluye php para la funcionalidad de votos
     */
    function formatoBatallas($datos) {
        $html = '';
        $id_votante = datosUsuario($_SESSION['usuario'])[0];
        foreach ($datos as $tupla) {
            $id_elemento1 = $tupla[1];
            $id_elemento2 = $tupla[2];
            $E1 = datosElemento($tupla[1]);
            $E2 = datosElemento($tupla[2]);

            $id_usuario = selectBD(array('id_usuario'), 'usuario_batalla', 'id_batalla', $tupla[0]);
            // $nombre_creador = selectBD(array('nombreusuario'), 'usuario_credencial', 'id_usuario', $id_usuario[0]);

            $id_batalla = selectBD(array('id_batalla'), 'batalla_elemento', 'id_elemento1', $tupla[1])[0];
            // echo $id_elemento1.' vs '.$id_elemento2.' en batalla '.$id_batalla;

            
            $html .= "<div>Batalla ($tupla[0]): $E1[0] vs $E2[0]<br>
                        $E1[1]<br>$E2[1]<br>
                        <button><span>VOTAR $E1[0]</span></button>
                        <button><span>VOTAR $E2[0]</span></button>
                        </div><br>";
        }
        /**
         *  onclick='votar($id_usuario, $id_batalla, $id_elemento1)';
         *  onclick='votar($id_usuario, $id_batalla, $id_elemento2)';
         */

        return $html;
    }

    /**
     * Funcion para la votación de elementos
     * @param string:id_elemento id del elemento que se desea votar
     * @param string:id_batalla id de la batalla en la que se encuentra el elemento
     * 
     * @return true:execute_sql_query+text si se han encontrado los elementos solicitados, se ejecuta comando sql para 
     *                           registrar la votación en la base de datos y se indica que se ha terminado la ejecución con éxito
     * @return false:error texto indicativo de porque no se ha registrado el voto
     */
    function votar($id_usuario, $id_batalla, $id_elemento) {
        $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);
        if (isset($conexion)) {
            // Sentencia para comprobar si el usuario ya ha votado en esa batalla
            $id_batalla = selectBD(array('id_batalla'), 'voto', 'id_usuario', $id_usuario);
            $nombre_elemento = datosElemento($id_elemento);
            if ($id_batalla) {
                // El usuario ya ha votado en esta batalla
                return 'Ya se has votado en esta batalla';
            } else {
                // Si el usuario no ha votado en la batalla indicada se registra el voto
                $insert = insertBD('voto', array('id_usuario', 'id_batalla', 'id_elemento', 'fecha'), array($id_usuario, $id_batalla, $id_elemento, date('Y-m-d H:i:s')), $conexion);
                if ($insert) {
                    // Si se ha registrado el voto con éxito, se guardan el voto en la base de datos
                    return 'Has votado por ' . $nombre_elemento;
                    $conexion->commit();
                } else {
                    // Si ha ocurrido algun error 
                    $conexion->rollBack();
                }
            }
        }
    }
?>