<?php
class Modules_trabajosdegrado_Model_HistoricoEstados{
    private $_codhistoricoestado;           //serial PRIMARY KEY
    private $_codestado;                    //integer NOT NULL, FOREIGN KEY REFERENCES estadostrabajogrado
    private $_codproyectogrado;             //integer NOT NULL, FOREIGN KEY REFERENCES proyectosgrado
    private $_fecha;                        //date NOT NULL
    private $_comentarioestado;             //text NOT NULL
    
public function __construct() {}

public function set_codhistoricoestado($value){$this->_codhistoricoestado = $value;}
public function set_codestado($value){$this->_codestado = $value;}
public function set_codproyectogrado($value){$this->_codproyectogrado = $value;}
public function set_fecha($value){$this->_fecha = $value;}
public function set_comentarioestado($value){$this->_comentarioestado = $value;}

public function get_codhistoricoestado(){return $this->_codhistoricoestado;}
public function get_codestado(){return $this->_codestado;}
public function get_codproyectogrado(){return $this->_codproyectogrado;}
public function get_fecha(){return $this->_fecha;}
public function get_comentarioestado(){return $this->_comentarioestado;}

}//End class
?>
