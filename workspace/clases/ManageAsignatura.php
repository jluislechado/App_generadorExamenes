<?php


class ManageAsignatura {
    
    private $bd = null;
    private $tabla = "asignatura";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    
    function get($codA){
        //devuelve un objeto de la clase asignatura
        $parametros = array();
        $parametros['codA'] = $codA;
        $this->bd->select($this->tabla, "*", "codA=:codA", $parametros);
        $fila=$this->bd->getRow();
        $asignatura = new Asignatura();
        $asignatura->set($fila);
        return $asignatura;
    }
    
    function delete($codA){
        $parametros = array();
        $parametros['codA'] = $codA;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function deleteAsignaturas($parametros){
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function erase(Asignatura $asignatura){
        return $this->delete($asignatura->getCodA());
    }
    
    function set(Asignatura $asignatura){
        $parametrosSet=array();
        $parametrosSet['nombre']=$asignatura->getNombre();        
        $parametrosWhere = array();
        $parametrosWhere['codA'] = $asignatura->getCodA();
        return $this->bd->update($this->tabla, $parametrosSet, $parametrosWhere);
    }
    
    function insert(Asignatura $asignatura){
        $parametrosSet=array();
        $parametrosSet['nombre']=$asignatura->getNombre();
        return $this->bd->insert($this->tabla, $parametrosSet);
    }
    
    function getList($pagina=1, $nrpp=Constant::NRPP){
         $registroInicial = ($pagina-1)*$nrpp;
         $this->bd->select($this->tabla, "*", "1=1", array(), "nombre", "$registroInicial, $nrpp");
         $r=array();
         while($fila =$this->bd->getRow()){
             $asignatura = new Asignatura();
             $asignatura->set($fila);
             $r[]=$asignatura;
         }
         return $r;
    }
    
    function getValuesSelect(){
        $this->bd->query($this->tabla, "codA, nombre", array(), "nombre");
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
