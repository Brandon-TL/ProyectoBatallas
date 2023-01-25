<?php
    class DB {
        const HOST = "localhost";
        const USER = "root";
        const PASSWORD = "";
        const DBNAME = "dbbatallas";
        private $sentencia;
        private $conexion;

        /**
         * Función que conecta con la base de datos
         */
        public function abrirConexion () {
            $this->conexion = new PDO('mysql:host='.DB::HOST.';dbname='.DB::DBNAME, DB::USER, DB::PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        
        /**
         * Función que desconecta de la base de datos
         */
        private function cerrarConexion () {
            $this->conexion = null;
        }
            
        /**
         * Función para ejecutar un query tipo INSERT, DELETE o UPDATE
         * @param  string:sql sentencia sql
         */
        public function ejecutar ($sql) {
            $this->conexion = $sql;
            $this->abrirConexion();
            $this->conexion->query($this->sentencia);
            $this->cerrarConexion();
        }

        /**
         * Función para ejecutar un query tipo SELECT
         * @param  string:sql sentencia sql
         * 
         * @return array:resultado con los valores de la BBDD que cumplen la query
         */
        public function obtenerResultado ($sql){
            $this->sentencia = $sql;
            $this->abrirConexion();
            $resultado = array();

            foreach ($this->conexion->query($this->sentencia) as $row) {
                array_push($resultado, $row);
            }
            
            return $resultado;
        }

        public function registrarUsuario (user $usuario) {
            $sql = "INSERT INTO `usuario`(`fechanacimiento`, `foto`, `email`, `modovis`, `idioma`, `rol`, `num_elementos_creados`, `num_batallas_creadas`, `num_batallas_votadas`, `num_batallas_ignoradas`, `num_batallas_denunciadas`, `puntos_troll`) VALUES ($usuario->fecha, $usuario->foto, $usuario->email, $usuario->tema, $usuario->idioma, 'usuario', 0, 0, 0, 0, 0, 0)";
            echo $sql;
            
            if ($this->conexion->ejecutar($sql)) {
                $sql = "INSERT INTO `credencial`(`nombreusuario`, `password`) VALUES ($usuario->nombre, $usuario->password)";
                echo $sql;
                if ($this->conexion->ejecutar($sql)) {
                    echo "Usuario registrado";
                } else {
                    echo "No se ha podido  registrar  el usuario";
                }
            } else {
                echo "No se ha podido  registrar el usuario";
            }
        }
    }
?>