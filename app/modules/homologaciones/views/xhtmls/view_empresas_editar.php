<?php
if (!isset($DOM["SECURITY_ID"])) {
    echo "<h1>MOON2 Message:<br />Can not call view, requires the view controller</h1>";
    exit();
}
?>
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="widget stacked">
                    <div class="widget-header">
                        <i class="icon-edit"></i>
                        <h3>Editar</h3>
                    </div> <!-- /widget-header -->
                    <div class="widget-content">
                        <form id="frm_empresas" method="post" action="moon2.php" onSubmit="javascript:return checkform('frm_empresas');">
                            <input type="hidden" id="action" name="action" value="editar" />
                            <input type="hidden" id="codempresa" name="codempresa" value="<?php echo $Empresa->get_codempresa();?>" />
                            <input type="hidden" id="controller" name="controller" value="hojadevida/empresascontroller" />
                            <fieldset>
                                   <div class="table-responsive">
                                    <table border="0" width="95%" class="table table-striped table-condensed">
                                        <tbody>
                                            <tr>
                                                <td colspan="2"><label class="col-sm-2 control-label">Empresa</label></td>
                                                <td><label class="col-sm-6 control-label">Persona Natural</label></td>
                                                <td><label class="col-sm-2 control-label">Dirección</label></td>
                                                
                                                
                                            </tr>
                                            <tr>
                                                <td colspan="2"><input type="text" class="form-control validate[required,minSize[1],maxSize[200]]" id="nombre" name="nombre" size="50" tabindex="1" value="<?php echo $Empresa->get_nombre();?>" /></td>
                                                <td><input type="text" class="form-control validate[required,minSize[1],maxSize[200]]" id="personanatural" name="personanatural" size="50" tabindex="2" value="<?php echo $Empresa->get_personanatural();?>"/></td>
                                                <td><input type="text" class="form-control validate[required,minSize[1],maxSize[200]]" id="direccion" name="direccion" size="50" tabindex="3" value="<?php echo $Empresa->get_direccion();?>"/></td>
                                              
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                 <div class="table-responsive">
                                    <table border="0" width="95%" class="table table-striped table-condensed">
                                        <tbody>
                                            <tr>
                                                <td><label class="col-sm-2 control-label">Ciudad</label></td>
                                                <td><label class="col-sm-2 control-label">Pais</label></td>
                                                <td><label class="col-sm-2 control-label">Telefono</label></td>
                                                <td><label class="col-sm-2 control-label">fax</label></td>
                                                
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control validate[required,minSize[1],maxSize[200]]" id="ciudad" name="ciudad" size="30" tabindex="4" value="<?php echo $Empresa->get_ciudad();?>" /></td>
                                                <td><input type="text" class="form-control validate[required,minSize[1],maxSize[200]]" id="pais" name="pais" size="30" tabindex="5" value="<?php echo $Empresa->get_pais();?>"/></td>
                                                <td><input type="text" class="form-control" id="telefono" name="telefono" size="30" tabindex="6" value="<?php echo $Empresa->get_telefono();?>"/></td>
                                                <td><input type="text" class="form-control" id="fax" name="fax" size="30" tabindex="7" value="<?php echo $Empresa->get_fax();?>"/></td>
                                                
                                            </tr>
                                                <td><label class="col-sm-2 control-label">Celular</label></td>
                                                <td><label class="col-sm-2 control-label">Nit</label></td>
                                                <td><label class="col-sm-2 control-label">Email</label></td>
                                                <td><label class="col-sm-2 control-label">Regimen</label></td>
                                            </tr>
                                            <tr>
                                                <td><input type="text" class="form-control validate[required,minSize[1],maxSize[30]]" id="celular" name="celular" size="30" tabindex="8" value="<?php echo $Empresa->get_celular();?>"/></td>
                                                <td><input type="text" class="form-control validate[required,minSize[1],maxSize[200]]" id="nit" name="nit" size="30" tabindex="9" value="<?php echo $Empresa->get_nit();?>"/></td>
                                                <td><input type="text" class="form-control validate[required,custom[email],minSize[1],maxSize[200]]" id="email" name="email" size="30" tabindex="10" value="<?php echo $Empresa->get_email();?>"/></td>
                                                <td><?php echo $Formulario->addObject("MenuList", "regimen", $DOM["REGIMENEMPRESA"], $Empresa->get_regimen(), "class='form-control' tabindex='11'") ?></td>
                                                                                          
                                            </tr>
                                             <tr>
                                                <td><label class="col-sm-2 control-label">Estado</label></td>
                                                <td><label class="col-sm-2 control-label">&nbsp;</label></td>
                                                <td><label class="col-sm-2 control-label">&nbsp;</label></td>
                                                <td><label class="col-sm-2 control-label">&nbsp;</label></td>
                                            </tr>
                                            <tr>
                                                <td><?php echo $Formulario->addObject("MenuList", "estado", $DOM["ESTADO"], $Empresa->get_estado(), "class='form-control' tabindex='12'") ?></td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                                  
                                            </tr>
                                        </tbody>
                                    </table>
                                 </div>
                                    <table border="0" width="95%" class="table table-striped table-condensed">
                                            <tr>
                                                <td colspan="4">
                                                    <div align="center">
                                                        <button class="btn btn-success" type="submit" tabindex="13">Editar</button>&nbsp;
                                                       
                                                    </div>  
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table> 
                                </div>

                            </fieldset>

                        </form>
                        <div class="clear"></div>
                    </div> <!-- /widget-content -->
                </div> <!-- /widget -->						
            </div> <!-- /span12 -->     	
        </div> <!-- /row -->
    </div> <!-- /container -->
</div> <!-- /main -->