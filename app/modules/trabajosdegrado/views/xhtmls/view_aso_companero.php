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
              
                            <form id="form1" name="form1" method="post" action="moon.php" onSubmit="javascript:return verificar();">
                                <input type="hidden" name="tipoasignacion" id="tipoasignacion">
                                <input type="hidden" value="actualizartipoasignacion" name="action" id="action">

                                <input type="hidden" value="<?php echo $usu_proyecto; ?>" name="codrelproyusu" id="codrelproyusu">
                                <input type="hidden" value="Trabajosdegrado/DatosProyectoController" name="controller" id="controller">
                                <table class="">
                                    <div class="alert alert-success alert-dismissable">
                                        <button data-dismiss="alert" class="close" type="button">×</button>
                                        <strong>el estudiante  <?php echo $filass['nombres'] ?> te ha enviado una solicitud de trabajo de grado para la modalidad:  <?php echo $nombremodalidad; ?> </strong> 
                                    </div>
                                           <tr><td colspan="2">&nbsp;</td></tr>
                                           <div align="center">
                                   <button id="btnAction" name="btnAction" type="submit" class="btn btn-success">Aprobar</button>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp;
                                   
                                     <button id="btnAction" name="btnAction" type="button" onClick="javascript:return verificarrechazar();" class="btn btn-danger">Rechazar</button>

                                            </div>
                                </table>
                            </form>
                    
            				
            </div> <!-- /col-md-12 -->     	
        </div> <!-- /row -->
    </div> <!-- /container -->
</div> <!-- /main -->