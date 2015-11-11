<?php

class Modules_Homologaciones_Model_Programas {

    private $_id_programa;                           //Serial, PK
    private $_nombre;                               //Varchar 200
    private $_facultad;                               //Varchar 200
    private $_nivel;                            //Varchar 200
    private $_snies;                               //Varchar 200
    
    
    
    function __construct() {}

    public function get_id_programa() {
        return $this->_id_programa;
    }

    public function get_nombre() {
        return $this->_nombre;
    }
    
     public function get_facultad() {
        return $this->_facultad;
    }

    public function get_nivel() {
        return $this->_nivel;
    }

    public function get_snies() {
        return $this->_snies;
    }



    public function set_id_programa($_id_programa) {
        $this->_id_programa = $_id_programa;
    }

    public function set_nombre($_nombre) {
        $this->_nombre = $_nombre;
    }
    
     public function set_facultad($_facultad) {
        $this->_facultad = $_facultad;
    }

    public function set_nivel($_nivel) {
        $this->_nivel = $_nivel;
    }

    public function set_snies($_snies) {
        $this->_snies = $_snies;
    }

}

//End class
?>