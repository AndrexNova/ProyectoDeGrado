<?php
//Inclusiones obligatorias, primero el FrameWork y segundo el identificador de seguridad
require("../../../config/config.inc.php");
$DOM["SECURITY_ID"] = array("GRAVER");


//Carga el sistema de seguridad
require("viewmanager/security.inc.php");


//Objetos requeridos en esta página
$Params = new Moon2_Params_Parameters();
$Archivo = new Moon2_Files_FileManager();
$Face = new Moon2_ViewManager_Controller();
$Consignacion = new Modules_trabajosdegrado_Model_Consignaciones();
$FacadeConsignacion = new Modules_Trabajosdegrado_Model_ConsignacionesFacade();


//Gestor de parámetros
$Params->verify("GET",TRUE);
$msg = $Params->get_parameter("msg", "");
$cod_consignacion = $Params->get_parameter("codconsignacion", "0");


//Logica del negocio
$Consignacion->set_codconsignacion($cod_consignacion);
$Consignacion = $FacadeConsignacion->loadOne($Consignacion);
$nombre_archivo = $Consignacion->get_nombrecodificado();
$ruta_fisica_completa = $PATH_CONFIG["TRAGRA_CONSIGNA"]."/".$Consignacion->get_nombrecodificado();
$tipo = $Consignacion->get_tipo();
$tamanno = $Consignacion->get_tamanno();


//Gestor de la página
$Face->set_name("Recibo consignación");
//$Face->add_javascript("../js/no_requerido.js");
$Face->set_type("FLOAT");
$Face->set_sysmenu(false);


//Despliegue de la página en xhtml
echo $Face->open();
require($Face->getView());
echo $Face->close();
?>