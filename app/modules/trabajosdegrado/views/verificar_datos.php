<?php
//Inclusiones obligatorias, primero el FrameWork y segundo el identificador de seguridad
require("../../../config/config.inc.php");
$DOM["SECURITY_ID"] = array("GRAVER");


//Carga el sistema de seguridad
require("viewmanager/security.inc.php");

//$consignaciones= $FacadeConsignaciones->loadOne($consignaciones);

//$filas_consignaciones = $FacadeConsignaciones->porProyecto($cod_proyectogrado);

$Url = new Moon2_Params_Parameters();
$Url->verify("GET",false);

$FacadeProyectosg = new Modules_Trabajosdegrado_Model_ProyectosGradoFacade();
$Usuario = new Modules_Krauff_Model_Usuarios();
$Facadeusuario = new Modules_Krauff_Model_UsuariosFacade();
$FacadeConsignaciones = new Modules_Trabajosdegrado_Model_ConsignacionesFacade();
$consignaciones = new Modules_trabajosdegrado_Model_Consignaciones();
$Modalidadess =new Modules_Trabajosdegrado_Model_ModalidadesGrado();
$FacadeModalidades = new Modules_Trabajosdegrado_Model_ModalidadesGradoFacade();
$ProyectoGrado = new Modules_trabajosdegrado_Model_ProyectosGrado();


$cod_proyectogrado = $Url->get_parameter("codproyectogrado",-1);
$FacadeDatos = new Modules_Trabajosdegrado_Model_DatosProyectoFacade();
$Datos= new Modules_Trabajosdegrado_Model_DatosProyecto();

$arreglo=$FacadeDatos->VerificarProyecto($cod_proyectogrado);

$Usuario->set_codusuario($DOM["USER_ID"]);
$Usuario = $Facadeusuario->loadOne($Usuario);
$codusuario = $DOM["USER_ID"];

$ProyectoGrado->set_codproyectogrado($cod_proyectogrado);
$ProyectoGrado = $FacadeProyectosg->loadOne($ProyectoGrado);

$codmodalidad = $ProyectoGrado ->get_codmodalidadgrado();
$Modalidadess ->set_codmodalidadgrado($codmodalidad);
$Modalidadess = $FacadeModalidades->loadOne($Modalidadess);
$cod_modalidad = $Modalidadess ->get_codmodalidadgrado();
//Gestor de la página
$Tabulador = new Moon2_Tabulator_Tab();

$Face = new Moon2_ViewManager_Controller();
$Face->set_name("Verificar");
$Face->set_component("Verificar Datosx");
$Face->add_javascript("../js/verificardatos.js");
$Face->set_type("INSIDE");
$Face->add_navigation("Proyectos Registrados", "verificar_index.php");
$Face->add_navigation("Datos", "#");
$paso = $Url->get_parameter("paso", "1");


$Tabulador->set_externalData(true);
$Tabulador->set_selectedIndex($paso);

foreach ($arreglo as $value) {
    
    $datosconsignacion[$value['codusuario']]= $FacadeConsignaciones->porProyecto($value['codproyectogrado'],$value['codusuario']);
} 

 

//Posibles para mensajes flotantes

//Despliegue de la página en xhtml
echo $Face->open();
require($Face->getView());
echo $Face->close();
?>