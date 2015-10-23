<?php
//Inclusiones obligatorias, primero el FrameWork y segundo el identificador de seguridad
require("../../../config/config.inc.php");
$DOM["SECURITY_ID"] = array("GRASEG");


//Carga el sistema de seguridad
require("viewmanager/security.inc.php");

$Face = new Moon2_ViewManager_Controller();
$Params = new Moon2_Params_Parameters();
$Archivo = new Moon2_Files_FileManager();


$FacadeDatos = new Modules_Trabajosdegrado_Model_DatosProyectoFacade();
$Datos= new Modules_Trabajosdegrado_Model_DatosProyecto();
$ProyectoGrado = new Modules_trabajosdegrado_Model_ProyectosGrado();
$FacadeProyectosg = new Modules_Trabajosdegrado_Model_ProyectosGradoFacade();
$documentos = new Modules_trabajosdegrado_Model_DocumentosProyecto();
$FacadeDocumentos = new Modules_Trabajosdegrado_Model_DocumentosProyectoFacade();
$Params->verify("GET",true);
$cod_proyectogrado = $Params->get_parameter('codproyectogrado', 0);

$ProyectoGrado->set_codproyectogrado($cod_proyectogrado);
$codigo = $Params->get_parameter("codigo",0);
$msg = $Params->get_parameter("msg","");

$Datos ->set_codigo($codigo);
$Datos = $FacadeDatos->loadOne($Datos);



$filas_anteproyecto = $FacadeDocumentos->anteproyecto($cod_proyectogrado);
$filass = $FacadeDatos->porProyecto($cod_proyectogrado);
//Gestor de la página

$Face->set_name("Trabajos de grado");
$Face->set_component("Trabajos de Grado");
$Face->add_javascript("../js/anteproyecto.js");
$Face->set_type("INSIDE");
$Face->add_navigation("Registro y Segumiento", "#");





//Despliegue de la página en xhtml
echo $Face->open();
require($Face->getView());
echo $Face->close();
?>