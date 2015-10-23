<?php
class Modules_trabajosdegrado_Model_Usuproyectogrado{
    private $_codrelproyusu;                //serial PRIMARY KEY
    private $_creditosaprobados;
    private $_codusuario;                   //integer NOT NULL, FOREIGN KEY REFERENCES usuarios
    private $_codproyectogrado;             //integer NOT NULL, FOREIGN KEY REFERENCES proyectosgrado
    private $_tipoasignacion;               //int2 NOT NULL DEFAULT 5
    private $_finproceso;    
    
public function __construct() {}

public function set_codrelproyusu($value){$this->_codrelproyusu = $value;}
public function set_codusuario($value){$this->_codusuario = $value;}
public function set_codproyectogrado($value){$this->_codproyectogrado = $value;}
public function set_tipoasignacion($value){$this->_tipoasignacion = $value;}
public function set_creditosaprobados($value){$this->_creditosaprobados = $value;}
public function set_finproceso($value){$this->_finproceso = $value;}



public function get_finproceso(){return $this->_finproceso;}
public function get_codrelproyusu(){return $this->_codrelproyusu;}
public function get_codusuario(){return $this->_codusuario;}
public function get_codproyectogrado(){return $this->_codproyectogrado;}
public function get_tipoasignacion(){return $this->_tipoasignacion;}
public function get_creditosaprobados(){return $this->_creditosaprobados;}

}//End class
?>