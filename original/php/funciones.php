<?php
include_once 'config.php';

/**
 * Función genérica para eliminar tuplas de las tablas
 * @param string:tabla nombre de la tabla en la que se desean realizar los cambios
 * @param string:id el cual corresponde a la tupla que se desea eliminar
 * @param object:conexion objeto PDO con el que se establece la conexión a bdbatallas
 * 
 * @return true:commit guardar los cambios en la base de datos
 * @return false:rollBack en caso de no poder ejecutar la sentencia, se revierten los cambios realizados
 */
function deleteBD($tabla, $id, $conexion)
{
    $conexion->beginTransaction();
    $sql = "DELETE FROM $tabla WHERE id = $id ";
    if (!$conexion->exec($sql)) {
        $conexion->commit();
    } else {
        $conexion->rollBack();
    }
}

/**
 * Función genérica para modificar datos existentes de las tablas de la base de datos
 * @param string:tabla nombre de la tabla en la que se encuentran los datos que se desean modificar
 * @param string:campo nombre del campo se desea modificar
 * @param string:valor nuevo valor del campo a modificar
 * @param string:id identificador de la tupla que se va a modificar
 * @param object:conexion objeto PDO con el que se establece la conexión a bdbatallas
 * 
 * @return true:commit guardar los cambios en la base de datos
 * @return false:rollBack en caso de no poder ejecutar la sentencia, se revierten los cambios realizados
 */
function updateDB($tabla, $campo, $valor, $id, $conexion)
{
    $conexion->beginTransaction();
    $sql = "UPDATE $tabla SET $campo = $valor WHERE id = $id ";
    if (!$conexion->exec($sql)) {
        $conexion->commit();
    } else {
        $conexion->rollBack();
    }
}

/**
 * Función para aplicar preferencias de visualización del usuario en la página 
 * @param string:usuario nombre del usuario del cual se obtienen sus preferencias
 * 
 * @return _COOKIE[tema] preferencia de tema
 * @return _COOKIE[lang] preferencia de lenguaje
 */
function cargarPreferencias($usuario)
{
    $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);
    // Si la conexión se establece
    if (isset($conexion)) {
        // Obtenemos id del usuario logeado de la tabla de usuario_credencial
        $sql = "SELECT `id_usuario` FROM `usuario_credencial` WHERE `nombreusuario` = '{$usuario}'";
        $result = $conexion->query($sql);
        $id = $result->fetch();

        // Obtener preferencias con el id del usuario de la tabla usuario
        $sql = "SELECT `modovis`,`idioma` FROM `usuario` WHERE `id` = '{$id[0]}'";
        $result = $conexion->query($sql);
        $preferencias = $result->fetch();

        // Establecer el tema e idioma según las preferencias del usuario
        $_COOKIE['tema'] = $preferencias[0];
        $_COOKIE['lang'] = $preferencias[1];
    }
}

/**
 * Función para registrar el inicio y fin de la sesiones de usuarios en la base de datos dbbatallas
 * @param array:valores conjunto de valores a insertar en la tabla de sesiones
 * @param array:_formato_valores [$usuario, $fechaHoraInicio, $fechaHoraFinal]
 * 
 * @return true:commit guardar los cambios en la base de datos
 * @return false:rollBack en caso de no poder ejecutar la sentencia, se revierten los cambios realizados
 */
function registrarsesion($valores)
{
    $campos = array('nombreusuario', 'fechaHoraInicio', 'fechaHoraFinal');
    $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);
    $conexion->beginTransaction();

    if (insertBD('sesiones', $campos, $valores, $conexion)) {
        $conexion->commit();
    } else {
        $conexion->rollBack();
    }
}

/**
 * Función para obtener la información de las sesiones creadas por un usuario
 * @param string:usuario nombre del usuario del que se desean obtener las sesiones
 * 
 * @return array:fechayhora array de objetos PDO con los resultados obtenidos 
 */
function recogersesiones($usuario)
{
    $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);

    $sql = "SELECT MAX(`fechaHoraFinal`) FROM `sesiones` WHERE `nombreusuario` = '{$usuario}'";

    $result = $conexion->query($sql);
    $fechayhora = $result->fetchColumn();

    return $fechayhora;
}

/**
 * Función para obtener datos de la tabla de usuarios
 * @param string:user nombre del usuario del que requieren sus datos
 * 
 * @return object:array conjunto de datos del usuario
 */
function datosUsuario($user)
{
    $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);
    $conexion->beginTransaction();

    $id = selectBD(array("id_usuario"), "usuario_credencial", "nombreusuario", $user)[0];
    return selectBD(array("*"), "usuario", "id", $id);
};

/**
 * Función para crear batallas
 * @param object:conexion objeto PDO con los datos de conexion a dbbatallas
 * @param string:id_elemento1 id del primer elemento de la batalla
 * @param string:id_elemento2 id del segundo elemento de la batalla
 * 
 * @return true:commit guardar los cambios en la base de datos
 * @return false:rollBack en caso de no poder ejecutar la sentencia, se revierten los cambios realizados
 */
function crearBatalla($conexion, $id_elemento1, $id_elemento2)
{
    $campos = array('id_elemento1', 'id_elemento2');
    $valores = array($id_elemento1, $id_elemento2);
    $conexion->beginTransaction();
    if (insertBD('batalla_elemento', $campos, $valores, $conexion)) {
        $conexion->commit();
    } else {
        $conexion->rollBack();
    }
};

/**
 * Función para obtener los datos del los elementos
 * @param string:id_elemento id del elemento cuyos datos se solicitan
 * 
 * @return array de dos posicines, array[0] = nombre del elemento, array[1] = ruta de la imagen
 */
function datosElemento($id_elemento)
{
    $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);
    // Obtener los datos de los elementos
    $datoNombre = selectBD(array('nombre'), 'elemento', 'id', $id_elemento);
    $datoFoto = selectBD(array('foto'), 'elemento', 'id', $id_elemento);

    return array(strtoupper($datoNombre[0]), $datoFoto[0]);
}

/**
 * Función para obtener lo id de un elemento
 * @param string:nombreElemento nombre del elemento cuyos id se solicita
 * 
 * @return string:datoid id del elemento solicitado
 */
function idElemento($nombreElemento)
{
    $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);
    // Obtener los datos de los elementos
    $datoid = selectBD(array('id'), 'elemento', 'nombre', $nombreElemento);  

    return $datoid;
}

/**
 * Función para crear e introducuir elementos en la base de datos
 * @param string:nombre nombre del elemento
 * @param string:foto ruta relativa del elemento
 * @param string:_structura_ruta tabs/img/elementos/ + (nombre del elemento)
 * 
 * @return true:commit guardar los cambios en la base de datos
 * @return false:rollBack en caso de no poder ejecutar la sentencia, se revierten los cambios realizados
 */
function crearElemento($nombre, $foto)
{
    $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);

    $campos = array('nombre', 'foto', 'bloqueado');
    $valores = array($nombre, $foto, 0);

    $conexion->beginTransaction();
    if (insertBD('elemento', $campos, $valores, $conexion)) {
        $conexion->commit();
    } else {
        $conexion->rollBack();
    }
}

/**
 * Función para comprobar
 * @param string:nombre del elemento cuya existencia se quiere comprobar
 * 
 * @return true:flag en caso de que se haya encontrado un elemento con el mimsmo nombre
 */
function comprobarElemento($nombre)
{
    $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);
    $flag = false;
    $sql = "SELECT COUNT(`id`) FROM `elemento` WHERE `nombre` =  '{$nombre}'";
    $result = $conexion->query($sql);
    if ($result->fetchColumn() > 0) {
        $flag = true;
    }
    return $flag;
}

/**
 * Función para obtener los datos sobre las batallas
 * @param boolean:creadas true (solo batallas creadas por el usuario) o false (batallas que el usuario no ha creado)
 * 
 * @return array:datos de las batallas solicitadas
 */
function obtenerBatallas($creadas)
{
    $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);

    // Obetener el id del usuario que ha iniciado sesión : array[]
    $id_usuario = selectBD(array('id_usuario'), 'usuario_credencial', 'nombreusuario', $_SESSION['usuario']);
    // Como solo es un array de una posición se puede guardar en una variable string, para un uso más fácil
    $id_usuario = $id_usuario[0];

    // Obtener todas las batallas creadas por el usuario que ha iniciado sesión : array[]
    $batallasDeUsuario = selectBD(array('id_batalla'), 'usuario_batalla', 'id_usuario', $id_usuario);

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
 * Función para crear etiquetas especificas y mostrar batallas por pantalla y facilitando dar estilos css y clases
 * @param array:datos 
 * @param string:_HTML <div class="card">
 *                  <div class="mostrador">
 *                      <div>Elemento 1</div>
 *                      <div>Elemento 2</div>
 *                  </div>
 *                  <div class="versus">VS</div>
 *                  <div class="cardContent">
 *                      <div class="e1">Elemento 2</div><div class="e2">Elemento 2</div>
 *                      Creado por <h2>Nombre del creador</h2>
 *                  </div>
 *              </div>
 * @return string:html de la información de todas las batallas con clases especificas para cada elemento y batalla
 *                      incluye php para la funcionalidad de votos
 */
function formatoBatallas($datos)
{
    $html = '<form>';
    $id_votante = datosUsuario($_SESSION['usuario'])[0];
    foreach ($datos as $tupla) {
        $id_elemento1 = $tupla[1];
        $id_elemento2 = $tupla[2];
        $E1 = datosElemento($tupla[1]);
        $E2 = datosElemento($tupla[2]);

        $id_usuario = selectBD(array('id_usuario'), 'usuario_batalla', 'id_batalla', $tupla[0]);
        $nombre_creador = selectBD(array('nombreusuario'), 'usuario_credencial', 'id_usuario', $id_usuario[0]);

        $id_batalla = selectBD(array('id_batalla'), 'batalla_elemento', 'id_elemento1', $tupla[1])[0];
        // echo $id_elemento1.' vs '.$id_elemento2.' en batalla '.$id_batalla;

        $html .= "<div class='card'>
                    <div class='mostrador'>
                        <button class='image'
                            style='background: url(./$E1[1]);
                                    background-position: center;
                                    background-size: cover;
                                    background-repeat: no-repeat;
                            onclick='votar($id_votante, $id_batalla, $id_elemento1)';'>
                            <span>🢁</span>
                            </button>
                        <button class='image'
                            style='background: url(./$E2[1]);
                                    background-position: center;
                                    background-size: cover;
                                    background-repeat: no-repeat;
                            onclick='votar($id_votante, $id_batalla, $id_elemento2)';'>
                            <span>🢁</span>
                        </button>
                    </div>
                    <div class='versus'>VS</div>
                    <div class='cardContent'>
                        <div class='e1'>$E1[0]</div><div class='e2'>$E2[0]</div>
                        Creado por <h2>$nombre_creador[0]</h2>
                    </div>
                </div>";
    }
    $html .= '</form>';
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
function votar($id_usuario, $id_batalla, $id_elemento)
{
    $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);
    if (isset($conexion)) {
        // Sentencia para comprobar si el usuario ya ha votado en esa batalla
        $id_batalla = selectBD(array('id_batalla'), 'voto', 'id_usuario', $id_usuario);
        $nombre_elemento = datosElemento($id_elemento);
        if ($id_batalla) {
            // El usuario ya ha votado en esta batalla
            return 'Ya se has votado en esta batalla';
        } else {
            echo "hola";
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

/**
 * @param string:usuario cuyos datos se desean eliminar
 * 
 * @return true:commit guardar los cambios en la base de datos
 * @return false:rollBack en caso de no poder ejecutar la sentencia, se revierten los cambios realizados
 */
function eliminarUsuario($usuario)
{
    $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);

    // Select para coger el ID del usuario
    $sqlID = "SELECT `id_usuario` FROM `usuario_credencial` WHERE `nombreusuario` = '{$usuario}' ";
    $resultID = $conexion->query($sqlID);
    $id = $resultID->fetchColumn();
    print_r($id);
    // Eliminare el usuario con el mismo ID en tabla usuario el cual hace una cascada
    // y elimina el usuario de las demas tablas relacionadas que son
    // usuario_credencial y usuario
    $sqlEliminar = "DELETE FROM `usuario` WHERE `id` = '{$id}' ";
    // eliminar de la credencial
    $sqlEliminarCred = "DELETE FROM `credencial` WHERE `nombreusuario` = '{$usuario}' ";

    $conexion->beginTransaction();

    if ($conexion->exec($sqlEliminar)){
        if ($conexion->exec($sqlEliminarCred)) {
            $conexion->commit();
        } else {
            $conexion->rollBack();
        } 
    } else {
        // Si ha ocurrido algun error 
        $conexion->rollBack();
    }

    // ¡ IMPORTANTE ! debajo de donde insertes esta función BORRAR COOKIE SESSION
    // Enviar con header location a "logout.php"
};

/**
 * Función para eliminar los usuarios con 10 o más puntos de troll
 */
function eliminarTroll()
{

    $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);

    // Consigo el ID del usuario
    $usuario = $_SESSION['usuario'];
    $sqlID = "SELECT `id_usuario` FROM `usuario_credencial` WHERE `nombreusuario` = '{$usuario}' ";
    $resultID = $conexion->query($sqlID);
    $id_usuario = $resultID->fetchColumn();

    // Con el ID identifico la cantidad de puntos de troll del usuario
    $sqlTroll = "SELECT `puntos_troll` FROM `usuario` WHERE `id` = '{$id_usuario}' ";
    $resultTroll = $conexion->query($sqlTroll);
    $puntosTroll = $resultTroll->fetchColumn();

    //Si tiene mas de 10 puntos le redirijo a "cuentaEliminada.php"
    if ($puntosTroll >= 10) {
        // Elimino el usuario
        eliminarUsuario($usuario);

        // Le redirijo a "cuentaEliminada PHP"
        header("Location: cuentaEliminada.php");

    }
}
