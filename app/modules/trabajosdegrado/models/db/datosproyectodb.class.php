<?php

class Modules_Trabajosdegrado_ModelDb_DatosProyectoDb extends Moon2_DBmanager_PDO{

public function __construct(){
    parent::__construct();
    $this->_Pkey["value"] = 0;
    $this->_table = "datosproyecto";
    $this->_Pkey["key"] = "codigo";
    $this->_sequence = $this->_table."_".$this->_Pkey["key"]."_seq";

}

public function porProyecto($codproyecto){
    $parametros = array($codproyecto);
    $sql = "SELECT dp.codigo, dp.codproyectogrado, dp.fecha_solicitud, dp.nombre_empresa, dp.dependencia,  ";
    $sql.= "dp.asesor_practica, dp.cargoasesor, dp.direccion, dp.telefono, dp.director_monografia, dp.tipo_seminario, dp.tematica, ";
    $sql.= "dp.titulo,dp.resumen,dp.objetivo, pg.fechaestado, pg.codestado,  pg.comentarioestado, ";
    $sql.= "(SELECT nombremodalidad from modalidadesgrado WHERE codmodalidadgrado=pg.codmodalidadgrado) as nombremodalidad ";
    $sql.= "FROM proyectosgrado pg INNER JOIN datosproyecto dp ON pg.codproyectogrado=dp.codproyectogrado ";
    $sql.= "WHERE pg.codproyectogrado = ?";

    $arr = $this->GetAll($sql, $parametros);
    return $arr;
}


public function verificar(){
   
    $sql = "SELECT dp.codigo, dp.codproyectogrado, dp.fecha_solicitud, dp.nombre_empresa, dp.dependencia,  ";
    $sql.= "dp.asesor_practica, dp.cargoasesor, dp.direccion, dp.telefono,  dp.tipo_seminario, dp.tematica, ";
    $sql.= "dp.titulo, dp.resumen, dp.objetivo, pg.codestado, pg.comentarioestado, ";    
   $sql.= "(SELECT count(*) from usuproyectogrado WHERE codproyectogrado=pg.codproyectogrado and tipoasignacion= 5 or tipoasignacion= 7) as numestudiantes ";
    $sql.= "FROM proyectosgrado pg INNER JOIN datosproyecto dp ON pg.codproyectogrado=dp.codproyectogrado ";
    $sql.= "WHERE pg.codestado = 2";
    $arr = $this->GetAll($sql);
    return $arr;
}

public function VerificarProyecto($cod_proyecto){
    $parametros = array($cod_proyecto);
    $sql = "SELECT dp.codigo, dp.codproyectogrado, dp.fecha_solicitud, dp.nombre_empresa,  ";
    $sql.= "dp.asesor_practica, dp.cargoasesor, dp.direccion, dp.telefono, u.nombres, u.primerapellido, u.segundoapellido, u.documento, ";
    $sql.= "pg.fechaestado, pg.codestado,  pg.comentarioestado, upg.codusuario, upg.creditosaprobados, pg.observaciones, ";
    $sql.= "(SELECT nombremodalidad from modalidadesgrado WHERE codmodalidadgrado = pg.codmodalidadgrado) as nombremodalidad, ";
    $sql.= "(SELECT nombres ||primerapellido||segundoapellido from usuarios WHERE codusuario=upg.codusuario) as nombreestudiante ";
    $sql.= "FROM proyectosgrado pg INNER JOIN datosproyecto dp ON pg.codproyectogrado=dp.codproyectogrado ";
    $sql.= "INNER JOIN usuproyectogrado upg ON upg.codproyectogrado=pg.codproyectogrado INNER JOIN usuarios u on u.codusuario=upg.codusuario ";
    $sql.= "WHERE pg.codproyectogrado = ?";

    $arr = $this->GetAll($sql, $parametros);
    return $arr;
}

}

?>
