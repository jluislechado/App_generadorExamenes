<?php

class Tema {
    private $codT;
    private $nombre;
    private $codA;
    
    function __construct($codT=null, $nombre=null, $codA=null) {
        $this->codT = $codT;
        $this->nombre = $nombre;
        $this->codA = $codA;
    }
    
    function getCodT() {
        return $this->codT;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getCodA() {
        return $this->codA;
    }

    function setCodT($codT) {
        $this->codT = $codT;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setCodA($codA) {
        $this->codA = $codA;
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
