<?php
class Modules_Trabajosdegrado_ModelDb_ProyectosGradoDb extends Moon2_DBmanager_PDO{

public function __construct(){
    parent::__construct();
    $this->_Pkey["value"] = 0;
    $this->_table = "proyectosgrado";
    $this->_Pkey["key"] = "codproyectogrado";
    $this->_sequence = $this->_table."_".$this->_Pkey["key"]."_seq";
}

public function porUsuario($codusuario){
    $parametros = array($codusuario);
    $sql = "SELECT pg.codproyectogrado,pg.codtema,pg.fechaestado,pg.codestado, ";
    $sql.= "upg.tipoasignacion, upg.creditosaprobados, upg.codrelproyusu,  ";
    $sql.= "(SELECT t.titulo from temas t WHERE t.codtema=pg.codtema) as titulo,";
    $sql.= "(SELECT estado from estadostrabajogrado WHERE codestado=pg.codestado) as estado,";
    $sql.= "(SELECT count(*) from consignaciones WHERE codproyectogrado=pg.codproyectogrado and codusuario= $codusuario) as cantrecibos ";
    $sql.= "FROM proyectosgrado pg LEFT JOIN usuproyectogrado upg ON pg.codproyectogrado=upg.codproyectogrado
         LEFT JOIN  temas t ON t.codtema = pg.codtema " ;   
    $sql.= "WHERE upg.codusuario = ?";
    $arr = $this->GetAll($sql, $parametros);
    return $arr;
}

public function traercodigodatos($codproyecto){

    $parameters = array($codproyecto);
   $sql = "SELECT codigo from datosproyecto WHERE codproyectogrado = ?" ;
   $arr= $this->GetOne($sql,$parameters);
   return $arr;
    
}

public function mostrarnombre ($codproyecto){
    $parameters = array($codproyecto);
    $sql = "SELECT pg.codproyectogrado, pg.codtema, pg.fechaestado, pg.codestado, pg.comentarioestado, pg.observaciones, ";
    $sql.= "upg.codrelproyusu, upg.codusuario, upg.creditosaprobados, upg.tipoasignacion, u.nombres ";
     $sql.= "FROM proyectosgrado pg INNER JOIN usuproyectogrado upg ON pg.codproyectogrado=upg.codproyectogrado INNER JOIN usuarios u ON upg.codusuario=u.codusuario ";
    $sql.= "WHERE upg.tipoasignacion = 5 and pg.codproyectogrado=?";
    
    $arr= $this->GetRow($sql,$parameters);

   return $arr;
}

public function busqUsuario($documento){
    $parametros = array($documento);
    $sql = "SELECT count(*) FROM usuarios WHERE documento = ?";
    $resultado = $this->GetOne($sql, $parametros);
    return $resultado;
}

public function obtenerUsuario($documento){
    $parametros = array($documento);
    $sql = "SELECT codusuario, documento, nombres,primerapellido,segundoapellido FROM usuarios WHERE documento = ?";
    $resultado = $this->GetRow($sql, $parametros);
    return $resultado;
}

public function agregarParticipante($tipoAsignacion, $documento, $codproyectogrado){
    $fin_proceso = 0;
    $creditos_aprobados = 0;
    $parametros = array($documento, $codproyectogrado, $creditos_aprobados, $tipoAsignacion, $fin_proceso);
    $sql = "INSERT INTO usuproyectogrado";
    $sql.= "(codusuario, codproyectogrado, creditosaprobados,tipoasignacion, finproceso) VALUES ";
    $sql.= "((SELECT codusuario FROM usuarios WHERE documento = ?), ?,?,?,?) ";
    $resultado = $this->ExecuteSql($sql,$parametros);
    
    return $resultado;
}

public function obtenerParticipantes($codproyectogrado, $codusuario){
    $parametros = array($codproyectogrado, $codusuario);
    $sql = "SELECT codusuario, documento, nombres, primerapellido, segundoapellido FROM usuarios WHERE codusuario IN (";
    $sql.= "SELECT codusuario from usuproyectogrado WHERE codproyectogrado = ? AND codusuario <> ?)";
    $resultado = $this->GetAll($sql, $parametros);
    return $resultado;
}


    
        
}//End class
?>