<?php
    include 'Producto.php';

    final class Zanahoria extends Producto {
        public static $num_zanahorias = 0;

        public function __construct($precio, $peso) {
            self::$num_zanahorias++;
            // $fechaCaducidad = fecha actual + 1 mes
            parent::__construct('Naranja', 'Zanahoria', $precio, 
                                date('YYYY-MM-DD', time()+30*24*60*60), $peso);
        }
    }
?>