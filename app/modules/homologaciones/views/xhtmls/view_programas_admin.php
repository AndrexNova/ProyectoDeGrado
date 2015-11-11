<?php
if (!isset($DOM["SECURITY_ID"])) {
    echo "<h1>MOON2 Message:<br />Can not call view, requires the view controller</h1>";
    exit();
}
$Paginador = new Moon2_Pagination_Pager($rsNumRows, $limit_numrows, $num_page, $Params);
?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="row">    
                        <div class="col-sm-7 m-b-xs">
                            <button class="btn btn-primary dim" type="button" title="Nuevo" data-toggle="modal" data-target="#VentanaFlotanteCrear"><i class="fa fa-plus-square"></i></button>
                            <?php echo $Paginador->showDetails(); ?>
                        </div>
                        <?php
                        if ($cantidad_filas > 0) {
                            ?>
                            <!--Buscador de Registros-->    
                            <form id="frm_programas" name="frm_programas" method="post" action="moon24.php" onSubmit="javascript:return managedProccess(this);"> 
                                <input type="hidden" id="action" name="action" value="buscar" />
                                <input type="hidden" id="controller" name="controller" value="homologaciones/programascontroller" />
                                <div class="col-sm-2 m-b-xs">                                    
                                    <?php echo $Formulario->addObject("MenuList", "nomcampos", $DOM["COMBOPROGRAMAS"], $combo_campos, "onchange=\"javascript:limpiarbusqueda();\"class='form-control' style='cursor:pointer;'") ?>
                                </div>      
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <input type="text" placeholder="Buscar" class="input-sm form-control" name="buscar" id="buscar" value="<?php echo $caja_busqueda; ?>"> <span class="input-group-btn">
                                            <button type="submit" class="btn btn-sm btn-primary"> Ir!</button></span>
                                    </div>
                                </div>
                            </form>
                        </div>    
                        <!--Finaliza el Buscador de Registros--> 
                        <div class="table-responsive">
                             <table id="melleva" class="table table-bordered table-striped table-highlight">
                                <?php echo $Face->headerTable($arr_cabeceras_tabla, $order, $Params);?>
                                <tbody>
                                    <?php
                                        $xhtml = "";
                                        $Url = clone $Params;
                                        $controller = "Modules_Homologaciones_Controllers_ProgramasController";
                                        foreach ($filas as $indice => $campo){
                                            $id_fila = $campo["id_programa"];
                                            $id_programa = $campo["id_programa"];
                                            $nombre = $campo["nombre"];
                                            $facultad = $campo["facultad"];
                                            $nivel = $campo["nivel"];
                                            $snies = $campo["snies"];
                                            //$tipo_equipo = $DOM["TIPOEQUIPO"][$campo["tipo"]];
                                           
                                            
                                            $Url->add("action", "eliminar");
                                            $Url->add("controller", $controller);
                                            $Url->add("id_programa", $id_programa);
                                            $params_eliminar = $Url->keyGen();

                                            $Url->add("action", "actualizar");
                                            $Url->add("id_programa", $id_programa);
                                            $params_actualizar = $Url->keyGen();
                                            
                                           
                                            $Url->add("id_programa", $id_programa);
                                            $params_equipo = $Url->keyGen();

                                            $xhtml.= "<tr id=\"".$id_fila."\">\n";
//                                            $xhtml.= "<td>{$id_programa}</td>";
                                            $xhtml.= "<td>{$nombre}</td>";
                                            $xhtml.= "<td>{$facultad}</td>";
                                            $xhtml.= "<td>{$nivel}</td>";
                                            $xhtml.= "<td>{$snies}</td>";
                                           
//                                            $xhtml.= "<td>";
//                                            $xhtml.= "  <div class=\"btn-toolbar\">";
//                                            $xhtml.= "  <div class=\"btn-group\">";
//                                            $xhtml.= "   <a title=\"Editar Programa\" class=\"btn btn-default abrir_f\" href=\"programas_editar.php?{$params_actualizar}\"><i class=\"icon-edit\"></i></a>";
//                                            $xhtml.= "   <a title=\"Eliminar Programa: {$id_programa}\" class=\"btn btn-default msgbox-confirm\" href=\"{$params_eliminar}\"><i class=\"icon-trash\"></i></a>";
//                                            //$xhtml.= "   <a title=\"Realizar Reporte\" class=\"btn btn-default abrir_f\" href=\"../../reportes/rep_hoja_vida.php?{$params_equipo}\" target='blank'><i class=\"icon-download-alt\"></i></a>";
//                                            $xhtml.= "  </div>";
//                                            $xhtml.= "  </div>";
//                                            $xhtml.= "</td>";
                                            
                                        $xhtml.= "<td>";
                                        $xhtml.= "   <a title=\"Editar Programas\" data-toggle=\"modal\" data-target=\"#VentanaFlotanteEditar\" href=\"Programas_editar.php?{$params_actualizar}\"><i class=\"fa fa-edit\"></i></a>";
                                        $xhtml.= "   <a href=\"#\" data-toggle=\"modal\" name=\"{$params_eliminar}\" data-target=\"#myModalDelete\" title=\"Eliminar : {$nombre}\"><i class=\"fa fa-trash-o text-navy\"></i></a>";
                                        $xhtml.= "</td>";
                                        
                                            $xhtml.= "</tr>\n";
                                        }
                                        echo $xhtml;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <?php echo $Paginador->showNavigation(); ?>
                        <?php
                    } else {
                        ?>
                        <div class="alert alert-warning alert-dismissable">
                            <button data-dismiss="alert" class="close" type="button">×</button>
                            <strong>ADVERTENCIA: </strong> No se encontraron Registros.
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!--VENTANA FLOTANTE PARA CREAR-->
<div role="dialog" tabindex="-1" id="VentanaFlotanteCrear" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span>
                <span class="sr-only">Cerrar</span></button>
                <h4 class="modal-title">Nuevo Programa</h4>
            </div>
            <div class="modal-body">
                <iframe id="contenedorIframe" width="540" height="275" src="" data-iframe-src="programas_crear.php" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>

<!--VENTANA FLOTANTE PARA EDITAR-->
<div role="dialog" tabindex="-1" id="VentanaFlotanteEditar" class="modal fade" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span>
                <span class="sr-only">Cerrar</span></button>
                <h4 class="modal-title">Editar Programas</h4>
            </div>
            <div class="modal-body">
                <iframe id="contenedorIframeeditar" width="540" height="170" src="" data-iframe-src="programas_editar.php?<?php echo $params_actualizar;?>" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>
