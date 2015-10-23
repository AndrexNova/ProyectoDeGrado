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
$Tabulador = new Moon2_Tabulator_Tab();

//Gestor de parámetros
$Params->verify("GET",TRUE);
$msg = $Params->get_parameter("msg", "");
$paso = $Params->get_parameter("paso", "1");
$cod_modalidadgrado = $Params->get_parameter("codmodalidad", "");

//Logica del negocio
$Modalidad->set_codmodalidadgrado($cod_modalidadgrado);
$Modalidad = $FacadeModalidades->loadOne($Modalidad);
$filas = $FacadeModalidades->obtenerFormatosDisponibles($cod_modalidadgrado);

//Ejemplo de uso del tabulador
$Tabulador->set_externalData(TRUE);
$Tabulador->set_selectedIndex($paso);
$Tabulador->add_item("Formatos Disponibles");
$Tabulador->add_item("Agregar Formatos");

//Gestor de la página
$componente = $userFunc->getComponent("Modalidades");
$Face->set_bodyClass(" class=\"gray-bg\"");
$Face->set_component($componente);
$Face->set_name("Formatos x Modalidad");
$Face->add_javascript("../js/modalidadesformatosdisp.js");
$Face->set_type("FLOAT");
$Face->set_sysmenu(false);

//Posibles para mensajes flotantes
$Face->floating_message($msg, 11, "Operación Exitosa:", "Archivo cargado correctamente");
$Face->floating_message($msg, 31, "Error:", "Tipo de Archivo no permitido");
$Face->floating_message($msg, 33, "Error:", "El Archivo no pudo ser cargado");
$Face->floating_message($msg, 34, "Error:", "El tamaño del archivo supera el limite permitido");
$Face->floating_message($msg, 21, "Operación Incompleta:", "El archivo fue cargado pero no fue gradado en la Base de Datos");

$Face->floating_message($msg, 12, "Operación Exitosa:", "El archivo fue borrado con éxito");
$Face->floating_message($msg, 32, "Error:", "El archivo NO pudo ser borrado");


//Despliegue de la página en xhtml
echo $Face->open();
require($Face->getView());
echo $Face->close();
?>