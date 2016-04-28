<?php


class Asignatura {
    private $codA;
    private $nombre;
    
    function __construct($codA=null, $nombre=null) {
        $this->codA = $codA;
        $this->nombre = $nombre;
    }

    function getCodA() {
        return $this->codA;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setCodA($codA) {
        $this->codA = $codA;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getJson(){
        $r = '{';
        foreach ($this as $indice => $valor) {
            $r .= '"' .$indice . '":"' .$valor. '",';
        }
        $r = substr($r, 0,-1);
        $r .='}';
        return $r;
    }
    
    function set($valores, $inicio=0){
        $i = 0;
        foreach ($this as $indice => $valor) {
           $this->$indice = $valores[$i+$inicio];
           $i++;
        }
    }
    
    public function __toString() {
        $r ='';
        foreach ($this as $key => $valor) { 
            $r .= "$valor ";
        }
        return $r;
    }
}
