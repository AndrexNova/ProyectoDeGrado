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
                           <div class="col-lg-8">
                    <form id="form_fin" name="form_fin" method="post" action="moon.php" onSubmit="javascript:return verificarfin();">
                        <fieldset>
                            <div class="control-group">   
                                <input type="hidden" value="finalizar" name="action" id="action">
                                <input type="hidden" value="<?php echo $cod_proyectogrado; ?>" name="codproyectogrado" id="codproyectogrado">
                                <input type="hidden" value="<?php echo $filas[0]['codrelproyusu']; ?>" name="codrelproyusu" id="codrelproyusu">
                                <input type="hidden" value="Trabajosdegrado/ProyectosGradoController" name="controller" id="controller">
                                <table width="95%">
                                    <tbody>
                                        <tr>
                                    <div class="alert alert-info">
                                        <button data-dismiss="alert" class="close" type="button">×</button>
                                        <strong>RECUERDE: </strong> Antes de finalizar, asegurece que sus datos esten diligenciados correctamente.
                                    </div>                      
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>
                                            <div align="left">
                                                <button id="btnAction" name="btnAction" type="submit" class="btn btn-success">Finalizar</button>&nbsp;

                                            </div>  
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>
                    </form>
                                 </div>
                </div>
                      </div>
            </div>
        </div> 
    </div>
</div>
