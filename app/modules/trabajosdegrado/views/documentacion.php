<?php
//Inclusiones obligatorias, primero el FrameWork y segundo el identificador de seguridad
require("../../../config/config.inc.php");
$DOM["SECURITY_ID"] = array("GRAPRE");


//Carga el sistema de seguridad
require("viewmanager/security.inc.php");

$Face = new Moon2_ViewManager_Controller();
$Params = new Moon2_Params_Parameters();
$Params->verify("GET",false);
$msg = $Params->get_parameter("msg", "");



//Logica del negocio
$orden = "m.codmodalidadgrado";
$FacadeModalidades = new Modules_Trabajosdegrado_Model_ModalidadesGradoFacade();
$arr_modalidades = $FacadeModalidades->obtener($orden);



$Face->set_name("Trabajos de grado");
$Face->set_component("Trabajos de Grado");
$Face->add_javascript("../js/radicar.js");//todavia no se sabe
$Face->set_type("INSIDE");
$Face->add_navigation("Lineamientos y Documentacion", "#");





//Despliegue de la página en xhtml
echo $Face->open();
require($Face->getView());
echo $Face->close();
?>