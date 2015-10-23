<?php
//Inclusiones obligatorias, primero el FrameWork y segundo el identificador de seguridad
require("../../../config/config.inc.php");
$DOM["SECURITY_ID"] = array("GRAMOD");


//Carga el sistema de seguridad
require("viewmanager/security.inc.php");

//Objetos requeridos en esta página
$Params = new Moon2_Params_Parameters();
$Archivo = new Moon2_Files_FileManager();
$Face = new Moon2_ViewManager_Controller();
$Modalidad = new Modules_Trabajosdegrado_Model_ModalidadesGrado();
$FacadeModalidades = new Modules_Trabajosdegrado_Model_ModalidadesGradoFacade();

//Gestor de parámetros
$Params->verify("GET",TRUE);
$msg = $Params->get_parameter("msg", "");
$cod_modalidadgrado = $Params->get_parameter("codmodalidad", "");

//Logica del negocio
$Modalidad->set_codmodalidadgrado($cod_modalidadgrado);
$Modalidad = $FacadeModalidades->loadOne($Modalidad);
$cantidad_disponibles = $FacadeModalidades->cantidadFormatosDisponibles($cod_modalidadgrado);
$filas = $FacadeModalidades->obtenerFormatos($cod_modalidadgrado);
$cantidad_filas = count($filas);

//Gestor de la página
$componente = $userFunc->getComponent("Modalidades");
$Face->set_name("Formatos x Modalidad");
$Face->set_component($componente);
$Face->add_javascript("../js/modalidadesformatos.js");
$Face->set_type("INSIDE");
$Face->add_navigation("Inicio", "../../main/views/index.php");
$Face->add_navigation("General", "modalidades_index.php");
$Face->add_navigation("Formatos", "#");

//Posibles para mensajes flotantes
$Face->floating_message($msg, $DOM["FMESSAGE"]["success"], "Operación Exitosa:", "El Formato fue des-asignado con éxito");
$Face->floating_message($msg, $DOM["FMESSAGE"]["error"], "Error:", "El formato NO se pudo desasignar");

$Face->floating_message($msg, 11, "Operación Exitosa:", "El Formato fue ASIGNADO con éxito");
$Face->floating_message($msg, 33, "Error:", "El formato NO se pudo asignar");

//Despliegue de la página en xhtml
echo $Face->open();
require($Face->getView());
echo $Face->close();
?>