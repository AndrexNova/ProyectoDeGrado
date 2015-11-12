<?php

class Modules_Homologaciones_ModelDb_ProgramasDb extends Moon2_DBmanager_PDO {

    public function __construct() {
        parent::__construct();
        $this->_table = "programas";
        $this->_Pkey["key"] = "id_programa";
        $this->_Pkey["value"] = 0;
        $this->_sequence = $this->_table . "_" . $this->_Pkey['key'] . "_seq";
    }

//    public function load_all(&$rsNumRows, $limit_numrows, $page, $Data = array()) {
//        $combo_campos = $Data["nomcampos"];
//        $caja_busqueda = $Data["buscar"];
//        $From = "FROM {$this->_table} e";
//        $where = $this->get_where($Data["search"]);
//        $order = " ORDER BY " . $Data["order"] . " ASC";
//
//        if (empty($caja_campos) && empty($caja_busqueda)) {
//            $sql = "SELECT p.id_programa, p.nombre, p.facultad, p.nivel, p.snies ";
//            $sql.= "FROM programas p ";
//            //$sql.= "WHERE p.id_programa = {$this->_DOM["PROGRAMA_ID"]}";
//            $sql.= $order;
//            $arr = $this->SelectLimit($sql, $limit_numrows, $page);
//            return $arr;
//        } 
//    }  
    
    
        public function load_all(&$rsNumRows, $limit_numrows, $page, $Data = array()) {
        $Fields = "p.id_programa, p.nombre, p.facultad, p.nivel, p.snies ";
        $From = "FROM {$this->_table} p ";

        
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
    
    public function comboprogramas($id_programa) {
        
            $sql = "SELECT id_programa, nombre ";
            $sql.= "FROM programas where id_programa ='$id_programa'";
            $sql.= " UNION ALL ";
            $sql.= "SELECT id_programa, nombre ";
            $sql.= "FROM programas where id_programa != '$id_programa'";
            $funcArray = $this->GetAssoc($sql);
            
        if(!$id_programa){
        $funcArray['000']='';
        ksort($funcArray);
        }
        return $funcArray;
    }
    
    
        
    public function comboprogramas2($id_programa) {
        
            $sql = "SELECT id_programa, nombre ";
            $sql.= "FROM programas where id_programa ='$id_programa'";
            $sql.= " UNION ALL ";
            $sql.= "SELECT id_programa, nombre ";
            $sql.= "FROM programas where id_programa != '$id_programa'";
            $funcArray = $this->GetAssoc($sql);
            
        if(!$id_programa){
        $funcArray['000']='';
        ksort($funcArray);
        }
        return $funcArray;
    }
    
}//End class
?>