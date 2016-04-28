<?php

class Ejercicio {
    
    private $codE;
    private $enunciado;
    private $solucion;
    private $dificultad;
    private $codT;
    
    function __construct($codE=null, $enunciado=null, $solucion=null, $dificultad=null, $codT=null) {
        $this->codE = $codE;
        $this->enunciado = $enunciado;
        $this->solucion = $solucion;
        $this->dificultad = $dificultad;
        $this->codT = $codT;
    }
    
    function getCodE() {
        return $this->codE;
    }

    function getEnunciado() {
        return $this->enunciado;
    }

    function getSolucion() {
        return $this->solucion;
    }

    function getDificultad() {
        return $this->dificultad;
    }

    function getCodT() {
        return $this->codT;
    }

    function setCodE($codE) {
        $this->codE = $codE;
    }

    function setEnunciado($enunciado) {
        $this->enunciado = $enunciado;
    }

    function setSolucion($solucion) {
        $this->solucion = $solucion;
    }

    function setDificultad($dificultad) {
        $this->dificultad = $dificultad;
    }

    function setCodT($codT) {
        $this->codT = $codT;
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
