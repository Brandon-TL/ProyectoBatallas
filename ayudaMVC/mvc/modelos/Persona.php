<?php
    class Persona { 
        // Atributos, propiedades
        private $id;
        private $nombre;
        private $apellidos;
        private $email;

        // Metodos

        // Constructor
        public function __construct($nombre, $apellidos) {
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
        }
        
        // Getters y Setters
        public function __set($var, $valor) {
            if (property_exists(__CLASS__, $var)) { 
                $this->$var = $valor; 
            } else {
                echo "No existe el atributo $var."; 
            }
        }

        public function __get($var) {
            if (property_exists(__CLASS__, $var)) { 
                return $this->$var; 
            }
        } 
    }
?>