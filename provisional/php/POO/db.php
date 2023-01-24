<?php
    class DB {
        const HOST = "localhost";
        const USER = "root";
        const PASSWORD = "";
        const DBNAME = "dbbatallas";

        private $conexion;

        public function connect () {
            $this->conexion = new PDO('mysql:host='.DB::HOST.';dbname='.DB::DBNAME, DB::USER, DB::PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }

        public function registrarUsuario (user $usuario) {
            $this->conexion->beginTransaction();
            
            $sql = "INSERT INTO `usuario`(`fechanacimiento`, `foto`, `email`, `modovis`, `idioma`, `rol`, `num_elementos_creados`, `num_batallas_creadas`, `num_batallas_votadas`, `num_batallas_ignoradas`, `num_batallas_denunciadas`, `puntos_troll`) VALUES ($usuario->fecha, $usuario->foto, $usuario->email, $usuario->tema, $usuario->idioma, 'usuario', 0, 0, 0, 0, 0, 0)";
            echo $sql;
            
            if ($this->conexion->ejecutar($sql)) {
                $sql = "INSERT INTO `credencial`(`nombreusuario`, `password`) VALUES ($usuario->nombre, $usuario->password)";
                echo $sql;
                if ($this->conexion->ejecutar($sql)) {
                    $this->conexion->commit();
                } else {
                    $this->conexion->rollBack();
                }
            } else {
                $this->conexion->rollBack();
            }
        }

        public function ejecutar($sql){
            $this->conexion->query($sql);
        }
    }
?>