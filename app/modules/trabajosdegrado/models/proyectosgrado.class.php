<?php
class Modules_trabajosdegrado_Model_ProyectosGrado {
    private $_codproyectogrado;                 //serial PRIMARY KEY
    private $_codtema;               //integer NOT NULL, FOREIGN KEY REFERENCES temas
    private $_fechaestado;                      //date NOT NULL
    private $_codestado;                        //codestado smallint NOT NULL
    private $_comentarioestado;  
    private $_observaciones; 
   
    
public function __construct() {}

public function set_codproyectogrado($value){$this->_codproyectogrado = $value;}
public function set_codtema($value){$this->_codtema = $value;}
public function set_fechaestado($value){$this->_fechaestado = $value;}
public function set_codestado($value){$this->_codestado = $value;}
public function set_comentarioestado($value){$this->_comentarioestado = $value;}
public function set_observaciones($value){$this->_observaciones = $value;}

public function get_codproyectogrado(){return $this->_codproyectogrado;}
public function get_codtema(){return $this->_codtema;}
public function get_fechaestado(){return $this->_fechaestado;}
public function get_codestado(){return $this->_codestado;}
public function get_comentarioestado(){return $this->_comentarioestado;}
public function get_observaciones(){return $this->_observaciones;}



}//End class
?>