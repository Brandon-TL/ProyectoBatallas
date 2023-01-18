<?php
    abstract class Producto {
        // Atributos
        private static $num_productos = 0;
        protected $color;
        protected $nombre;
        protected $precio;
        protected $fechaCaducidad;
        protected $peso;

        // Métodos
        
        // Constructor
        public function __construct($color, $nombre, $precio, $fechaCaducidad, $peso) {
            self::$num_productos++;
            
            $this->color = $color;    
            $this->nombre = $nombre;
            $this->precio = $precio;
            $this->fechaCaducidad = $fechaCaducidad;
            $this->peso = $peso;
        }

        // Getters y Setters
        public function getNumProductos () {
            return self::$num_productos;
        }

        // Destructor
        public function __destruct() {
            self::__destruct();
        }
    }
?>