
<form  id="frm_simulacion" name="frm_simulacion" method="get"  onSubmit="javascript:return managedProccess(this);">       
    <input type="hidden" id="action" name="action" value="combo_ajax"/>
    <input type="hidden" id="controller" name="controller" value="homologaciones/materiascontroller" />
    <div class="table-responsive">
        <table   class="table table-striped table-condensed" border="0" width="100%">
            <tbody>
                <tr>
                    <td><label class="col-sm-12 control-label">Programa</label></td>
                    <td>
                        <div class="col-sm-12">
                         <?php echo $Formulario->addObject2("MenuList", "id_programa", $arr_programas, "", ""); ?>                                
                        </div>
                    </td>                    
                    <td></td>
                </tr>
                                        <div class="table-responsive">
                            <table id="melleva" class="table table-bordered table-striped table-highlight">
                                <?php echo $Face->headerTable($arr_cabeceras_tabla, $order, $Params); ?>
                                <tbody>
                                    <?php
                                    $xhtml = "";
                                    $Url = clone $Params;
                                    $controller = "Modules_Homologaciones_Controllers_MateriasController";
                                    foreach ($filas as $indice => $campo) {
                                        $id_fila = $campo["id_materia"];
                                        $id_materia = $campo["id_materia"];
                                        $nomenclatura = $campo["nomenclatura"];
                                        $nombre = $campo["nombre"];
                      
                                        

                                        $Url->add("action", "eliminar");
                                        $Url->add("controller", $controller);
                                        $Url->add("id_materia", $id_materia);
                                        $params_eliminar = $Url->keyGen();

                                        $Url->add("action", "actualizar");
                                        $Url->add("id_materia", $id_materia);
                                        $params_actualizar = $Url->keyGen();

                                        $Url->add("id_materia", $id_materia);
                                        $params_equipo = $Url->keyGen();

                                        $xhtml.= "<tr id=\"" . $id_fila . "\">\n";
                                        $xhtml.= "<td>{$nomenclatura}</td>";
                                        $xhtml.= "<td>{$nombre}</td>";
                                        $xhtml.= "<td>";
                                        $xhtml.= "<input type=\"text\" maxlength=\"3\" class=\"form-control error\" placeholder=\"Ingrese Su Nota\"  id=\"$id_materia\" name=\"$id_materia\" size=\"5\"   aria-required=\"true\" aria-invalid=\"true\"/>";

                                        $xhtml.= "</td>";

                                        $xhtml.= "</tr>\n";
                                    }
                                    echo $xhtml;
                                    ?>
                                </tbody>
                            </table>
                        </div>
            
<!--                <tr>
                    <td><label class="col-sm-12 control-label">Materia</label></td>
                    <td>
                        <div class="col-sm-6">
                         <?php echo $Formulario->addObject("MenuList", "id_materia", $arr_materias, "", "");?>                                
                        </div>
                    </td>
                    
                    <td>
                        <div class="col-sm-6">
                            <input type="text" maxlength="50" placeholder="Digite su nota" class="form-control error" id="nombre" name="nombre" size="40" tabindex="2" required aria-required="true" aria-invalid="true"/>
                        </div>
                    </td>
                </tr>
                <tr>-->
                
                
                
                    <td colspan="2"><button type="submit" class="btn btn-primary">Agregar</button></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</form>