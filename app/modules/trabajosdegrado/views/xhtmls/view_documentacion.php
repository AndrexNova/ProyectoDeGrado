<?php
    if(!isset($DOM["SECURITY_ID"])) {
        echo "<h1>MOON2 Message:<br />Can not call view, requires the view controller</h1>";exit();
    }
?>
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <div class="widget stacked">
                    <div class="widget-header">
                        <i class="icon-list"></i>
                        <h3>FORMATOS</h3>
                    </div> <!-- /widget-header -->
                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table table-bordered table-highlight"m id="tbltarifas" name="tbltarifas">
                                <thead>
                                    <tr>
                                        <th width="50%">Propuesta y Doc.Final</th>
                                        <th width="30%">Cantidad de Formatos</th>                                    
                                        <th width="20%">&nbsp;</th>
                                    </tr>
                                </thead>
                                 <tbody>
                                <?php
                                $xhtml = "";
                                $Url = clone $Params;
                                foreach ($arr_modalidades as $indice => $campo) {
                                    $id_fila = $campo["codmodalidadgrado"];                                  
                                    $java_editar = "javascript:modo_edicion({$id_fila}, '" . $campo["nombremodalidad"] . "','" . $campo["valor"] . "');";

                                    $Url->add("codmodalidad", $id_fila);                                  
                                     $params_flotante = $Url->keyGen();

                                    $xhtml.= "<tr id=\"" . $id_fila . "\">\n";
                                    $xhtml.= " <td>" . $campo["nombremodalidad"] . "</td>\n";
                                    $xhtml.= " <td><div align=\"center\">" . $campo["cantformatos"] . "</div></td>\n";
                                    $xhtml.= " <td><div align=\"center\"><a title=\"Informacion Proyecto\" href=\"ver_formatos.php?".$params_flotante."\"> Ver Formatos </a></div></td>\n";                                                                                                                       
                                    $xhtml.= "</td>\n";                                    
                                    $xhtml.= "&nbsp;";
                                    $xhtml.= "</td>\n";
                                    $xhtml.= "</tr>\n";
                                }
                                echo $xhtml;
                                ?>
                            </tbody>
                            </table>
                        </div>
                    </div> <!-- /widget-content -->					
                </div> <!-- /widget -->		
            </div> <!-- /span8 -->
        </div> <!-- /widget-content -->					
    </div> <!-- /widget -->		
</div> <!-- /span8 -->
