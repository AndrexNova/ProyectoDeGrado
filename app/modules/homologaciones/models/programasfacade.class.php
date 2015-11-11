<?php

class Modules_Homologaciones_Model_ProgramasFacade implements Moon2_Interfaces_MandatoryModel {

    private $_programasDB;

    public function __construct() {
        $this->_programasDB = new Modules_Homologaciones_ModelDb_ProgramasDb();
    }

// START: Mandatory methods
    public function add($obj) {
        return $this->_programasDB->add_programa($obj);
    }

    public function update($obj) {
        return $this->_programasDB->update($obj);
    }

    public function delete($obj) {
        return $this->_programasDB->delete($obj);
    }

    public function loadOne($obj) {
        return $this->_programasDB->loadOne($obj);
    }

    public function add_searchField($key, $field) {
        return $this->_programasDB->add_searchField($key, $field);
    }

    public function load_all(&$rsNumRows, $limit_numrows, $page, $Data = array()) {
        return $this->_programasDB->load_all($rsNumRows, $limit_numrows, $page, $Data);
    }

    public function load_all_admin($rsNumRows, $limit_numrows, $page, $Data = array()) {
        return $this->_programasDB->load_all_admin($rsNumRows, $limit_numrows, $page, $Data);
    }

    public function parametros($idempresa, $impresionfactura, $tipopos) {
        return $this->_programasDB->parametros($idempresa, $impresionfactura, $tipopos);
    }

    public function comboprogramas($id_programa) {
        return $this->_programasDB->comboprogramas($id_programa);
    }

// END: Mandatory methods
// END: User-defined methods
}

//End class
?>