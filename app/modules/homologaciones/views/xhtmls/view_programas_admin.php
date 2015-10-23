<?php
    if(!isset($DOM["SECURITY_ID"])) {
        echo "<h1>MOON2 Message:<br />Can not call view, requires the view controller</h1>";exit();
    }
    $Paginador = new Moon2_Pagination_Pager($rsNumRows, $limit_numrows, $num_page, $Params);
?>
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="widget stacked">	
                    <div class="widget-header">
                        <i class="icon-list"></i>
                        <h3>Equipos<a class="abrir_flotant" href="programas_crear.php" title="Nuevo Equipo"><i class="icon-save btn btn-default"></i></a></h3>
                    </div> <!-- /widget-header -->
                    <div class="widget-content">
                          <?php 
                    if ($cantidad_filas>0){
                    ?>
                     <!--Buscador de Registros-->    
                        <form id="frm_programas" method="post" action="moon24.php" onSubmit="javascript:return checkform_ajax('frm_programas');"> 
                            <input type="hidden" id="action" name="action" value="buscar" />
                            <input type="hidden" id="controller" name="controller" value="homologaciones/programascontroller" />
                            <table border="0" wedth="95%" class="table table-hover table-condensed">
                                <tr>
                                    <td width="65%"><p class="news-item-preview">&nbsp;<?php echo $Paginador->showDetails(); ?></p></td>
                                <td width="5%"><?php echo $Formulario->addObject("MenuList", "nomcampos", $DOM["BUSCAEQUIPO"], "1", "class='form-control'","onchange='javascript:limpiarbusqueda(); 'class='form-control' style='cursor:pointer;'") ?></td>
                                    <td><input type="text" class="form-control validate[required,minSize[1],maxSize[30]]" id="buscar" name="buscar" size="40" value="<?php echo $caja_busqueda; ?>" /></td>
                                    <td><button class="btn btn-success" type="submit" tabindex="11">Buscar</button></td>
                                </tr>
                            </table>
                        </form>  
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
                                            $Url->add("codequipo", $id_programa);
                                            $params_eliminar = $Url->keyGen();

                                            $Url->add("action", "actualizar");
                                            $Url->add("codequipo", $id_programa);
                                            $params_actualizar = $Url->keyGen();
                                            
                                           
                                            $Url->add("codequipo", $id_programa);
                                            $params_equipo = $Url->keyGen();

                                            $xhtml.= "<tr id=\"".$id_fila."\">\n";
                                            $xhtml.= "<td>{$id_programa}</td>";
                                            $xhtml.= "<td>{$nombre}</td>";
                                            $xhtml.= "<td>{$facultad}</td>";
                                            $xhtml.= "<td>{$nivel}</td>";
                                            $xhtml.= "<td>{$snies}</td>";
                                           
                                            $xhtml.= "<td>";
                                            $xhtml.= "  <div class=\"btn-toolbar\">";
                                            $xhtml.= "  <div class=\"btn-group\">";
                                            $xhtml.= "   <a title=\"Editar Equipo\" class=\"btn btn-default abrir_f\" href=\"equipos_editar.php?{$params_actualizar}\"><i class=\"icon-edit\"></i></a>";
                                            $xhtml.= "   <a title=\"Eliminar Equipo: {$facultad}\" class=\"btn btn-default msgbox-confirm\" href=\"{$params_eliminar}\"><i class=\"icon-trash\"></i></a>";
                                            //$xhtml.= "   <a title=\"Realizar Reporte\" class=\"btn btn-default abrir_f\" href=\"../../reportes/rep_hoja_vida.php?{$params_equipo}\" target='blank'><i class=\"icon-download-alt\"></i></a>";
                                            $xhtml.= "  </div>";
                                            $xhtml.= "  </div>";
                                            $xhtml.= "</td>";
                                            $xhtml.= "</tr>\n";
                                        }
                                        echo $xhtml;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <?php echo $Paginador->showNavigation();?>
                         <?php
                        }else{
                        ?>
                       
                        <div class="alert alert-warning alert-dismissable">
                                <button data-dismiss="alert" class="close" type="button">×</button>
                                <strong>ADVERTENCIA: </strong> No se encontraron Registros.
                        </div>
                        <?php
                        }
                        ?>
                    </div> <!-- /widget-content -->
                </div> <!-- /widget -->						
            </div> <!-- /span12 -->     	
        </div> <!-- /row -->
    </div> <!-- /container -->
</div> <!-- /main -->
