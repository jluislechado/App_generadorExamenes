<?php


class ManageEjercicio {
    
    private $bd = null;
    private $tabla = "ejercicio";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    
    function get($codE){
        //devuelve un objeto de la clase asignatura
        $parametros = array();
        $parametros['codE'] = $codE;
        $this->bd->select($this->tabla, "*", "codE=:codE", $parametros);
        $fila=$this->bd->getRow();
        $ejercicio = new Ejercicio();
        $ejercicio->set($fila);
        return $ejercicio;
    }
    
//    function getEjercicioPorTemaYdificultad($codT){
//        //devuelve un objeto de la clase asignatura
//        $parametros = array();
//        $parametros['codT'] = $codT;
//        $this->bd->select($this->tabla, "*", "codT=:codT", $parametros);
//        $r=array();
//         while($fila =$this->bd->getRow()){
//             $ejercicio = new Ejercicio();
//             $ejercicio->set($fila);
//             $r[]=$ejercicio;
//         }
//         return $r;
//    }
    
    function selectConCondiciones($condicion){
         $this->bd->select($this->tabla, "*", $condicion, array(), "codE");
         $r=array();
         while($fila =$this->bd->getRow()){
             $ejercicio = new Ejercicio();
             $ejercicio->set($fila);
             $r[]=$ejercicio;
         }
         return $r;
    }
    
    function delete($codE){
        $parametros = array();
        $parametros['codE'] = $codE;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function deleteEjercicios($parametros){
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function erase(Ejercicio $ejercicio){
        return $this->delete($ejercicio->getID());
    }
    
    function set(Ejercicio $ejercicio){
        $parametrosSet=array();
        $parametrosSet['enunciado']=$ejercicio->getEnunciado();
        $parametrosSet['solucion']=$ejercicio->getSolucion();
        $parametrosSet['dificultad']=$ejercicio->getDificultad();
        $parametrosSet['codT']=$ejercicio->getCodT();
        $parametrosWhere = array();
        $parametrosWhere['codE'] = $ejercicio->getCodE();
        return $this->bd->update($this->tabla, $parametrosSet, $parametrosWhere);
    }
    
    function insert(Ejercicio $ejercicio){
        $parametrosSet=array();
        $parametrosSet['enunciado']=$ejercicio->getEnunciado();
        $parametrosSet['solucion']=$ejercicio->getSolucion();
        $parametrosSet['dificultad']=$ejercicio->getDificultad();
        $parametrosSet['codT']=$ejercicio->getCodT();
        return $this->bd->insert($this->tabla, $parametrosSet);
    }
    
    function getList($pagina=1, $nrpp=Constant::NRPP){
         $registroInicial = ($pagina-1)*$nrpp;
         $this->bd->select($this->tabla, "*", "1=1", array(), "codE", "$registroInicial, $nrpp");
         $r=array();
         while($fila =$this->bd->getRow()){
             $ejercicio = new Ejercicio();
             $ejercicio->set($fila);
             $r[]=$ejercicio;
         }
         return $r;
    }
    
    function getValuesSelect(){
        $this->bd->query($this->tabla, "codE, enunciado", array(), "codE");
        $array = array();
        while($fila=$this->bd->getRow()){
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }
    
    function count($condicion="1 = 1", $parametros = array()){
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }
}
