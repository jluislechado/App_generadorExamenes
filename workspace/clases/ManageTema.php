<?php


class ManageTema {
    
    private $bd = null;
    private $tabla = "tema";
    
    function __construct(DataBase $bd) {
        $this->bd = $bd;
    }
    
    function get($codT){
        //devuelve un objeto de la clase asignatura
        $parametros = array();
        $parametros['codT'] = $codT;
        $this->bd->select($this->tabla, "*", "codT=:codT", $parametros);
        $fila=$this->bd->getRow();
        $tema = new Tema();
        $tema->set($fila);
        return $tema;
    }
    
    function getPorAsignatura($codA){
        //devuelve un objeto de la clase asignatura
        $parametros = array();
        $parametros['codA'] = $codA;
        $this->bd->select($this->tabla, "*", "codA=:codA", $parametros);
        $fila=$this->bd->getRow();
        $tema = new Tema();
        $tema->set($fila);
        return $tema;
    }
    
    function delete($codT){
        $parametros = array();
        $parametros['codT'] = $codT;
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function deleteTemas($parametros){
        return $this->bd->delete($this->tabla, $parametros);
    }
    
    function erase(Tema $tema){
        return $this->delete($tema->getID());
    }
    
    function set(Tema $tema){
        $parametrosSet=array();
        $parametrosSet['nombre']=$tema->getNombre();
        //$parametrosSet['codA']=$tema->getCodA();
        $parametrosWhere = array();
        $parametrosWhere['codT'] = $tema->getCodT();
        return $this->bd->update($this->tabla, $parametrosSet, $parametrosWhere);
    }
    
    function insert(Tema $tema){
        $parametrosSet=array();
        $parametrosSet['nombre']=$tema->getNombre();
        $parametrosSet['codA']=$tema->getCodA();
        return $this->bd->insert($this->tabla, $parametrosSet);
    }
    
    function getList($pagina=1, $nrpp=Constant::NRPP){
         $registroInicial = ($pagina-1)*$nrpp;
         $this->bd->select($this->tabla, "*", "1=1", array(), "codA, nombre", "$registroInicial, $nrpp");
         $r=array();
         while($fila =$this->bd->getRow()){
             $tema = new Tema();
             $tema->set($fila);
             $r[]=$tema;
         }
         return $r;
    }
    
 
    
    function getValuesSelect(){
        $this->bd->query($this->tabla, "codT, nombre", array(), "nombre");
        $array = array();
        while($fila=$this->bd->getRow()){
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }
    
    function etiquetaSelect($condicion){
        $this->bd->select($this->tabla, "*", $condicion, array(), "codA, nombre");
        $array = array();
        while($fila=$this->bd->getRow()){
            $array[$fila[0]] = $fila[1];
        }
        return $array;
    }
    
    function etiquetaSelect2($condicion){
        $this->bd->select($this->tabla, "*", $condicion, array(), "codA, nombre");
        $array = array();
        $i=0;
        while($fila=$this->bd->getRow()){
            $array[$i] = $fila[0];
            $i++;
        }
        return $array;
    }
    
    
    function count($condicion="1 = 1", $parametros = array()){
        return $this->bd->count($this->tabla, $condicion, $parametros);
    }
}
