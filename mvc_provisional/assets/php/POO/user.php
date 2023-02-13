<?php
    require_once 'db.php';

    class user {
        protected $id;
        protected $fecha;
        protected $foto;
        protected $email;
        protected $tema;
        protected $idioma;
        protected $nombre;
        protected $password;

        public function __construct($cId, $cFecha, $cFoto, $cEmail, $cTema, $cIdioma, $cNombre, $cPassword) {
            $this->id = $cId;
            $this->fecha = $cFecha;
            $this->foto = $cFoto;
            $this->email = $cEmail;
            $this->tema = $cTema;
            $this->idioma = $cIdioma;
            $this->nombre = $cNombre;
            $this->password = $cPassword;
        }

        public function __set($var, $valor) {
            if (property_exists(__CLASS__, $var)) {
                $this->$var = $valor;
            } else {
                echo 'No existe el atributo $var '.$var;
            }
        }

        public function __get($var) {
            if (property_exists(__CLASS__, $var)) {
                return $this->$var;
            }
        }

        public function registrarUsuario () {
            $sql = "INSERT INTO `usuario`(`fechanacimiento`, `foto`, `email`, `modovis`, `idioma`, `rol`, `num_elementos_creados`, `num_batallas_creadas`, `num_batallas_votadas`, `num_batallas_ignoradas`, `num_batallas_denunciadas`, `puntos_troll`) VALUES ('$this->fecha', '$this->foto', '$this->email', '$this->tema', '$this->idioma', 'usuario', 0, 0, 0, 0, 0, 0)";
            
            $conexion = new db;
            $conexion->ejecutar($sql);
            
            $sql = "INSERT INTO `credencial`(`nombreusuario`, `password`) VALUES ('$this->nombre', '$this->password')";

            $conexion->ejecutar($sql);
        }

        public function eliminarUser(){
            $conexion = new db;
            $conexion->eliminarUsuario($this->id);
            $conexion->eliminarCredencial($this->nombre);
        }
    }
?>