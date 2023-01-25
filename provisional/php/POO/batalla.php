<?php

class Batalla{
    protected $id;
    protected $idElemento1;
    protected $idElemento2;
    protected $votosElemento1;
    protected $votosElemento2;
    protected $fechaCreacion;
    protected $idCreador;

    public function __construct($cId, $cIdElemento1, $cIdElemento2, $cVotosElemento1, $cVotosElemento2, $cFechaCreacion, $cIdCreador){
        $this->id = $cId;
        $this->idElemento1 = $cIdElemento1;
        $this->idElemento2 = $cIdElemento2;
        $this->votosElemento1 = $cVotosElemento1;
        $this->votosElemento2 = $cVotosElemento2;
        $this->fechaCreacion = $cFechaCreacion;
        $this->idCreador = $cIdCreador;
    }
}

?>