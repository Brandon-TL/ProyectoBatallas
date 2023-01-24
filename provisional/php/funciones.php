<?php
    include_once 'config.php';

    /**
     * Función validar valida un datos de formularios con una expresiónes regulares
     * @param string:datoAValidar cadena de texto que se quiere validar
     * @param string:expresionRegular expresión regular con la que validarla
     * 
     * @return true:valida el dato a validar coincide con la expresión regular
     * @return false:valida el dato a validar NO coincide con la expresión regular
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
     * @return true validado
     * @return false no validado
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
     * @return true las credenciales del usuario coniciden con la base de datos
     * @return false las credenciales del usuario no se han encontrado o son incorrectas
     */
    function loguear($usuario, $password) {
        // Buscar el usuario con el nombre introducido
        $stmt = selectBD(array('password'), 'credencial', 'nombreusuario', $usuario);

        if (isset($stmt['password']) && $stmt['password'] === $password) {
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
        // echo $sql."<br>";
        
        $result = $conexion->query($sql);
        $datos = $result->fetch();
        return $datos;
    }

    /**
     * Función par aregistrar nuevos usuarios en la base de  datos
     * @param array:usuario datos del usuario a registrar
     * @param array:_formato_usuario [$fecha, $avatar, $email, $tema, $lang, $rol, $usuario, $password]
     * 
     * @return true:commit guardar el usuario en la base de datos
     * @return false:rollBack en caso de no poder registrar el usuario, se revierten los cambios realizados
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



    
    /**
     * Función genérica para insertar datos en tablas especificas en de la base de datos dbbatallas
     * @param string:tabla nombre de la tabla en la que se realizará la insercción de datos
     * @param array:campos con los nombre de los campos en los que se desean introducir datos
     * @param array:valores valores de los campos que se desean introducir
     * ¡CUIDADO!: los valores han de coincidir en el orden que se establece en el array de campos
     * @param object:conexion objeto PDO con el que se establece la conexión a bdbatallas
     * 
     * @return true sentencia sql ejecutada de forma exitosa
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
?>