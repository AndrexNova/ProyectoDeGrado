<?php
if (!isset($DOM["SECURITY_ID"])) {
    echo "<h1>MOON2 Message:<br />Can not call view, requires the view controller</h1>";
    exit();
}
?>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                    <div class="ibox-content">
                        <?php
                        echo $Tabulador->show();
                        ?>
                        <div class="tabbable">

                            <div class="tab-content">
                                <!--                                <div id="paso1" class="tab-pane active">-->
                                <form onsubmit="javascript:return verificar('frm_radicar');" action="moon.php" method="POST" role="form" class="form-horizontal" id="frm_radicar" name="frm_radicar" enctype="multipart/form-data">
                                    <input type="hidden" value="iniciarRadicacion" name="action" id="action">
                                    <input type="hidden" value="<?php echo $DOM['USER_ID']; ?>" name="codusuario" id="codusuario">
                                              <input type="hidden" value="<?php echo $cod_temas; ?>" name="codtema" id="codtema">
                                    <input type="hidden" value="Trabajosdegrado/ProyectosGradoController" name="controller" id="controller">
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="ibox float-e-margins">
                                                    
                                                    <div class="ibox-title">
                                                        <br />
                                                        <h5>Pasos para radicar Trabajo de Grado</h5>
                                                    </div>
                                                    <div class="ibox-content">
                                                        <div  class="form-group"> 
                                                            <label class="col-sm-3" for="titulo">Recibo de Pago:<br /><div class="verdenormal">Sólo imagenes: jpg, gif, png (máx 1 mega)</div></label>
                                                            <div class="col-sm-6">
                                                                <input type="file" class="validate[required]" name="nombreconsignacion" id="nombreconsignacion">
                                                            </div>
                                                        </div> 
                                                        <div  class="form-group"> 
                                                            <label class="col-sm-3" for="titulo">Número de Consignación:</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control validate[required]" name="numero" id="numero">
                                                                <br /><div class="verdenormal">se encuentra en la parte superior derecha ejemplo LQ-00012345</div>
                                                            </div>
                                                        </div> 
                                                        <div  class="form-group"> 
                                                            <label class="col-sm-3" for="titulo">Valor de Pago:</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control validate[required]" name="valor" id="valor">
                                                            </div>
                                                        </div> 
                                                        <div  class="form-group"> 
                                                            <label class="col-sm-3" for="titulo">Fecha Consignación:</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control validate[required]" name="fecha" id="fecha" onfocus="this.blur();">
                                                                <img border="0" style="cursor:pointer; display: inline" id="btn_fecha" src="../../../images/calendar.png">

                                                            </div>

                                                        </div> 
                                                        <div align="center" class="form-group">
                                                            <button id="btnAction" name="btnAction" type="submit" class="btn btn-primary">Iniciar proceso de radicación</button>&nbsp;
                                                            <button id="btnCancel" name="btnCancel" type="reset" class="btn btn-default">Cancelar</button>
                                                        </div>  
                                                    </div>

                                                    </fieldset>
                                                    </form>
                                                </div>

                                            </div>
                                                            
                                        </div> <!-- /widget-content -->					
                                        </div> <!-- /col-md-12 -->     	
                                        </div> <!-- /row -->
                                        </div> <!-- /container -->
                                        <script type="text/javascript">
                                            //<![CDATA[
                                            var cal = Calendar.setup({
                                                onSelect: function (cal) {
                                                    cal.hide()
                                                },
                                                showTime: false
                                            });
                                            cal.manageFields("btn_fecha", "fecha", "%d/%m/%Y");
                                            //]]>
                                        </script>