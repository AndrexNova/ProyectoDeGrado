<?php
//Inclusiones obligatorias, primero el FrameWork y segundo el identificador de seguridad
require("../../../config/config.inc.php");
$DOM["SECURITY_ID"] = array("GRAPRE");


//Carga el sistema de seguridad
require("viewmanager/security.inc.php");


//Objetos requeridos en esta página
$Params = new Moon2_Params_Parameters();
$Face = new Moon2_ViewManager_Controller();
$Url = new Moon2_Params_Parameters();
$Archivo = new Moon2_Files_FileManager();

//Gestor de parámetros
$Params->verify("GET",false);
$msg = $Params->get_parameter("msg", "");

$cod_modalidadgrado = $Params->get_parameter("codmodalidad", "");
$Modalidad = new Modules_Trabajosdegrado_Model_ModalidadesGrado();
$FacadeModalidades = new Modules_Trabajosdegrado_Model_ModalidadesGradoFacade();
$Modalidad->set_codmodalidadgrado($cod_modalidadgrado);
$Modalidad = $FacadeModalidades->loadOne($Modalidad);
$cantidad_disponibles = $FacadeModalidades->cantidadFormatosDisponibles($cod_modalidadgrado);
$filas = $FacadeModalidades->obtenerFormatos($cod_modalidadgrado);
$cantidad_filas = count($filas);


$cod_proyectogrado = $Url->get_parameter("codproyectogrado",-1);
$FacadeDatos = new Modules_Trabajosdegrado_Model_DatosProyectoFacade();
$Datos= new Modules_Trabajosdegrado_Model_DatosProyecto();
$arreglo=$FacadeDatos->VerificarProyecto($cod_proyectogrado);

//Gestor de la página
$Face->set_name("Trabajos de grado");
$Face->set_component("Trabajos de Grado");
$Face->add_javascript("../js/radicar.js");
$Face->set_type("INSIDE");
$Face->add_navigation("Formatos para Descargar","#");



//Despliegue de la página en xhtml
echo $Face->open();
require($Face->getView());
echo $Face->close();
?>