<?php

class Modules_Homologaciones_Model_MateriasFacade implements Moon2_Interfaces_MandatoryModel {

    private $_materiasDB;

    public function __construct() {
        $this->_materiasDB = new Modules_Homologaciones_ModelDb_MateriasDb();
    }

// START: Mandatory methods
    public function add($obj) {
        return $this->_materiasDB->add_materia($obj);
    }

    public function update($obj) {
        return $this->_materiasDB->update($obj);
    }

    public function delete($obj) {
        return $this->_materiasDB->delete($obj);
    }

    public function loadOne($obj) {
        return $this->_materiasDB->loadOne($obj);
    }

    public function add_searchField($key, $field) {
        return $this->_materiasDB->add_searchField($key, $field);
    }

    public function load_all(&$rsNumRows, $limit_numrows, $page, $Data = array()) {
        return $this->_materiasDB->load_all($rsNumRows, $limit_numrows, $page, $Data);
    }
    
        public function load_all2(&$rsNumRows, $limit_numrows, $page, $id_programa, $Data = array()) {
        return $this->_materiasDB->load_all2($rsNumRows, $limit_numrows, $page,$id_programa, $Data);
    }

    public function load_all_admin($rsNumRows, $limit_numrows, $page, $Data = array()) {
        return $this->_materiasDB->load_all_admin($rsNumRows, $limit_numrows, $page, $Data);
    }

    public function parametros($idempresa, $impresionfactura, $tipopos) {
        return $this->_materiasDB->parametros($idempresa, $impresionfactura, $tipopos);
    }
    
    public function combomaterias() {
        return $this->_materiasDB->combomaterias();
    }

    public function combomaterias2($id_programa) {
        return $this->_materiasDB->combomaterias2($id_programa);
    }

    
// END: Mandatory methods
// END: User-defined methods
}

//End class
?>