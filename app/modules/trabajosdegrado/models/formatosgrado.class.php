<?php
class Modules_Trabajosdegrado_Model_FormatosGrado {
    private $_codformato;                   //serial PRIMARY KEY
    private $_nombreformato;                //varchar(200) NOT NULL
    private $_version;                      //varchar(20) NOT NULL
    private $_descripcion;                  //text NOT NULL
    private $_formatocodificado;            //varchar(100) NOT NULL
    private $_tipo;                         //varchar(100) NOT NULL
    private $_tamanno;                      //varchar(30) NOT NULL
    
public function __construct() {}

public function set_codformato($value){$this->_codformato = $value;}
public function set_nombreformato($value){$this->_nombreformato = $value;}
public function set_version($value){$this->_version = $value;}
public function set_descripcion($value){$this->_descripcion = $value;}
public function set_formatocodificado($value){$this->_formatocodificado = $value;}
public function set_tipo($value){$this->_tipo = $value;}
public function set_tamanno($value){$this->_tamanno = $value;}

public function get_codformato(){return $this->_codformato;}
public function get_nombreformato(){return $this->_nombreformato;}
public function get_version(){return $this->_version;}
public function get_descripcion(){return $this->_descripcion;}
public function get_formatocodificado(){return $this->_formatocodificado;}
public function get_tipo(){return $this->_tipo;}
public function get_tamanno(){return $this->_tamanno;}

}//End class
?>