<?php
require("../../../config/config.inc.php");
$id_security= array("EVADOC_EVA_REA");

//***********************************************
$Face = new Moon2_ViewManager_Controller();
$Face->set_sysmenu(false);
$Face->set_type("HOMOLO");
$Face->set_name("Pagina Principal");

echo $Face->open();
require($Face->getView());
echo $Face->close();
?>