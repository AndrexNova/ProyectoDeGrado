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
        
        $arr = $this->SelectLimit($sql_full, $limit_numrows, $page);
        return $arr;
    }
    
public function load_all3($rsNumRows, $limit_numrows, $page,$id_programa, $Data,$id_materia) {               
                
$sql_full=" select homologaciones.id_materia1 as mat1,homologaciones.id_materia2 as mat2, ";
$sql_full.=" materias.nomenclatura,materias.nombre ";
$sql_full.=" from programas join materias on programas.id_programa=materias.id_programa ";
$sql_full.=" join homologaciones on materias.id_materia=homologaciones.id_materia2 ";
$sql_full.=" where id_materia1='$id_materia' and programas.id_programa='$id_programa' ";
$sql_full.=" union all  ";
$sql_full.=" select homologaciones.id_materia2 as mat1,homologaciones.id_materia1 as mat2,materias.nomenclatura,materias.nombre ";
$sql_full.=" from programas join materias on programas.id_programa=materias.id_programa ";
$sql_full.=" join homologaciones on materias.id_materia=homologaciones.id_materia1 ";
$sql_full.=" where id_materia2='$id_materia' and programas.id_programa='$id_programa'";
         



$sql_count="select sum(cantidad) from (";
$sql_count.=" select count(*) ";
$sql_count.=" from programas join materias on programas.id_programa=materias.id_programa ";
$sql_count.=" join homologaciones on materias.id_materia=homologaciones.id_materia2 ";
$sql_count.=" where id_materia1='$id_materia' and programas.id_programa='$id_programa' ";
$sql_count.=" union all  ";
$sql_count.=" select count(*) ";
$sql_count.=" from programas join materias on programas.id_programa=materias.id_programa ";
$sql_count.=" join homologaciones on materias.id_materia=homologaciones.id_materia1 ";
$sql_count.=" where id_materia2='$id_materia' and programas.id_programa='$id_programa') as cantidad ";

$rsNumRows = $this->GetOne($sql_count);

       
        $arr = $this->SelectLimit($sql_full, $limit_numrows, $page);
//        var_dump($arr);
//        exit();
        
//          if(isset($arr)){
//        $arr[]='';
//        ksort($arr);
//        }
        
        
        return $arr;
    }
    
    public function combomaterias() {
        $sql = "SELECT m.id_materia, m.nombre ";
        $sql.= "FROM materias m ";
        
        $funcArray = $this->GetAssoc($sql);
        return $funcArray;
    }

    

    
}

//End class
?>