<?php

class Modules_Trabajosdegrado_Model_DatosProyecto {

    private $_codigo;              //serial PRIMARY KEY           
    private $_codproyectogrado;                //varchar(200) NOT NULL
    private $_fecha_solicitud;                      //varchar(20) NOT NULL
    private $_nombre_empresa;                  //text NOT NULL
    private $_dependencia;            //varchar(100) NOT NULL
    private $_asesor_practica;                         //varchar(100) NOT NULL
    private $_direccion;                      //varchar(30) NOT NULL
    private $_telefono;            //varchar(100) NOT NULL
    private $_tematica;                         //varchar(100) NOT NULL
    private $_director_monografia;
    private $_tipo_seminario;                         //varchar(100) NOT NULL 
    private $_cargoasesor;
    private $_titulo;                           //text
    private $_resumen;                          //text
    private $_objetivo;     //text NOT NULL

    public function __construct() {
        
    }

    public function get_codigo() {
        return $this->_codigo;
    }

    public function set_codigo($_codigo) {
        $this->_codigo = $_codigo;
    }

    public function get_codproyectogrado() {
        return $this->_codproyectogrado;
    }

    public function set_codproyectogrado($_codproyectogrado) {
        $this->_codproyectogrado = $_codproyectogrado;
    }

    public function get_fecha_solicitud() {
        return $this->_fecha_solicitud;
    }

    public function set_fecha_solicitud($_fecha_solicitud) {
        $this->_fecha_solicitud = $_fecha_solicitud;
    }

    public function get_nombre_empresa() {
        return $this->_nombre_empresa;
    }

    public function set_nombre_empresa($_nombre_empresa) {
        $this->_nombre_empresa = $_nombre_empresa;
    }

    public function get_dependencia() {
        return $this->_dependencia;
    }

    public function set_dependencia($_dependencia) {
        $this->_dependencia = $_dependencia;
    }

    public function get_asesor_practica() {
        return $this->_asesor_practica;
    }

    public function set_asesor_practica($_asesor_practica) {
        $this->_asesor_practica = $_asesor_practica;
    }

    public function get_direccion() {
        return $this->_direccion;
    }

    public function set_direccion($_direccion) {
        $this->_direccion = $_direccion;
    }

    public function get_telefono() {
        return $this->_telefono;
    }

    public function set_telefono($_telefono) {
        $this->_telefono = $_telefono;
    }

    public function get_tematica() {
        return $this->_tematica;
    }

    public function set_tematica($_tematica) {
        $this->_tematica = $_tematica;
    }

    public function get_director_monografia() {
        return $this->_director_monografia;
    }

    public function set_director_monografia($_director_monografia) {
        $this->_director_monografia = $_director_monografia;
    }

    public function get_tipo_seminario() {
        return $this->_tipo_seminario;
    }

    public function set_tipo_seminario($_tipo_seminario) {
        $this->_tipo_seminario = $_tipo_seminario;
    }

    public function get_cargoasesor() {
        return $this->_cargoasesor;
    }

    public function set_cargoasesor($_cargoasesor) {
        $this->_cargoasesor = $_cargoasesor;
    }

    public function get_titulo() {
        return $this->_titulo;
    }

    public function set_titulo($_titulo) {
        $this->_titulo = $_titulo;
    }

    public function get_resumen() {
        return $this->_resumen;
    }

    public function set_resumen($_resumen) {
        $this->_resumen = $_resumen;
    }

    public function get_objetivo() {
        return $this->_objetivo;
    }

    public function set_objetivo($_objetivo) {
        $this->_objetivo = $_objetivo;
    }

}

//End class
?>
