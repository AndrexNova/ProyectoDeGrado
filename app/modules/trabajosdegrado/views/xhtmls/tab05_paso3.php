<?php
if (!isset($DOM["SECURITY_ID"])) {
    echo "<h1>MOON2 Message:<br />Can not call view, requires the view controller</h1>";
    exit();
}
?>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-xs-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">           
                    <div class="row">
                        <form id="frm_usuarios" method="POST" action="moon.php" onSubmit="javascript:return verificardatos();">
                            <input type="hidden" value="editarDatos" name="action" id="action">        
                            <input type="hidden" value="<?php echo $cod_proyectogrado; ?>" name="codproyectogrado" id="codproyectogrado">
                            <input type="hidden" value="<?php echo $codusuario; ?>" name="codusuario" id="codusuario">
                            <input type="hidden" value="Trabajosdegrado/ProyectosGradoController" name="controller" id="controller">

                            <div class="col-xs-6">
                                <div class="ibox float-e-margins">   
                                    <div class="ibox-content">
                                        <table width="90%">
                                            <tbody>                           

                                                <tr>
                                                    <td><label for="name" class="control-label">Apellidos</label></td>                                                 
                                                    <td><input type="text" id="primerapellido" name="primerapellido" class="form-control validate[required,minSize[3],maxSize[50]] text-input" size="30" value="<?php echo $Usuario->get_primerapellido() . ' ' . $Usuario->get_segundoapellido() ?>"  /><td>                                                   
                                                </tr>
                                                <tr>
                                                    <td><label for="name" class="control-label">Nombres</label></td>                                                  
                                                    <td><input type="text" id="nombres" name="nombres" class="form-control validate[required,minSize[3],maxSize[50]] text-input" size="30" value="<?php echo $Usuario->get_nombres() ?>"/></td>                                             
                                                </tr>
                                                <tr>
                                                    <td><label for="name" class="control-label">Código del Estudiante</label></td>                                             
                                                    <td> <input type="text" id="codestudiante" name="codestudiante" class="form-control validate[required,custom[integer],minSize[3],maxSize[50]] text-input" size="30" value="<?php echo $Usuario->get_documento() ?>" /></td>
                                                </tr>
                                              
                                            <td>&nbsp;</td>

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="ibox float-e-margins">   
                                    <div class="ibox-content">
                                        <table width="90%">
                                            <tbody>                           

                                                <tr>
                                                    <td><label for="name" class="control-label">E-mail </label></td>                                                  
                                                    <td><input type="text" id="correo" name="correo" class="form-control validate[required,minSize[3],maxSize[25]] text-input" size="30" value="<?php echo $Usuario->get_correo() ?>" /></td>
                                                </tr>
                                              <tr>
                                                    <td><label for="name" class="control-label">Tipo de sangre</label></td>                                                   
                                                    <td> <?php
                                                        echo $Formulariot->addObject("MenuList", "tiposangre", $arrValorest, $Usuario->get_tiposangre(), "class='form-control'");
                                                        echo $Formularior->addObject("MenuList", "rh", $arrValoresr, $Usuario->get_rh(), "class='form-control'");
                                                        ?></td>                                
                                                </tr>
                                            <td>&nbsp;</td>

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div align="left">                                           
                                <button id="btnAction" class="btn btn-success" type="submit">Aceptar</button>&nbsp;
                                <!--                                      <button id="btnCancel" class="btn" type="button">Siguiente</button>-->
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>