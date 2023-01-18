<?php
    include 'iInventario.php';

    class Inventario implements iInventario {
        // Atributos
        private $nombre;
        private $productos;

        // Metodos

        // Constructor
        public function __construct($nombre) {
            $this->productos = array();
            $this->setNombre($nombre);
        }

        public function setNombre($n) {
            $this->nombre = $n;
        }
        
        public function agregarProducto(Producto $p) {
            array_push($this->productos, $p);
        }
        
        public function eliminarProducto(Producto $p) {
            array_splice($this->productos, 1 ,1);
        }
    }
?>