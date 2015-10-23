<?php
//Inclusiones obligatorias, primero el FrameWork y segundo el identificador de seguridad
require("../../../config/config.inc.php");
$DOM["SECURITY_ID"] = array("MNTO_EMP");


//Carga el sistema de seguridad
require("viewmanager/security.inc.php");


//Gestor de parámetros
$Params = new Moon2_Params_Parameters();
$Params->verify("GET",false);
$msg = $Params->get_parameter("msg", "");
$Formulario = new Moon2_Forms_Form();

//Obtencion de la Llave primaria
$_codempresa = $Params->get_parameter("codempresa", "");
$Empresa = new Modules_Hojadevida_Model_Empresas;
$Empresa->set_codempresa($_codempresa);
$FacadeEmpresas = new Modules_Hojadevida_Model_EmpresasFacade();
$FacadeEmpresas->loadOne($Empresa);

//Gestor de la página
$Face = new Moon2_ViewManager_Controller();
$Face->set_name("Actualizar Empresas");
$Face->set_component("Mantenimiento Tablas");
$Face->add_javascript("../js/empresas_flotantes.js");
$Face->set_type("INSIDE");
$Face->set_sysmenu(true);
$Face->add_navigation("Empresas", "#");
$Face->add_navigation("Listado", "empresas_admin.php");
$Face->add_navigation("Editar", "#");
   

//Despliegue de la página en xhtml
echo $Face->open();
require($Face->getView());
echo $Face->close();
?>