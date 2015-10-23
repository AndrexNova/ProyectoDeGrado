<?php
//Inclusiones obligatorias, primero el FrameWork y segundo el identificador de seguridad
require("../../../config/config.inc.php");
$DOM["SECURITY_ID"] = array("GRASEG");


//Carga el sistema de seguridad
require("viewmanager/security.inc.php");

//$consignaciones= $FacadeConsignaciones->loadOne($consignaciones);

//$filas_consignaciones = $FacadeConsignaciones->porProyecto($cod_proyectogrado);

$Url = new Moon2_Params_Parameters();
$Url->verify("GET",true);
$codigoproyecto = $Url->get_parameter("codproyectogrado", -1);
$codigomodalidad = $Url->get_parameter("codmodalidadgrado", -1);
$usu_proyecto = $Url->get_parameter("codrelproyusu", -1);
$codusuario = $Url->get_parameter("codusuario", -1);

$ProyectoGrado = new Modules_trabajosdegrado_Model_ProyectosGrado();
$FacadeProyectosg = new Modules_Trabajosdegrado_Model_ProyectosGradoFacade();

$ProyectoGrado->set_codproyectogrado($codigoproyecto);
$ProyectoGrado = $FacadeProyectosg->loadOne($ProyectoGrado);

$Modalidadess =new Modules_Trabajosdegrado_Model_ModalidadesGrado();
$FacadeModalidades = new Modules_Trabajosdegrado_Model_ModalidadesGradoFacade();

$Modalidadess ->set_codmodalidadgrado($codigomodalidad);
$Modalidadess = $FacadeModalidades->loadOne($Modalidadess);
$nombremodalidad = $Modalidadess ->get_nombremodalidad();

$Usuario = new Modules_Krauff_Model_Usuarios();
$Facadeusuario = new Modules_Krauff_Model_UsuariosFacade();
$Usuario ->set_codusuario($codusuario);
$Usuario = $Facadeusuario->loadOne($Usuario);

$filass = $FacadeProyectosg->mostrarnombre($codigoproyecto);
$Face = new Moon2_ViewManager_Controller();
$Face->set_name("Verificar");
$Face->set_component("Verificar Datosx");
$Face->add_javascript("../js/asociarcompanero.js");
$Face->set_type("INSIDE");
$Face->add_navigation("Proyectos Registrados", "verificar_index.php");
$Face->add_navigation("Asociar Compañero", "#");



 

//Posibles para mensajes flotantes

//Despliegue de la página en xhtml
echo $Face->open();
require($Face->getView());
echo $Face->close();
?>