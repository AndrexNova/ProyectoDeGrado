<?php
class Modules_Trabajosdegrado_Model_ModalidadesGrado {
    private $_codmodalidadgrado;            //serial PRIMARY KEY
    private $_nombremodalidad;              //varchar(200) NOT NULL
    private $_valor;                        //float4 NOT NULL
    private $_asocompanero;    
    
public function __construct() {}

public function set_codmodalidadgrado($value){$this->_codmodalidadgrado = $value;}
public function set_nombremodalidad($value){$this->_nombremodalidad = $value;}
public function set_valor($value){$this->_valor = $value;}
public function set_asocompanero($value){$this->_asocompanero = $value;}

public function get_codmodalidadgrado(){return $this->_codmodalidadgrado;}
public function get_nombremodalidad(){return $this->_nombremodalidad;}
public function get_valor(){return $this->_valor;}
public function get_asocompanero(){return $this->_asocompanero;}

}//End class
?>