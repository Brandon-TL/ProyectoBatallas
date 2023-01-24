<?php
    require_once 'db.php';

    class user {
        protected $id;
        protected $nombre;
        protected $email;
        protected $foto;
        protected $tema;
        protected $idioma;
        protected $password;

        public function __construct($cId, $cNombre, $cEmail, $cFoto, $cTema, $cIdioma, $cPassword) {
            $this->id = $cId;
            $this->nombre = $cNombre;
            $this->email = $cEmail;
            $this->foto = $cFoto;
            $this->tema = $cTema;
            $this->idioma = $cIdioma;
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

    }
?>