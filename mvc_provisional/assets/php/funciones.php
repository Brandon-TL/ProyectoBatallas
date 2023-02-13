<?php
    include_once 'config.php';

    /**
     * Función validar valida un datos de formularios con una expresiónes regulares
     * @param string:datoAValidar cadena de texto que se quiere validar
     * @param string:expresionRegular expresión regular con la que validarla
     * 
     * @return bool:true el dato a validar coincide con la expresión regular
     * @return bool:false el dato a validar NO coincide con la expresión regular
     */
    function validar($datoAValidar, $expresionRegular) {
        // Valido el campo
        if (preg_match($expresionRegular, $datoAValidar)) {
            $valida = true;
        } else {
            $valida = false;
        }
        return $valida;
    }

    /**
     * Función validar_edad valida una fecha de formulario con DateTime
     * @param string:fecha fecha que se quiere validar
     * 
     * @return bool:true validado
     * @return bool:false no validado
     */
    function validar_edad($fecha) {
        // Cambiamos $fecha de String a DateTime
        $nacimiento = new DateTime($fecha);
        // Obtenemos la fecha actual
        $ahora = new DateTime(date("d-m-Y"));
        // Calculamos la diferencia entre la fecha introducidad y la actual
        $edad = $ahora->diff($nacimiento);
        $edad = $edad->format("%Y");
        // Devolvemos solo la diferencia en años
        if ($edad > 0 && $edad < 100) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Función para loguear usuarios
     * @param string:usuario Nombre del usuario a loguear
     * @param string:password Contraseña de usuario a loguear
     * 
     * @return bool:true las credenciales del usuario coniciden con la base de datos
     * @return bool:false las credenciales del usuario no se han encontrado o son incorrectas
     */
    function comprobarCredenciales($usuario, $password) {
        // Buscar el usuario con el nombre introducido
        $stmt = selectBD(array('password'), 'credencial', 'nombreusuario', $usuario);

        if (isset($stmt['password']) && $stmt['password'] === $password) {
            $id = selectBD(array('id_usuario'), 'usuario_credencial', 'nombreusuario', $usuario);
            $preferencias = selectBD(array('modovis, idioma'), 'usuario', 'id', $id);
            $_COOKIE['lang'] = $preferencias['idioma'];
            $_COOKIE['tema'] = $preferencias['modovis'];

            session_start();
            // Creamos sesión con el nombre del usuario
            $_SESSION["usuario"] = $usuario;
            // Cogemos la fecha y hora de inicio para registrarla en sesiones
            $_SESSION["fInicio"] = date('Y-m-d H:i:s');

            return true;
        } else {
            return false;
        }
    }
        
    /**
     * Función para aplicar preferencias de visualización del usuario en la página 
     * @param string:usuario nombre del usuario del cual se obtienen sus preferencias
     * 
     * @return _COOKIE[tema] preferencia de tema
     * @return _COOKIE[lang] preferencia de lenguaje
     */
    function cargarPreferencias($usuario) {
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
     * Función genérica para insertar datos en tablas especificas en de la base de datos dbbatallas
     * @param string:tabla nombre de la tabla en la que se realizará la insercción de datos
     * @param array:campos con los nombre de los campos en los que se desean introducir datos
     * @param array:valores valores de los campos que se desean introducir
     * ¡CUIDADO!: los valores han de coincidir en el orden que se establece en el array de campos
     * @param object:conexion objeto PDO con el que se establece la conexión a bdbatallas
     * 
     * @return bool:true sentencia sql ejecutada de forma exitosa
     */
    function insertBD($tabla, $campos, $valores, $conexion) {
        // Creo etiquetas que son nombres de campos precedidos con dos puntos.
        $etiquetas = $campos;
        foreach ($etiquetas as &$etiqueta) {
            $etiqueta = ':' . $etiqueta;
        }

        // Sentencia preparada
        $sql = "INSERT INTO $tabla (" . implode(', ', $campos) . ") VALUES(" . implode(', ', $etiquetas) . ")";
        $stmt = $conexion->prepare($sql);
        $stmt->execute(array_combine($etiquetas, $valores));
        return true;
    }

    /**
     * Función genérica para eliminar tuplas de las tablas
     * @param string:tabla nombre de la tabla en la que se desean realizar los cambios
     * @param string:condicion con la que se filtrarán los datos a borrar
     * @param string:valor establece que datos se borrarán
     * 
     * @return bool:true guardar los cambios en la base de datos
     * @return bool:false en caso de no poder ejecutar la sentencia, se revierten los cambios realizados
     */
    function deleteBD($tabla, $condicion, $valor) {
        $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);
        $conexion->beginTransaction();
        $sql = "DELETE FROM $tabla WHERE $condicion = $valor";
        if (!$conexion->exec($sql)) {
            $conexion->commit();
            return true;
        } else {
            $conexion->rollBack();
            return false;
        }
    }

    /**
     * Función genérica para modificar datos existentes de las tablas de la base de datos
     * @param string:tabla nombre de la tabla en la que se encuentran los datos que se desean modificar
     * @param string:campo nombre del campo se desea modificar
     * @param string:valor nuevo valor del campo a modificar
     * @param string:condicion con la que se seleccionará la tupla a modificar
     * @param string:cond_valor que establece la tupla que se modificará
     * 
     * @return bool:true guardar los cambios en la base de datos
     * @return bool:false en caso de no poder ejecutar la sentencia, se revierten los cambios realizados
     */
    function updateDB($tabla, $campo, $valor, $condicion, $cond_valor) {
        $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);
        $conexion->beginTransaction();
        $sql = "UPDATE $tabla SET $campo = '$valor' WHERE $condicion = '$cond_valor' ";
        if ($conexion->exec($sql)) {
            $conexion->commit();
            return true;
        } else {
            $conexion->rollBack();
            return false;
        }
    }

    /**
     * Función para registrar el inicio y fin de la sesiones de usuarios en la base de datos dbbatallas
     * @param array:sesion conjunto de valores a insertar en la tabla de sesiones [$usuario, $fechaHoraInicio, $fechaHoraFinal]
     * 
     * @return bool:true:commit guardar los cambios en la base de datos
     * @return bool:false:rollBack en caso de no poder ejecutar la sentencia, se revierten los cambios realizados
     */
    function registrarSesion($sesion) {
        $campos = array('nombreusuario', 'fechaHoraInicio', 'fechaHoraFinal');
        $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);
        $conexion->beginTransaction();
        
        if (insertBD('sesiones', $campos, $sesion, $conexion)) {
            $conexion->commit();
        } else {
            $conexion->rollBack();
        }
    }

    /**
     * Función genérica para obtener información de la base de datos dbbatallas
     * @param array:campos nombre de los campos a seleccionar en una tabla especifica
     * @param string:tabla nombre de la tabla a la que pertenecen los datos que se solicitan
     * @param string:condición nombre de campo con el cual se filtrará la selección
     * @param string:valor valor de la condición para el filtrado de información
     * 
     * @return array:datos conjunto de datos obtenidos de del select a la base de datos
     */
    function selectBD($campos, $tabla, $condicion, $valor) {
        $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);
        $c = "";
        if (count($campos) > 1) {
            foreach ($campos as $campo) {
                $c .= "'" . $campos . "',";
            }
            $c = substr($c, 0, -1);
        } else {
            $c = $campos[0];
        }
        $sql = "SELECT " . $c . " FROM " . $tabla . " WHERE " . $condicion . " = '" . $valor . "'";
        // echo $sql.'<br>';
        $result = $conexion->query($sql);
        $datos = $result->fetch();
        return $datos;
    }
    
    /**
     * Función genérica para obtener información de la base de datos dbbatallas con la funcionalidad AND
     * @param array:campos nombre de los campos a seleccionar en una tabla especifica
     * @param string:tabla nombre de la tabla a la que pertenecen los datos que se solicitan
     * @param string:condición nombre de campo con el cual se filtrará la selección
     * @param string:valor valor de la condición para el filtrado de información
     * @param string:condición2 nombre de segundo campo con el cual se filtrará la selección
     * @param string:valor2 valor de la segunda condición para el filtrado de información
     * 
     * @return array:datos conjunto de datos obtenidos de del select a la base de datos
     */
    function selectBDand($campos, $tabla, $condicion, $valor, $condicion2, $valor2) {
        $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);
        $c = "";
        if (count($campos) > 1) {
            foreach ($campos as $campo) {
                $c .= "'" . $campos . "',";
            }
            $c = substr($c, 0, -1);
        } else {
            $c = $campos[0];
        }
        $sql = "SELECT " . $c . " FROM " . $tabla . " WHERE " . $condicion . " = '" . $valor . "' AND " . $condicion2 . " = '" . $valor2 . "'";
        $result = $conexion->query($sql);
        $datos = $result->fetch();
        return $datos;
    }

    /**
     * Función para cerrar sesiones iniciadas
     * 
     * @return header:Location redireccion a la página principal index.php
     */
    function cerrarSesion() {
        if(!isset($_SESSION)) { 
            session_start(); 
        }
        // Obtener datos de la sesión y almacenarlos en un array
        $sesion = array( $usuario = $_SESSION["usuario"],
                            $fechainicio = $_SESSION["fInicio"],
                            $fechafinal = date('Y-m-d H:i:s'));
        // Registrar la sesión en la base de datos
        registrarSesion($sesion);
        // Destruir sesión
        session_destroy();
        // Eliminar cookies de sesión
        unset($_COOKIE["PHPSESSID"]);
        setcookie("PHPSESSID", null, -1, '/');
        // Redirigir a página principal
        header("Location: IndexView.php");
    }

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
     * Función para registrar nuevos usuarios en la base de  datos
     * @param array:usuario datos del usuario a registrar
     * @param array:_formato_usuario [$fecha, $avatar, $email, $tema, $lang, $rol, $usuario, $password]
     * 
     * @return bool:true guardar el usuario en la base de datos
     * @return bool:false en caso de no poder registrar el usuario, se revierten los cambios realizados
     */
    function registrarUsuarioBD($usuario) {
        $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);
        if (isset($conexion)) {
            // Sentencia para comprobar si esxiste un usuario con el email introducido en la tabla usuario
            $sql = "SELECT COUNT(`email`) FROM `usuario` WHERE `email` =  '{$usuario[2]}'";
            $result = $conexion->query($sql);
            $email = $result->fetchColumn();
            if ($email != 0) {
                // El email ya existe
                return 'email';
            } else {
                // Sentencia para comprobar si esxiste un usuario con el email introducido en la tabla credencial
                $sql = "SELECT COUNT(`nombreusuario`) FROM `credencial` WHERE `nombreusuario` =  '{$usuario[6]}'";
                $result = $conexion->query($sql);
                $nombre = $result->fetchColumn();
                if ($nombre != 0) {
                    // El nombre de usuario ya existe
                    return 'usuario';
                } else {
                    $conexion->beginTransaction();
                    $usuarioT = array_chunk($usuario, 6);
                    // Si no existe el usuario con el email lo registra
                    // Crear una consulta preparada para insertar datos en tabla usuario                  
                    $campos = array('fechanacimiento', 'foto', 'email', 'modovis', 'idioma', 'rol');
                    if (insertBD('usuario', $campos, $usuarioT[0], $conexion)) {

                        $campos = array('nombreusuario', 'password');
                        if (insertBD('credencial', $campos, $usuarioT[1], $conexion)) {
                            $sql = "SELECT `id` FROM `usuario` WHERE `email` =  '{$usuario[2]}'";
                            $result = $conexion->query($sql);
                            $id = $result->fetch();

                            // Crear una consulta preparada para insertar datos en tabla usuario_credencial
                            $sql = "INSERT INTO `usuario_credencial`(`id_usuario`, `nombreusuario`, `accion`, `fecha`)
                                                VALUES (:id, :nombre, :accion, :fecha)";
                            $accion = 'registrar';
                            $fecha = date('Y-m-d');

                            $pdostmt = $conexion->prepare($sql);

                            $pdostmt->bindParam(':id', $id[0]);
                            $pdostmt->bindParam(':nombre', $usuario[6]);
                            $pdostmt->bindParam(':accion', $accion);
                            $pdostmt->bindParam(':fecha', $fecha);

                            if ($pdostmt->execute()) {
                                $conexion->commit();
                            } else {
                                $conexion->rollBack();
                            }
                        } else {
                            $conexion->rollBack();
                        }
                    } else {
                        $conexion->rollBack();
                    }
                }
            }
        }
    }

    /**
     * Función para eliminar usuarios en la base de  datos y todos sus datos
     * @param string:nombre del usuario a eliminar
     * 
     * @return bool:true guardar el usuario en la base de datos
     * @return bool:false en caso de no poder registrar el usuario, se revierten los cambios realizados
     */
    function eliminarUsuarioBD($nombre) {
        $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);
        if (isset($conexion)) {
            // Obtener id del usuario a eliminar
            $conexion->beginTransaction();
            $id = datos_de_usuario($nombre)[0];
            $id_admin = datos_de_usuario('admin')[0];
            $success = false;

            if ($id) {
                // Eliminar de la tabla credencial
                if (deleteBD('credencial', 'nombreusuario', $nombre)) {
                    // Eliminar de la tabla sesiones
                    if (deleteBD('sesiones', 'nombreusuario', $nombre)) {
                        // Eliminar de la tabla usuario
                        if (deleteBD('usuario', 'id', $id)) {
                            // Sustituir id de la tabla usuario_batalla por id de administrador en accion="crear" con $id del usuario eliminado
                            if (updateDB('usuario_batalla', 'id_usuario', $id_admin, 'accion', 'crear') && false) {
                            // se sustituira el id_usuario con id_admin todas las tuplas con accion crear!!!
                            // necesita filtro WHERE $id_usuario = $id (seleccionar $id de la tupla y estableceerla como codicion del update)


                                // Eliminar de la tabla usuario_credencial
                                // if () {
                                //     // Sustituir id de la tabla usuario_elemento por id de administrador en accion="crear" con $id del usuario eliminado
                                //     if () {                                    
                                //         // Eliminar votos ???
                                //     }
                                // }
                            }
                        }
                    }
                }

            }

            if ($success) {
                $conexion->commit();
            } else {
                $conexion->rollBack();
            }


            // cerrarSesion();
        }
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
     * @param bool:true:creadas solo batallas creadas por el usuario
     * @param bool:false:creadas solo batallas que el usuario no ha creado ni votado
     * 
     * @return array:datos de las batallas solicitadas
     */
    function obtenerBatallas($creadas) {
        $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);

        // Obetener el id del usuario que ha iniciado sesión
        $id_usuario = selectBD(array('id_usuario'), 'usuario_credencial', 'nombreusuario', $_SESSION['usuario'])[0];
        // Como solo es un array de una posición se puede guardar en una variable string, para un uso más fácil
        // echo $id_usuario.'<br>';

        // Obtener todas las batallas creadas por el usuario que ha iniciado sesión
        $batallasDeUsuario = selectBDand(array('id_batalla'), 'usuario_batalla', 'id_usuario', $id_usuario, 'accion', 'crear');
        
        // Obtener todas las batallas votadas por el usuario que ha iniciado sesión
        $query = $conexion->prepare("SELECT `id_batalla` FROM `voto` WHERE `id_usuario` = '2';");
        $query->execute();
        $batallasVotadas = $query->fetchAll();

        $ids_votadas = array();
        foreach ($batallasVotadas as $batalla) {
            array_push($ids_votadas, $batalla['id_batalla']);
        }

        // Obtener todas las batallas existentes y filtrar a un array solo las que no ha creado el usuario en cuestión
        $sql = "SELECT * FROM `batalla_elemento`;";
        $resultBatalla = $conexion->query($sql);

        $datos = array();

        // Si el usuario ha creado al menos una batalla
        if ($batallasDeUsuario) {
            // Filtra la batallas solicitadas
            if ($creadas) {
                // Para TODAS y cada una de las batallas existentes
                while ($tupla = $resultBatalla->fetch()) {
                    // Comprueba si el id se encuentra en el array de id's de batallas creadas por el usuario
                    if (in_array($tupla['id_batalla'], $batallasDeUsuario)) {
                        // En caso afirmativo, añade la informacion del fetch() en la siguiente posición del array de resultados
                        $datos[count($datos)] = $tupla;
                    }
                }
            } else {
                // Comprueba si el usuario ha votado alguna batalla
                if ($ids_votadas) {
                    // Para TODAS y cada una de las batallas existentes
                    while ($tupla = $resultBatalla->fetch()) {
                        // Si ha votado la batalla $tupla no añadirla $datos
                        if (!in_array($tupla['id_batalla'], $batallasDeUsuario) && !in_array($tupla['id_batalla'], $ids_votadas)) {
                            // En caso afirmativo, añade la informacion del fetch() en la siguiente posición del array de resultados
                            $datos[count($datos)] = $tupla;
                        }
                    }
                    // Indicar si el usuario ya ha votado todas las batallas tras la comparación
                    if (empty($datos)) {
                        return 'votos';
                    }
                } else {
                    // Si no tiene votos, salta la comparación por voto
                    while ($tupla = $resultBatalla->fetch()) {
                    if (!in_array($tupla['id_batalla'], $batallasDeUsuario)) {
                            // En caso afirmativo, añade la informacion del fetch() en la siguiente posición del array de resultados
                            $datos[count($datos)] = $tupla;
                        }
                    }
                }
            }
        } else {
            // Si se detecta que no ha creado ninguna batalla
            //  Se informa al usuario que necesita crear al menos una batalla para votar en las de otros
            $datos = false;
        }

        // Devolver todas las batallas que no han sido creadas por el usuario logeado
        return $datos;
    }

    /**
     * Función para obtener todos los datos sobre logros de un usuario
     * @param string|int:id_usuario del usuario solicitado
     * 
     * @return array:logros de usuario indicado
     */
    function obtenerLogros($id_usuario) {
        $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);

        // Obetener el id del usuario que ha iniciado sesión
        // Como solo es un array de una posición se puede guardar en una variable string, para un uso más fácil
        $l1 = selectBD(array('num_elementos_creados'), 'usuario', 'id', $id_usuario)[0];
        $l2 = selectBD(array('num_batallas_creadas'), 'usuario', 'id', $id_usuario)[0];
        $l3 = selectBD(array('num_batallas_votadas'), 'usuario', 'id', $id_usuario)[0];
        $l4 = selectBD(array('num_batallas_ignoradas'), 'usuario', 'id', $id_usuario)[0];
        $l5 = selectBD(array('num_batallas_denunciadas'), 'usuario', 'id', $id_usuario)[0];

        return $logros = array(
            "num_elementos_creados" => $l1,
            "num_batallas_creadas" => $l2,
            "num_batallas_votadas" => $l3,
            "num_batallas_ignoradas" => $l4,
            "num_batallas_denunciadas" => $l5
        );
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
            // echo 'id de usuario = ' . $id_usuario. '<br><br>';

            $sql = "SELECT * FROM `usuario_batalla`;";
            $resultBatalla = $conexion->query($sql);

            $batallas = array();
    
            while ($batalla = $resultBatalla->fetch()) {
                $usuario_batalla = $batalla['id_usuario'];
                if ($id_usuario == $usuario_batalla) {
                    if ($batalla['accion'] == 'ignorar' && $filtro == 'ignorar') {
                        // Obtener todas las batallas ignoradas por el usuario que ha iniciado sesión
                        array_push($batallas, $batalla);
                    } else if ($batalla['accion'] == 'denunciar' && $filtro == 'denunciar') {
                        // Obtener todas las batallas denunciadas por el usuario que ha iniciado sesión
                        array_push($batallas, $batalla);
                    }
                }
            }

            return $batallas;
        }
    }

    /**
     * Función para obtener en forma de string la información más inportante de una batlla
     * @param string:id_batalla de la cual que solicita la información
     * 
     * @return string:info de la batalla
     */
    function info_batalla ($id_batalla) {
        $batalla = selectBD(array('*'), 'batalla_elemento', 'id_batalla', $id_batalla);
        $nombre_e1 = selectBD(array('*'), 'elemento', 'id', $batalla['id_elemento1']);
        $nombre_e2 = selectBD(array('*'), 'elemento', 'id', $batalla['id_elemento2']);
        
        $info = $nombre_e1['nombre'] . " VS " . $nombre_e2['nombre'];
        return $info;
    }

    /**
     * Función para obtener en forma de string la información más inportante de una batlla
     * @param string:id_batalla de la cual que solicita la información
     * 
     * @return string:info de la batalla
     */
    function info_batalla_creada ($id_batalla) {
        $batalla = selectBD(array('*'), 'batalla_elemento', 'id_batalla', $id_batalla);
        $nombre_e1 = selectBD(array('*'), 'elemento', 'id', $batalla['id_elemento1']);
        $nombre_e2 = selectBD(array('*'), 'elemento', 'id', $batalla['id_elemento2']);
       
        $batallas_denunciadas = selectBD(array('id_batalla'), 'usuario_batalla', 'accion', 'denunciar');
        $denuncias = 0;
        foreach ($batallas_denunciadas as $id_batalla_denunciada) {
            if ($id_batalla_denunciada == $id_batalla) {
                $denuncias++;
            }
        }

        $fecha = selectBD(array('fecha'), 'usuario_batalla', 'id_batalla', $id_batalla)[0];

        $info = array(
            "elemento1" => $nombre_e1['nombre'],
            "elemento2" => $nombre_e2['nombre'],
            "denuncias" => $denuncias,
            "fecha" => $fecha,
        );
        return $info;
    }

    /**
     * Funcion para la votación de elementos
     * @param string:id_batalla id de la batalla en la que se encuentra el elemento
     * @param string:id_elemento id del elemento que se desea votar
     * 
     * @return bool:true si se han encontrado los elementos solicitados, se ejecuta comando sql para 
     *                      registrar la votación en la base de datos y se indica que se ha terminado la ejecución con éxito
     * @return bool:false indicativo de porque no se ha registrado el voto
     */
    function votar($id_usuario, $id_batalla, $id_elemento) {
        $conexion = new PDO(DSN, USER, PASSWORD, OPTIONS);
        if (isset($conexion)) {
            // Comprobar si el usuario ya ha votado en la batalla con id $id_batalla
            if (!selectBDand(array('*'), 'voto', 'id_usuario', $id_usuario, 'id_batalla', $id_batalla)) {
                // Si no ha votado actualizar e insertar datos en las tablas respectivas
                // Actualizar votos del elemento en la tabla batalla_elemento
                
                // Comprobar a que elemento añadir el voto
                if (selectBD(array('id_elemento1'), 'batalla_elemento', 'id_batalla', $id_batalla)[0] == $id_elemento) {
                    // Calcular nueva cantidad de votos al elemento votado
                    $nueva_cantidad = intval(selectBD(array('votos_elemento1'), 'batalla_elemento', 'id_batalla', $id_batalla)[0]) + 1;
                    // Actualizar votos al elemento votado
                    $sumado = updateDB('batalla_elemento', 'votos_elemento1', $nueva_cantidad, 'id_batalla', $id_batalla);
                } else if (selectBD(array('id_elemento2'), 'batalla_elemento', 'id_batalla', $id_batalla)[0] == $id_elemento) {
                    // Calcular nueva cantidad de votos al elemento votado
                    $nueva_cantidad = intval(selectBD(array('votos_elemento2'), 'batalla_elemento', 'id_batalla', $id_batalla)[0]) + 1;
                    // Actualizar votos al elemento votado
                    $sumado = updateDB('batalla_elemento', 'votos_elemento2', $nueva_cantidad, 'id_batalla', $id_batalla);
                }

                // Actualizar tabla usuario
                if (selectBD(array('num_batallas_votadas'), 'usuario', 'id', $id_usuario)[0]) {
                    // Calcular nueva cantidad de batallas votadas
                    $nueva_cantidad = intval(selectBD(array('num_batallas_votadas'), 'usuario', 'id', $id_usuario)[0]) + 1;
                    // Actualizar votos al elemento votado
                    $sumado = updateDB('usuario', 'num_batallas_votadas', $nueva_cantidad, 'id', $id_usuario);
                }

                $campos = array('id_usuario', 'id_batalla', 'id_elemento', 'fecha');
                $valores = array($id_usuario, $id_batalla, $id_elemento, date('Y-m-d H:i:s'));
                // Actualizar tabla voto
                insertBD('voto', $campos, $valores, $conexion);
            }
            // Si ya ha votado en esa batalla no hacer nada
            header("Location: user.php");
            exit(); 
        }
    }
?>