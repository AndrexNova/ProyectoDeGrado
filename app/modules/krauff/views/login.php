<?php
session_start();
session_unset();
session_destroy();
require("../../../config/config.inc.php");
$id_security= array("EVADOC_EVA_REA");

//***********************************************
$Face = new Moon2_ViewManager_Controller();
$Face->set_sysmenu(false);
$Face->set_type("LOGIN");
$Face->set_name("Acceso al Sistema");
$Face->set_bodyClass(" class=\"gray-bg\"");
$Face->add_javascript("../js/login.js");
$Face->add_javascript("../js/md5-min.js");


echo $Face->open();
require($Face->getView());
echo $Face->close();
?>