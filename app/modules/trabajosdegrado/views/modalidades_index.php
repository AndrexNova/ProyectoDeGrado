<?php
//Inclusiones obligatorias, primero el FrameWork y segundo el identificador de seguridad
require("../../../config/config.inc.php");
$DOM["SECURITY_ID"] = array("GRAMOD");

//Carga el sistema de seguridad
require("viewmanager/security.inc.php");

//Gestor de parámetros
$Params = new Moon2_Params_Parameters();
$Params->verify("GET",false);
$msg = $Params->get_parameter("msg", "");

$Formulario = new Moon2_Forms_Form();
$arrValores = array();
$arrValores["true"] = "SI";
$arrValores["false"] = "NO";

//Logica del negocio
$orden = "m.codmodalidadgrado";
$FacadeModalidades = new Modules_Trabajosdegrado_Model_ModalidadesGradoFacade();
$arr_modalidades = $FacadeModalidades->obtener($orden);

//Gestor de la página
$Face = new Moon2_ViewManager_Controller();
$componente = $userFunc->getComponent("Modalidades");
$Face->set_name("Listado de Modalidades");
$Face->set_component($componente);
$Face->add_javascript("../js/modalidades.js");
$Face->set_type("INSIDE");
$Face->add_navigation("Inicio", "../../main/views/index.php");
$Face->add_navigation("General", "modalidades_index.php");
$Face->add_navigation("Modalidades", "#");

//Despliegue de la página en xhtml
echo $Face->open();
require($Face->getView());
echo $Face->close();
?>