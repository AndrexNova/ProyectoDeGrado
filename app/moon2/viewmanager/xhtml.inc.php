<?php
function xhtml_header($title, $paths, $theme, $javafiles, $stylesOut) {
    $html = "<!doctype html>\n";
    $html.= "<html>\n";
    $html.= " <head>\n";
    $html.= "  <meta charset=\"utf-8\">\n";
    $html.= "  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n";
    $html.= "  <title>{$title}</title>\n";
    $html.= xhtml_header_styles($paths, $theme, $stylesOut);
    $html.= xhtml_header_javascripts($paths, $theme, $javafiles);
    $html.= " </head>\n";
    return $html;
}

function xhtml_header_styles($paths, $theme, $stylesOut) {
    $html = "<!-- Style load -->\n";
    $path = $paths["ROOT"]["moon"] . "/themes/{$theme}/";
    $styles = array();
    $styles[] = "css/bootstrap.min.css";
    $styles[] = "font-awesome/css/font-awesome.css";
    $styles[] = "css/plugins/morris/morris-0.4.3.min.css";
    $styles[] = "css/plugins/toastr/toastr.min.css";
    $styles[] = "css/plugins/iCheck/custom.css";
    $styles[] = "css/plugins/jQueryUI/jquery-ui-1.10.4.custom.min.css";
    $styles[] = "css/animate.css";
    $styles[] = "css/style.css";
    //aqui voy

    foreach ($styles as $key => $value) {
        $html.="<link rel=\"stylesheet\" href=\"{$path}{$value}\" type=\"text/css\" />\n";
    }
    //Calendar begin
    $stylesOut[] = "<link rel=\"stylesheet\" href=\"".$paths["ROOT"]["moon"]."/calendar/css/jscal2.css\" type=\"text/css\" />";
    $stylesOut[] = "<link rel=\"stylesheet\" href=\"".$paths["ROOT"]["moon"]."/calendar/css/border-radius.css\" type=\"text/css\" />";
    $stylesOut[] = "<link rel=\"stylesheet\" href=\"".$paths["ROOT"]["moon"]."/calendar/css/steel.css\" type=\"text/css\" />";
    //Calendar end
    foreach($stylesOut as $key => $value){
        $html.= $value."\n";
    }
    return $html;
}

function xhtml_header_javascripts($paths, $theme, $javafiles) {
    $html = "<!-- Script load -->\n";
    $javas = array();
    //theme
    $path = $paths["ROOT"]["moon"] . "/themes/{$theme}/js/";
    $javas[] = $path . "jquery-2.1.1.js";
    $javas[] = $path . "bootstrap.min.js";
    $javas[] = $path . "plugins/metisMenu/jquery.metisMenu.js";
    $javas[] = $path . "plugins/slimscroll/jquery.slimscroll.min.js";
    $javas[] = $path . "plugins/jquery-ui/jquery-ui.min.js";
    $javas[] = $path . "inspinia.js";
    $javas[] = $path . "plugins/validate/jquery.validate.min.js";
    $javas[] = $path . "plugins/toastr/toastr.min.js";
    $javas[] = $path . "plugins/iCheck/icheck.min.js";
    //$javas[] = $path . "plugins/pace/pace.min.js";
    //$javas[] = $path . "plugins/iCheck/icheck.min.js";

//    $javas[] = $path . "plugins/flot/jquery.flot.js";
//    $javas[] = $path . "plugins/flot/jquery.flot.tooltip.min.js";
//    $javas[] = $path . "plugins/flot/jquery.flot.spline.js";
//    $javas[] = $path . "plugins/flot/jquery.flot.resize.js";
//    $javas[] = $path . "plugins/flot/jquery.flot.pie.js";
//    $javas[] = $path . "plugins/flot/jquery.flot.symbol.js";
//    $javas[] = $path . "plugins/flot/curvedLines.js";
//    $javas[] = $path . "plugins/peity/jquery.peity.min.js";
//    $javas[] = $path . "demo/peity-demo.js";
//    $javas[] = $path . "plugins/jvectormap/jquery-jvectormap-1.2.2.min.js";
//    $javas[] = $path . "plugins/jvectormap/jquery-jvectormap-world-mill-en.js";
//    $javas[] = $path . "plugins/sparkline/jquery.sparkline.min.js";
    

//    //Calendar begin
    $javas[] = $paths["ROOT"]["moon"]."/calendar/js/jscal2.js";
    $javas[] = $paths["ROOT"]["moon"]."/calendar/js/es.js";
//    //Calendar end
    //moon2
    $javas[] = $paths["ROOT"]["moon"] . "/js/moon2.js";
    foreach ($javas as $key => $value) {
        $html.="<script src=\"{$value}\"></script>\n";
    }

    foreach ($javafiles as $key => $value) {
        $html.= $value . "\n";
    }

    $html.= xhtml_global_java($paths["ROOT"]["moon"]);
    $html.= "<script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>";
    return $html;
}

function xhtml_global_java($path) {
    $html = "<script language=\"javascript\" type=\"text/javascript\">\n";
    $html.= "  var javaPath = \"{$path}\"\n";
    $html.= "</script>\n";
    return $html;
}

function xhtml_body_open($type, $dataPath, $dataDomain, $bodyClass) {
    $html = "";
    $pathModules = $dataPath["ROOT"]["modules"];
    switch ($type) {
        case "FACTURA":
            $html = "<body{$bodyClass}>\n";
        break;
        case "FLOAT":
            $html = "<body{$bodyClass}>\n";
        break;
        case "OUTSIDE":
            $login = $dataPath["QUIT"] . "/login.php";
            $html = "<body{$bodyClass}>\n";
            $html.= "<nav role=\"navigation\" class=\"navbar navbar-inverse\">\n";
            $html.= "   <div class=\"container\">\n";
            $html.= "       <div class=\"navbar-header\">\n";
            $html.= "           <button data-target=\".navbar-ex1-collapse\" data-toggle=\"collapse\" class=\"navbar-toggle\" type=\"button\">\n";
            $html.= "               <span class=\"sr-only\">Toggle navigation</span>\n";
            $html.= "               <span class=\"icon-bar\"></span>\n";
            $html.= "               <span class=\"icon-bar\"></span>\n";
            $html.= "               <span class=\"icon-bar\"></span>\n";
            $html.= "           </button>\n";
            $html.= "           <a href=\"{$pathModules}/outside/views/index.php\" class=\"navbar-brand\">" . $dataDomain["SYSTEMNAME"] . "</a>\n";
            $html.= "       </div>";
            $html.= "       <div class=\"collapse navbar-collapse navbar-ex1-collapse\">\n";
            $html.= "           <ul class=\"nav navbar-nav navbar-right\">\n";
            $html.= "               <li class=\"\">\n";
            $html.= "                   <a href=\"{$login}\">Acceso al Sistema</a>\n";
            $html.= "               </li>\n";
            $html.= "               <li class=\"\">\n";
            $html.= "                   <a href=\"javascript:history.back();\"><i class=\"icon-chevron-left\"></i>&nbsp;&nbsp;Regresar página</a>\n";
            $html.= "               </li>\n";
            $html.= "           </ul>\n";
            $html.= "       </div><!-- /.navbar-collapse -->\n";
            $html.= "   </div> <!-- /.container -->\n";
            $html.= "</nav>\n";
            $html.= "<br />\n";
        break;
 case "HOMOLO":
            $login = $dataPath["QUIT"] . "/login.php";
            $homologacion= $dataPath["HOMOLOGACION"];
            $html = "<body{$bodyClass}>\n";
            $html.= "<nav role=\"navigation\" class=\"navbar navbar-inverse\">\n";
            $html.= "   <div class=\"container\">\n";
            $html.= "       <div class=\"navbar-header\">\n";
            $html.= "           <button data-target=\".navbar-ex1-collapse\" data-toggle=\"collapse\" class=\"navbar-toggle\" type=\"button\">\n";
            $html.= "               <span class=\"sr-only\">Toggle navigation</span>\n";
            $html.= "               <span class=\"icon-bar\"></span>\n";
            $html.= "               <span class=\"icon-bar\"></span>\n";
            $html.= "               <span class=\"icon-bar\"></span>\n";
            $html.= "           </button>\n";
            $html.= "           <a href=\"{$pathModules}/outside/views/index.php\" class=\"navbar-brand\">" . $dataDomain["SYSTEMNAME"] . "</a>\n";
            $html.= "       </div>";
            $html.= "       <div class=\"collapse navbar-collapse navbar-ex1-collapse\">\n";
            $html.= "           <ul class=\"nav navbar-nav navbar-right\">\n";
            $html.= "               <li class=\"\">\n";
            $html.= "                   <a href=\"{$login}\">Acceso al Sistema</a>\n";
            $html.= "               </li>\n";
                $html.= "               <li class=\"\">\n";
            $html.= "                   <a href=\"{$homologacion}\">Acceso al Simulador</a>\n";
            $html.= "               </li>\n";
            $html.= "               <li class=\"\">\n";
            $html.= "                   <a href=\"javascript:history.back();\"><i class=\"icon-chevron-left\"></i>&nbsp;&nbsp;Regresar página</a>\n";
            $html.= "               </li>\n";
            $html.= "           </ul>\n";
            $html.= "       </div><!-- /.navbar-collapse -->\n";
            $html.= "   </div> <!-- /.container -->\n";
            $html.= "</nav>\n";
            $html.= "<br />\n";
        break;

        case "INSIDE":
            $quit = $dataPath["QUIT"] . "/response.php?msg=" . urlencode("Sesion finalizada correctamente");
            $html = "<body{$bodyClass}>\n";
            $html.= "<nav role=\"navigation\" class=\"navbar navbar-inverse\">\n";
            $html.= "   <div class=\"container\">\n";
            $html.= "       <div class=\"navbar-header\">\n";
            $html.= "           <button data-target=\".navbar-ex1-collapse\" data-toggle=\"collapse\" class=\"navbar-toggle\" type=\"button\">\n";
            $html.= "               <span class=\"sr-only\">Toggle navigation</span>\n";
            $html.= "               <i class=\"icon-cog\"></i>\n";
            $html.= "           </button>\n";
            $html.= "           <a href=\"{$pathModules}/main/views/index.php\" class=\"navbar-brand\">" . $dataDomain["SYSTEMNAME"] . "</a>\n";
            $html.= "       </div>\n";
            $html.= "       <div class=\"collapse navbar-collapse navbar-ex1-collapse\">\n";
            $html.= "           <ul class=\"nav navbar-nav navbar-right\">\n";
            $html.= "               <li class=\"dropdown\">\n";
            $html.= "                   <a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"javscript:;\">\n";
            $html.= "                       <i class=\"icon-user\"></i> " . $dataDomain["SYSTEMNAME"] . "\n";
            $html.= "                       <b class=\"caret\"></b>\n";
            $html.= "                   </a>\n";
            $html.= "                   <ul class=\"dropdown-menu\">\n";
            $html.= "                       <li><a href=\"javascript:;\">Mi perfil</a></li>\n";
            $html.= "                       <li><a href=\"javascript:;\">Comentarios</a></li>\n";
            $html.= "                       <li><a href=\"javascript:;\">Ayuda</a></li>\n";
            $html.= "                       <li class=\"divider\"></li>\n";
            $html.= "                       <li><a href=\"" . $quit . "\">Cerrar Sesión</a></li>\n";
            $html.= "                   </ul>\n";
            $html.= "               </li>\n";
            $html.= "           </ul>\n";
            $html.= "       </div><!-- /.navbar-collapse -->\n";
            $html.= "   </div> <!-- /.container -->\n";
            $html.= "</nav>\n";
            $html = "<body{$bodyClass}>\n";
        break;
        case "LOGIN":
          $login = $dataPath["QUIT"] . "/login.php";
            $homologacion= $dataPath["HOMOLOGACION"];
            $html = "<body{$bodyClass}>\n";
            $html.= "<nav role=\"navigation\" class=\"navbar navbar-inverse\">\n";
            $html.= "   <div class=\"container\">\n";
            $html.= "       <div class=\"navbar-header\">\n";
            $html.= "           <button data-target=\".navbar-ex1-collapse\" data-toggle=\"collapse\" class=\"navbar-toggle\" type=\"button\">\n";
            $html.= "               <span class=\"sr-only\">Toggle navigation</span>\n";
            $html.= "               <span class=\"icon-bar\"></span>\n";
            $html.= "               <span class=\"icon-bar\"></span>\n";
            $html.= "               <span class=\"icon-bar\"></span>\n";
            $html.= "           </button>\n";
            $html.= "           <a href=\"{$pathModules}/outside/views/index.php\" class=\"navbar-brand\">" . $dataDomain["SYSTEMNAME"] . "</a>\n";
            $html.= "       </div>";
            $html.= "       <div class=\"collapse navbar-collapse navbar-ex1-collapse\">\n";
            $html.= "           <ul class=\"nav navbar-nav navbar-right\">\n";
            $html.= "               <li class=\"\">\n";
            $html.= "                   <a href=\"{$login}\">Acceso al Sistema</a>\n";
            $html.= "               </li>\n";
                $html.= "               <li class=\"\">\n";
            $html.= "                   <a href=\"{$homologacion}\">Acceso al Simulador</a>\n";
            $html.= "               </li>\n";
            $html.= "               <li class=\"\">\n";
            $html.= "                   <a href=\"javascript:history.back();\"><i class=\"icon-chevron-left\"></i>&nbsp;&nbsp;Regresar página</a>\n";
            $html.= "               </li>\n";
            $html.= "           </ul>\n";
            $html.= "       </div><!-- /.navbar-collapse -->\n";
            $html.= "   </div> <!-- /.container -->\n";
            $html.= "</nav>\n";
            $html.= "<br />\n";
            $html .= "<body{$bodyClass}>\n";
        break;
        default:
            $html = "<body{$bodyClass}>\n";
            $html.= "<nav role=\"navigation\" class=\"navbar navbar-inverse\">\n";
            $html.= "   <div class=\"container\">\n";
            $html.= "       <div class=\"navbar-floatm\">\n";
            $html.= "           " . $dataDomain["SYSTEMNAME"] . "\n";
            $html.= "       </div>";
            $html.= "   </div> <!-- /.container -->\n";
            $html.= "</nav>\n";
        break;
    }
    return $html;
}

function xhtml_perfil($dataPath,$dataDomain){
    $quit = $dataPath["QUIT"] . "/login.php?msg=" . urlencode("Sesion finalizada correctamente");
    $pathModules = $dataPath["ROOT"]["modules"];
    $nombre_completo_usuario = $dataDomain["FULLUSER_NAME"];
    $html= "";
    $html.= "<li class=\"nav-header\">\n";
    $html.= "  <div class=\"dropdown profile-element\">\n";
    $html.= "    <span><img alt=\"image\" class=\"img-circle\" src=\"../../../moon2/themes/inspinia/img/profile_small.jpg\"/></span>\n";
    $html.= "    <a data-toggle=\"dropdown\" class=\"dropdown-toggle\" href=\"#\">\n";
    $html.= "      <span class=\"clear\"> <span class=\"block m-t-xs\"> <strong class=\"font-bold\">{$nombre_completo_usuario}</strong>\n";
    $html.= "        </span><span class=\"text-muted text-xs block\">Conectado<b class=\"caret\"></b></span></span></a>\n";
    $html.= "    <ul class=\"dropdown-menu animated fadeInRight m-t-xs\">\n";
    $html.= "      <li><a href=\"{$pathModules}/krauff/views/usuarios_editar.php\">Perfil</a></li>\n";
    $html.= "      <li><a href=\"contacts.html\">Contacto</a></li>\n";
    $html.= "      <li><a href=\"mailbox.html\">Email</a></li>\n";
    $html.= "      <li class=\"divider\"></li>\n";
    $html.= "      <li><a href=\"{$quit}\">Salir</a></li>\n";
    $html.= "    </ul>\n";
    $html.= "  </div>\n";
    $html.= "  <div class=\"logo-element\">\n";
    $html.= "    IN+\n";
    $html.= "  </div>\n";
    $html.= "</li>\n";
    return $html;
}

function xhtml_notificaciones($dataPath,$dataDomain){
     $quit = $dataPath["QUIT"] . "/login.php?msg=" . urlencode("Sesion finalizada correctamente");
    $nombre_sistema = $dataDomain["SYSTEMNAME"];
    $html="<div id=\"page-wrapper\" class=\"gray-bg\">
                    <div class=\"row border-bottom\">
                    <nav class=\"navbar navbar-static-top\" role=\"navigation\" style=\"margin-bottom: 0\">
                        <div class=\"navbar-header\">
                            <a class=\"navbar-minimalize minimalize-styl-2 btn btn-primary \" href=\"#\" title=\"Ocultar Menu\"><i class=\"fa fa-bars\"></i> </a>
                        </div>
                        <ul class=\"nav navbar-top-links navbar-right\">
                            <span class=\"m-r-sm text-muted welcome-message\">{$nombre_sistema}</span>
                           
                            </li>
                            
                            <li>
                                <a href=\"{$quit}\">
                                    <i class=\"fa fa-sign-out\"></i> Salir
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            ";
            return $html;
}

function xhtml_body_close($type, $floatmess) {
    $html = "";
    switch ($type) {
        case "FLOAT":
            //$html = xhmtl_modal_delete();
            //$html.= $floatmess;
            $html = "\n</body>\n";
            $html.= "</html>\n";
        break;
        default:
            $html = xhmtl_modal_delete();
            $html.= $floatmess;
            $html.= "<div class=\"footer\">\n";
            $html.= " <div class=\"pull-right\">Moon 2.4</div>\n"; 
            $html.= " <div><strong>Copyright</strong> CompuStore &copy; 2015-2016</div>\n";
            $html.= "</div>\n";
            $html.= "\n</body>\n";
            $html.= "</html>\n";
        break;
    }
    return $html;
}

function xhmtl_modal_delete(){
    $html = "\n<!-- inicio modal borrar -->\n";
    $html.= "<div id=\"myModalDelete\" class=\"modal inmodal\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">\n";
    $html.= "  <div class=\"modal-dialog\">\n";
    $html.= "    <div class=\"modal-content animated flipInY\">\n";
    $html.= "      <div class=\"modal-body\">\n";
    $html.= "        <strong>Está seguro que desea eliminar el registro: </strong>\n";
    $html.= "        <span class=\"edit-content\">xxx</span>\n";
    $html.= "      </div>";
    $html.= "      <div class=\"modal-footer\">\n";
    $html.= "        <button type=\"button\" class=\"btn btn-white\" data-dismiss=\"modal\">Cancelar</button>\n";
    $html.= "        <button type=\"button\" class=\"btn btn-primary\">Aceptar</button>\n";
    $html.= "      </div>\n";
    $html.= "     </div>\n";
    $html.= "   </div>\n";
    $html.= "</div>\n";
    $html.= "<!--fin modal borrar-->\n";
    return $html;
}

?>