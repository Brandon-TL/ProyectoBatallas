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
        public function conectar () {
            $this->conexion = new PDO('mysql:host='.DB::HOST.';dbname='.DB::DBNAME, DB::USER, DB::PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        
        /**
         * Función que desconecta de la base de datos
         */
        private function desconectar () {
            $this->conexion = null;
        }
            
        /**
         * Función para ejecutar un query tipo INSERT, DELETE o UPDATE
         * @param  string:sql sentencia sql
         */
        public function ejecutar ($sql) {
            $this->sentencia = $sql;
            $this->conectar();
            $this->conexion->query($this->sentencia);
            $this->desconectar();
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

        public function eliminarUsuario ($idUsuario){
            $sql = "DELETE FROM usuario WHERE id = '$idUsuario' ";

            $conexion = new db;
            $conexion->ejecutar($sql);
        }

        public function eliminarCredencial($nombreUsuario){
            $sql = "DELETE FROM credencial WHERE nombreusuario = '$nombreUsuario' ";

            $conexion = new db;
            $conexion->ejecutar($sql);
        }

        public function eliminarBatalla($idBatalla){
            $conexion = new db;

            $sql = "DELETE FROM batalla_elemento WHERE id_batalla = '$idBatalla'";

            $conexion->ejecutar($sql);

            $sql = "DELETE FROM usuario_batalla WHERE id_batalla = '$idBatalla'";

            $conexion->ejecutar($sql);
        }

        public function eliminarUsuarioCredencial($idUsuario){
            $sql = "DELETE FROM usuario_credencial WHERE id_usuario = '$idUsuario'";
            
            $conexion = new db;
            $conexion->ejecutar($sql);
        }
    }
?>