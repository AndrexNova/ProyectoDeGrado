<?php
//Inclusiones obligatorias, primero el FrameWork y segundo el identificador de seguridad
require("../../../config/config.inc.php");
$DOM["SECURITY_ID"] = array("GRASEG");


//Carga el sistema de seguridad
require("viewmanager/security.inc.php");

//Objetos requeridos en esta página
$Params = new Moon2_Params_Parameters();
$Face = new Moon2_ViewManager_Controller();


//Gestor de parámetros
$Params->verify("GET",false);
$msg = $Params->get_parameter("msg", "");


//Logica del negocio
$FacadeProyectosg = new Modules_Trabajosdegrado_Model_ProyectosGradoFacade();
$filas = $FacadeProyectosg->porUsuario($DOM["USER_ID"]);
$cantidad_filas = count($filas);

if(@$filas[0]['tipoasignacion']==6){
     $Params->delete_all();
     $Params->add('codproyectogrado',$filas[0]['codproyectogrado']);
     $Params->add('codmodalidadgrado',$filas[0]['codmodalidadgrado']);
     $Params->add('codrelproyusu',$filas[0]['codrelproyusu']);    
     $parametros = $Params->keyGen();
    header("Location:aso_companero.php?{$parametros}");
        
    }
    $titulo= new Modules_Bancoproyectos_Model_Temas();
    $FacadeTemas= new Modules_Bancoproyectos_Model_TemasFacade();
    
$titulo->set_titulo($titulo);
$titulo= $FacadeTemas->loadOne($titulo);
            


//Gestor de la página
$Face->set_name("Trabajos de grado");
$Face->set_component("Trabajos de Grado");
$Face->add_javascript("../js/trabajosgrado.js");
$Face->set_type("INSIDE");
$Face->add_navigation("Registro y Segumiento", "#");


//Posibles para mensajes flotantes
//$Face->floating_message($msg, $DOM["FMESSAGE"]["success"], "Operación Exitosa:", "El Formato fue des-asignado con éxito");
//$Face->floating_message($msg, $DOM["FMESSAGE"]["error"], "Error:", "El formato NO se pudo desasignar");
//$Face->floating_message($msg, 11, "Operación Exitosa:", "El Formato fue ASIGNADO con éxito");
//$Face->floating_message($msg, 33, "Error:", "El formato NO se pudo asignar");

$Face->floating_message($msg, 17, "CORRECTO:", "El proceso de radicacion ha finalizado");

//Despliegue de la página en xhtml
echo $Face->open();
require($Face->getView());
echo $Face->close();
?>