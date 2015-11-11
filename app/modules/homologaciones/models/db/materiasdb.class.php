<?php

class Modules_Homologaciones_ModelDb_MateriasDb extends Moon2_DBmanager_PDO {

    public function __construct() {
        parent::__construct();
        $this->_table = "materias";
        $this->_Pkey["key"] = "id_materia";
        $this->_Pkey["value"] = 0;
        $this->_sequence = $this->_table . "_" . $this->_Pkey['key'] . "_seq";
    }

    public function load_all(&$rsNumRows, $limit_numrows, $page, $Data = array()) {
        $Fields = "m.id_materia, m.nomenclatura, m.nombre, m.ponderacion, m.semestre, p.nombre as nombreprograma, m.estado ";
        $From = "FROM {$this->_table} m JOIN programas p ON p.id_programa = m.id_programa ";


        $Where = $this->get_where($Data["search"]);

        $Order = " ORDER BY " . $Data["order"] . " ASC";

        $sql_count = "SELECT count(*) ";
        $sql_count.= $From;
        $sql_count.= $Where . " ";
        $rsNumRows = $this->GetOne($sql_count);

        $sql_full = "SELECT {$Fields}";
        $sql_full.= $From;
        $sql_full.= $Where . " ";
        $sql_full.= $Order;
        $arr = $this->SelectLimit($sql_full, $limit_numrows, $page);
        return $arr;
    }
    
        public function load_all2($rsNumRows, $limit_numrows, $page,$id_programa, $Data) {
        $Fields = "m.id_materia, m.nomenclatura, m.nombre, m.ponderacion, m.semestre, p.nombre as nombreprograma, m.estado ";
        $From = "FROM {$this->_table} m JOIN programas p ON p.id_programa = m.id_programa ";
        $Where = "WHERE p.id_programa='$id_programa'";

        $Order = " ORDER BY " . $Data["order"] . " ASC";

    
        $sql_count = "SELECT count(*) ";
        $sql_count.= $From;
        $sql_count.= $Where . " ";
        
        $rsNumRows = $this->GetOne($sql_count);

        $sql_full = "SELECT {$Fields}";
        $sql_full.= $From;
        $sql_full.= $Where . " ";
        $sql_full.= $Order;
//        echo $sql_full;
//        exit();
        $arr = $this->SelectLimit($sql_full, $limit_numrows, $page);
        return $arr;
    }
    
    public function combomaterias() {
        $sql = "SELECT m.id_materia, m.nombre ";
        $sql.= "FROM materias m ";
        
        $funcArray = $this->GetAssoc($sql);
        return $funcArray;
    }

    
       public function combomaterias2($id_programa) {
        $sql = "SELECT m.id_materia, m.nombre ";
        $sql.= "FROM materias m where id_programa='".$id_programa."'";
        echo $sql;
        $funcArray = $this->GetAssoc($sql);
        return $funcArray;
    }
    
}

//End class
?>