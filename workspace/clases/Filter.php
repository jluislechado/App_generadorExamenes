<?php
class Filter {
    
    static function isEmail($valor){
        return filter_var($valor, FILTER_VALIDATE_EMAIL);
    }
    
    static function isNumber($valor){
        filter_var($valor, FILTER_VALIDATE_INT);
    }
    
    
    static function isFloat($valor){
        filter_var($valor, FILTER_VALIDATE_FLOAT);
    }
    
    
    static function isIp($valor){
        filter_var($valor, FILTER_VALIDATE_IP);
    }
    
    static function isUrl($valor){
        filter_var($valor, FILTER_VALIDATE_URL);
    }
    
    static function isMinLength($valor, $longitud){
        return strlen($valor) >= $longitud;
    }
    
    static function isMaxLength($valor, $longitud){
        return strlen($valor) <= $longitud;
    }
    
    static function isLogin($valor){
       /*  if(preg_match('/^[A-Za-z][A-Za-z0-9]{5,9}$/', $valor));{
             return true;
         }
         return false;*/
         return preg_match('/^[A-Za-z][A-Za-z0-9]{5,9}$/', $valor);
    }
    
    static function validarAsignatura(Asignatura $asignatura){
        $nombre=$asignatura->getNombre();
        $longitud=25;
        if($nombre!=''){
            return Filter::isMaxLength($nombre, $longitud);
        }
        return 'vacio';
    }
    static function validarAsignaturam(Asignatura $asignatura){
        $nombre=$asignatura->getNombre();
        $longitud=25;
        if($nombre!=''){
            return Filter::isMaxLength($nombre, $longitud);
        }
        return false;
    }
    
    static function validarTema(Tema $tema){
        $nombre=$tema->getNombre();
        $longitud=25;
        if($nombre!=''){
            $longitudCorrecta= Filter::isMaxLength($nombre, $longitud);
            $bd=new DataBase();
            $gestor=new ManageAsignatura($bd);
            if($gestor->get($tema->getCodA())!=null){
                $codigoTema=true;
            }else{
                $codigoTema=false;
            }
            if($longitudCorrecta&&$codigoTema){
                return true;
            }
            if(!$longitudCorrecta){
                return false;
            }
            if(!codigoTema){
                return false;
            }
        }
        return 'vacio';
    }
    
    static function validarEjercicio(Ejercicio $ejercicio){
        $enunciado=$ejercicio->getEnunciado();
        $solucion=$ejercicio->getSolucion();
        $dificultad=$ejercicio->getDificultad();
        $longitud=400;
        if($enunciado!=''&&$solucion!=''&&$dificultad!=''){
            if(Filter::isMaxLength($enunciado, $longitud)&&Filter::isMaxLength($solucion, $longitud)&&($dificultad=='baja'||$dificultad=='media'||$dificultad=='alta')){
                return true;
            }else{
                return false;
            }
        }  else {
            return 'vacio';
        }
    }
    
    static function validarEjercicioUsuario(Ejercicio $ejercicio){
        $enunciado=$ejercicio->getEnunciado();
        $solucion=$ejercicio->getSolucion();
        $dificultad=$ejercicio->getDificultad();
        $longitud=400;
        if($enunciado!=''&&$solucion!=''&&$dificultad!=''){
            if(Filter::isMaxLength($enunciado, $longitud)&&Filter::isMaxLength($solucion, $longitud)&&($dificultad=='baja'||$dificultad=='media'||$dificultad=='alta')){
                return true;
            }else{
                return false;
            }
        }  else {
            return false;
        }
    }
}
