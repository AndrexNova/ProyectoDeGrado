<?php
class Modules_trabajosdegrado_Model_Consignaciones {
    private $_codconsignacion;                  //serial PRIMARY KEY
    private $_codproyectogrado;                 //integer NOT NULL, FOREIGN KEY REFERENCES proyectosgrado
    private$_codusuario;
    private $_nombreconsignacion;               //varchar(100) NOT NULL
    private $_nombrecodificado;                 //varchar(100) NOT NULL
    private $_tipo;                             //varchar(50) NOT NULL
    private $_tamanno;                          //varchar(100) NOT NULL
    private $_fecha;                            //date NOT NULL
    private $_valor;                            //float4 NOT NULL
    private $_numero;                           //varchar(50) NOT NULL
    
public function __construct() {}

public function set_codconsignacion($value){$this->_codconsignacion = $value;}
public function set_codproyectogrado($value){$this->_codproyectogrado = $value;}
public function set_codusuario ($value){$this->_codusuario = $value;}
public function set_nombreconsignacion($value){$this->_nombreconsignacion = $value;}
public function set_nombrecodificado($value){$this->_nombrecodificado = $value;}
public function set_tipo($value){$this->_tipo = $value;}
public function set_tamanno($value){$this->_tamanno = $value;}
public function set_fecha($value){$this->_fecha = $value;}
public function set_valor($value){$this->_valor = $value;}
public function set_numero($value){$this->_numero = $value;}

public function get_codconsignacion(){return $this->_codconsignacion;}
public function get_codproyectogrado(){return $this->_codproyectogrado;}
public function get_codusuario(){return $this->_codusuario;}
public function get_nombreconsignacion(){return $this->_nombreconsignacion;}
public function get_nombrecodificado(){return $this->_nombrecodificado;}
public function get_tipo(){return $this->_tipo;}
public function get_tamanno(){return $this->_tamanno;}
public function get_fecha(){return $this->_fecha;}
public function get_valor(){return $this->_valor;}
public function get_numero(){return $this->_numero;}

}//End class
?>