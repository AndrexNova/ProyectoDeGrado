<?php
class Modules_Trabajosdegrado_Controllers_DatosProyectoController{
    private $_dom;
    private $_url;
    private $_action;
    private $_parameters;
    private $_path_config;

public function __construct($parameters, $dom, $path_config){
    $this->_parameters = $parameters;
    $this->_action = $parameters->get_parameter("action","");
    $action = $this->_action;
    $rc = new ReflectionClass("Modules_Trabajosdegrado_Controllers_DatosProyectoController");
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

private function editarobservacion(){
                   
     $obj_proyecto = new Modules_trabajosdegrado_Model_ProyectosGrado();
     $Facadeproyecto = new Modules_Trabajosdegrado_Model_ProyectosGradoFacade();
     $obj_historico = new Modules_trabajosdegrado_Model_HistoricoEstados();
     $FacadeHistorico = New Modules_Trabajosdegrado_Model_HistoricoEstadosFacade();
     
     $cod_proyectogrado = $this->_parameters->get_parameter("codproyectogrado",-1);
     $observaciones = $this->_parameters->get_parameter("observaciones","");
     $estado =  $this->_parameters->get_parameter("estado","");
     
     
       
     $obj_proyecto->set_codproyectogrado($cod_proyectogrado);
     $obj_proyecto = $Facadeproyecto->loadOne($obj_proyecto);
     
     $obj_proyecto->set_fechaestado(date("Y-m-d"));
     $obj_proyecto->set_observaciones($observaciones);
     $obj_proyecto->set_codestado($estado);   
     $Facadeproyecto->update($obj_proyecto);
           
    
      
     
        if ($estado == (3)){              
            $obj_historico->set_comentarioestado("Inicia proceso de preparacion de documento");
            $obj_proyecto->set_comentarioestado("Inicia proceso de preparacion de documento");
                                 
          }
          else if($estado == (7)){
            $obj_historico->set_comentarioestado("Proyecto devuelto ");
             $obj_proyecto->set_comentarioestado("Proyecto devuelto");
               
                 } 
                 $obj_historico->set_codestado($estado);
                 $obj_historico->set_codproyectogrado($cod_proyectogrado);
                 $obj_historico->set_fecha(date("Y-m-d"));
                 $FacadeHistorico->add($obj_historico);
                   $Facadeproyecto->update($obj_proyecto);
                
              $this->_parameters->delete_all();
    
    $cadenaUrl = $this->_parameters->KeyGen();

    $this->_url = $this->_path_config["ROOT"]["modules"]."/trabajosdegrado/views/verificar_index.php";
    header("Location: {$this->_url}");
        }
        
        private function actualizartipoasignacion(){
            
            $obj_usuproyecto = new Modules_trabajosdegrado_Model_Usuproyectogrado();
            $Facadeusuproyecto = new Modules_Trabajosdegrado_Model_UsuproyectogradoFacade();
            
            $usu_proyecto = $this->_parameters->get_parameter("codrelproyusu",-1);
            $tipo_asignacion =  $this->_parameters->get_parameter("tipoasignacion","");  
            $obj_usuproyecto->set_codrelproyusu($usu_proyecto);
            
            if ($tipo_asignacion == 8){
            $obj_usuproyecto->set_codrelproyusu($usu_proyecto);   
            $Facadeusuproyecto->delete($obj_usuproyecto);
        }else{
            
           
            $obj_usuproyecto = $Facadeusuproyecto->loadOne($obj_usuproyecto);
            
            $obj_usuproyecto->set_tipoasignacion($tipo_asignacion);   
            $Facadeusuproyecto->update($obj_usuproyecto);
    }          
        
     
               $this->_parameters->delete_all();
    
    $cadenaUrl = $this->_parameters->KeyGen();

    $this->_url = $this->_path_config["ROOT"]["modules"]."/trabajosdegrado/views/index.php";
    header("Location: {$this->_url}");
            
        }
        
}   
    
?>
