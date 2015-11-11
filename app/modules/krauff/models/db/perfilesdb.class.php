<?php

class Modules_Krauff_ModelDb_PerfilesDb extends Moon2_DBmanager_PDO {

    public function __construct() {
        parent::__construct();
        $this->_Pkey["value"] = 0;
        $this->_table = "perfiles";
        $this->_Pkey["key"] = "codperfil";
        $this->_sequence = $this->_table . "_" . $this->_Pkey["key"] . "_seq";
    }

    public function load_all(&$rsNumRows, $limit_numrows, $page, $Data = array()) {
        $Fields = "p.codperfil, p.nombreperfil ";
        $From = "FROM {$this->_table} p ";
//CUando es con algo quemado
//        $Where = " WHERE p.codperfil = 1 ";
//        $Where.= $this->get_where($Data["search"], "AND");
        
        //Cuando no necesita nada quemado
        $Where = $this->get_where($Data["search"]);

        $Order = " ORDER BY " . $Data["order"] . " ASC";

        $sql_count = "SELECT count(*) ";
        $sql_count.= $From;
        $sql_count.= $Where." ";
        $rsNumRows = $this->GetOne($sql_count);
        
        $sql_full = "SELECT {$Fields}";
        $sql_full.= $From;
        $sql_full.= $Where." ";
        $sql_full.= $Order;
        $arr = $this->SelectLimit($sql_full, $limit_numrows, $page);
        return $arr;
    }

    public function comboperfiles() {
        $sql = "SELECT codperfil, nombreperfil ";
        $sql.= "FROM perfiles ";
        $sql.= "WHERE codperfil IN(1,2)";
        $funcArray = $this->GetAssoc($sql);
        return $funcArray;
    }

}

//End class
?>