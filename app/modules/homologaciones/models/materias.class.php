<?php

class Modules_Homologaciones_Model_Materias {

    private $_id_materia;                           //Serial, PK
    private $_nomenclatura;                               //Varchar 200
    private $_nombre;                               //Varchar 200
    private $_ponderacion;                            //Varchar 200
    private $_semestre;                               //Varchar 200
    private $_id_programa;                               //Varchar 200
    private $_estado;                               //Varchar 200

    function __construct() {
        
    }

    public function get_id_materia() {
        return $this->_id_materia;
    }

    public function get_nomenclatura() {
        return $this->_nomenclatura;
    }

    public function get_nombre() {
        return $this->_nombre;
    }

    public function get_ponderacion() {
        return $this->_ponderacion;
    }

    public function get_semestre() {
        return $this->_semestre;
    }

    public function get_id_programa() {
        return $this->_id_programa;
    }

    public function get_estado() {
        return $this->_estado;
    }

    
    
    public function set_id_materia($_id_materia) {
        $this->_id_materia = $_id_materia;
    }

    public function set_nomenclatura($_nomenclatura) {
        $this->_nomenclatura = $_nomenclatura;
    }

    public function set_nombre($_nombre) {
        $this->_nombre = $_nombre;
    }

    public function set_ponderacion($_ponderacion) {
        $this->_ponderacion = $_ponderacion;
    }

    public function set_semestre($_semestre) {
        $this->_semestre = $_semestre;
    }

    public function set_id_programa($_id_programa) {
        $this->_id_programa = $_id_programa;
    }

    public function set_estado($_estado) {
        $this->_estado = $_estado;
    }

}

//End class
?>