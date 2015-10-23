<?php
class Modules_trabajosdegrado_Model_DocumentosProyecto {
    private $_codigo; 
    private $_codproyectogrado;                 //serial PRIMARY KEY                   
    private $_estado;                        //codestado smallint NOT NULL   
    private $_anteproyecto; 
    private $_anteproyectocodificado; 
    private $_tipo; 
    private $_tamano; 
    
public function __construct() {}

public function set_codigo($value){$this->_codigo = $value;}
public function set_codproyectogrado($value){$this->_codproyectogrado = $value;}
public function set_estado($value){$this->_estado = $value;}
public function set_anteproyecto($value){$this->_anteproyecto = $value;}
public function set_anteproyectocodificado($value){$this->_anteproyectocodificado = $value;}
public function set_tipo($value){$this->_tipo = $value;}
public function set_tamano($value){$this->_tamano = $value;}

public function get_codigo(){return $this->_codigo;}
public function get_codproyectogrado(){return $this->_codproyectogrado;}
public function get_estado(){return $this->_estado;}
public function get_anteproyecto(){  return $this->_anteproyecto;}
public function get_anteproyectocodificado(){return $this->_anteproyectocodificado;}
public function get_tipo(){return $this->_tipo;}
public function get_tamano(){return $this->_tamano;}



}//End class
?>
