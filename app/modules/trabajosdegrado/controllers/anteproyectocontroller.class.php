<?php
class Modules_Trabajosdegrado_Controllers_AnteproyectoController{
    private $_dom;
    private $_url;
    private $_action;
    private $_parameters;
    private $_path_config;

public function __construct($parameters, $dom, $path_config){
    $this->_parameters = $parameters;
    $this->_action = $parameters->get_parameter("action","");
    $action = $this->_action;
    $rc = new ReflectionClass("Modules_Trabajosdegrado_Controllers_AnteproyectoController");
    if ($rc->hasMethod($this->_action)){
        $this->_dom = $dom; 
        $this->_path_config = $path_config;
        $this->$action();
    }else{
        $this->stop();
    }
}

private function stop(){
    $message = "Moon2 Message:<br/><span style=\"color:red;font-weight: bold\">".$this->_action."</span> ";
    $message.= "Controller not implemented in class <span style=\"color:red;font-weight: bold\">".get_class($this)."</span>";
    echo $message;
    $this->_parameters->show();
    header("Status: 400 Bad request", false, 400);
    exit();
}

public function getUrl(){
    return $this->_url;
}


private function adjuntaranteproyecto() {
        $archivo_procesar = $this->_parameters->get_parameter("anteproyecto", NULL);
        $tamanno_maximo = 5030000; //Un mega aproximadamente
        $Archivo = new Moon2_Files_FileManager();
        $Archivo->set_realName($archivo_procesar["name"]);
        $extension = strtolower($Archivo->get_extension());
        $tipos_permitidos = array("doc", "pdf", "docx");
        $Archivo->set_folder($this->_path_config["TRAGRA_ANTEPROYECTO"]);
        $this->_parameters->show();
        
        //Primero se valida el tipo de archivo
        if (!in_array($extension, $tipos_permitidos)) {
            $msg = 31;
        } else {
            //Segundo se valida el tamaño del archivo
            $tamanno_archivo = (int) $archivo_procesar["size"];
            if ($tamanno_archivo > $tamanno_maximo || $tamanno_archivo === 0) {
                $msg = 32;
            } else {
                //Tercero, se carga el archivo y luego si se procede a grabar en las tablas
                $msg = 33;
                if ($Archivo->loadFile($archivo_procesar)) {
                    $cod_proyectogrado = $this->_parameters->get_parameter("codproyectogrado", -1);
                                       
                    $obj_proyecto = new Modules_trabajosdegrado_Model_ProyectosGrado();
                    $FacadeProyectosg = new Modules_Trabajosdegrado_Model_ProyectosGradoFacade();
                    $obj_proyecto->set_codproyectogrado($cod_proyectogrado); 
                    
                    $obj_proyecto = $FacadeProyectosg->loadOne($obj_proyecto);                
                    $obj_proyecto->set_fechaestado(date("Y-m-d"));
                    $obj_proyecto->set_codestado(4);
                    $obj_proyecto->set_comentarioestado("Inició proceso comite de grado");
                    $FacadeProyectosg->update($obj_proyecto);
                    
                    $cod_documentosproyecto = $this->_parameters->get_parameter("codigo", -1);
                    $estado = $this->_parameters->get_parameter("estado", 1);
                    $obj_documentos = new Modules_trabajosdegrado_Model_DocumentosProyecto();
                    $FacadeDocumentos = new Modules_Trabajosdegrado_Model_DocumentosProyectoFacade();
                    $obj_documentos->set_codigo($cod_documentosproyecto); 
                    
                    $obj_documentos = $FacadeDocumentos->loadOne($obj_documentos);        
                    $obj_documentos->set_anteproyecto($Archivo->get_realName());                   
                    $obj_documentos->set_anteproyectocodificado($Archivo->get_hiddName());
                    $obj_documentos->set_tipo($Archivo->get_mimetype());
                    $obj_documentos->set_tamano($Archivo->get_size());
                    $obj_documentos->set_estado($estado);
                    $obj_documentos->set_codproyectogrado($cod_proyectogrado);
                    $FacadeDocumentos->add($obj_documentos);                                       

                    $codigo = $this->_parameters->get_parameter("codigo", "");
                    $objetivo = $this->_parameters->get_parameter("objetivo", "");
                    $resumen = $this->_parameters->get_parameter("tema", "");
                    $titulo = $this->_parameters->get_parameter("titulo", "");

                    $obj_datos = new Modules_Trabajosdegrado_Model_DatosProyecto();
                    $FacadeDatos = new Modules_Trabajosdegrado_Model_DatosProyectoFacade();

                    $obj_datos->set_codigo($codigo);
                    $obj_datos = $FacadeDatos->loadOne($obj_datos);

                    $obj_datos->set_objetivo($objetivo);
                    $obj_datos->set_resumen($resumen);
                    $obj_datos->set_titulo($titulo);

                    $FacadeDatos->update($obj_datos);


                    $obj_historico = new Modules_trabajosdegrado_Model_HistoricoEstados();
                    $obj_historico->set_codestado(4);
                    $obj_historico->set_codproyectogrado($cod_proyectogrado);
                    $obj_historico->set_fecha(date("Y-m-d"));
                    $obj_historico->set_comentarioestado("Inició proceso comite de grado");


                    $FacadeHistorico = New Modules_Trabajosdegrado_Model_HistoricoEstadosFacade();
                    $FacadeHistorico->add($obj_historico);
                }
            }
        }
  
        $pagina_retorno = "anteproyecto.php";
         $this->_parameters->delete_all();
    $this->_parameters->add("msg", $msg);
        $this->_parameters->add("codproyectogrado", $cod_proyectogrado);
        $cadenaUrl = $this->_parameters->KeyGen();
        $this->_url = $this->_path_config["ROOT"]["modules"] . "/trabajosdegrado/views/{$pagina_retorno}?" . $cadenaUrl;
        header("Location: {$this->_url}");
    }

    private function eliminarAnteproyecto(){
      $cod_proyectogrado = $this->_parameters->get_parameter("codproyectogrado", -1);
      $cod_documentosproyecto = $this->_parameters->get_parameter("codigo", -1);
     

    $msg = 14;
    $ante_pro = new Modules_trabajosdegrado_Model_DocumentosProyecto();
    $Facadedocumentos = new Modules_Trabajosdegrado_Model_DocumentosProyectoFacade();
    
    $ante_pro->set_codigo($cod_documentosproyecto);  
    $ante_pro = $Facadedocumentos->loadOne($ante_pro);
    $ante_pro->set_estado(0);
    $nombre_codificado = $ante_pro->get_anteproyectocodificado();
  
    if ($Facadedocumentos->update($ante_pro) == false){
        $msg = 34;
    }else{
        $Archivo = new Moon2_Files_FileManager();
        $Archivo->set_folder($this->_path_config["TRAGRA_ANTEPROYECTO"]);
        $Archivo->deleteFile($nombre_codificado);
    }
  
    $pagina_retorno = "anteproyecto.php";
    $this->_parameters->delete_all();
    $this->_parameters->add("msg", $msg);
    $this->_parameters->add("codproyectogrado", $cod_proyectogrado);
    $cadenaUrl = $this->_parameters->KeyGen();

    $this->_url = $this->_path_config["ROOT"]["modules"]."/trabajosdegrado/views/{$pagina_retorno}?".$cadenaUrl;
    header("Location: {$this->_url}");
}
private function descargaranteproyecto() {
    
  $cod_proyectogrado = $this->_parameters->get_parameter("codproyectogrado", -1);
   $cod_documentosproyecto = $this->_parameters->get_parameter("codigo", -1);
   
  $Archivo = new Moon2_Files_FileManager();
                    

   $obj_documentos = new Modules_trabajosdegrado_Model_DocumentosProyecto();
   $FacadeDocumentos = new Modules_Trabajosdegrado_Model_DocumentosProyectoFacade();
   $obj_documentos->set_codproyectogrado($cod_proyectogrado); 
   $obj_documentos->set_codigo($cod_documentosproyecto); 
                    
   $obj_documentos = $FacadeDocumentos->loadOne($obj_documentos);
   $nombre_archivo = $obj_documentos->get_anteproyecto();
   $ruta_fisica_completa = $this->_path_config["TRAGRA_ANTEPROYECTO"]."/".$obj_documentos->get_anteproyectocodificado();
   $tipo = $obj_documentos->get_tipo();
   $tamano = $obj_documentos->get_tamano();
   $Archivo->download($nombre_archivo, $ruta_fisica_completa, $tipo, $tamano);
    
                        
    
}

}
//End class
?>