<?php
//Inclusiones obligatorias, primero el FrameWork y segundo el identificador de seguridad
require("../../../config/config.inc.php");
$DOM["SECURITY_ID"] = array("GRA");


//Carga el sistema de seguridad
require("viewmanager/security.inc.php");


//Objetos requeridos en esta página
$Params = new Moon2_Params_Parameters();
$Face = new Moon2_ViewManager_Controller();


//Gestor de parámetros
$Params->verify("GET",false);
$msg = $Params->get_parameter("msg", "");

//logica del negocio 
$orden = "m.codmodalidadgrado";
$FacadeModalidades = new Modules_Trabajosdegrado_Model_ModalidadesGradoFacade();
$arr_modalidades = $FacadeModalidades->obtener($orden);


//Gestor de la página
$Face = new Moon2_ViewManager_Controller();
$Face->set_name("Historicos");
$Face->set_component("Historicos");
$Face->add_javascript("../js/modalidades.js");
$Face->set_type("INSIDE");
$Face->add_navigation("Consulta Historico", "#");


//Despliegue de la página en xhtml
echo $Face->open();
require($Face->getView());
echo $Face->close();
?>