<?php

class element{
    protected $id;
    protected $nombre;
    protected $foto;
    protected $bloqueado;
    protected $fechaCreacion;

    public function __construct($cId, $cNombre, $cFoto, $cBloqueado, $cFechaCreacion){
        $this->id = $cId;
        $this->nombre = $cNombre;
        $this->foto = $cfoto;
        $this->bloqueado = $cBloqueado;
        $this->fechaCreacion = $cFechaCreacion;
        }


    //METO GETTERS Y SETTERS POR SI ACASO, EN LA PIZARRA NO LO PIDIO (el correo que te mande)
    public function __set($var, $valor){
        if(property_exists(__CLASS__, $var)){
            $this->$var = $valor;
        }else{
            echo 'No existe el atributo $var'
        }
    }

    public function __get($var){
        if(property_exists(__CLASS__, $var)){
            return $this->$var;
        }
    }

}

?>