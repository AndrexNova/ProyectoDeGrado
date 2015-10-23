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
                        <i class="icon-plus"></i>
                        <h3>Agregar</h3>
                    </div> <!-- /widget-header -->
                    <div class="widget-content">
                        <form id="frm_programas" name="frm_programas" method="post" action="ramon.php" onsubmit="javascript:return verificar();">

                            <input type="hidden" id="action" name="action" value="crear" />
                            <input type="hidden" id="controller" name="controller" value="homologaciones/programascontroller" />

                            <div class="table-responsive">
                                <table border="0" width="95%" class="table table-striped table-condensed">
                                    <tbody>
                                        <tr>         
                                            <td><label class="col-sm-2 control-label">id</label></td>  
                                            <td><input type="text" class="form-control" name="id" id="id" required="true"/></td>                                    
                                            <td><label class="col-sm-2 control-label">Nombre</label></td>
                                            <td><input type="text" class="form-control" name="nombre" id="nombre" required="true"/></td>
                                            <td><label class="col-sm-2 control-label">Facultad</label></td>
                                            <td><input type="text" class="form-control" name="facultad" id="facultad" required="true"/></td>                                                
                                            <td><label class="col-sm-2 control-label">Nivel</label></td>                                                
                                            <td><input type="text" class="form-control" id="nivel" name="nivel" required="true" /></td>
                                            <td><label class="col-sm-2 control-label">SNIES</label></td>
                                            <td><input type="text" class="form-control" id="snies" name="snies" required="true" /></td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <table border="0" class="table table-striped table-condensed">
                                <tbody>
                                    <tr>
                                        <td colspan="4">
                                            <div align="center">
                                                <button id="btnAction" type="submit" class="btn btn-primary btn-sm">Crear</button>

                                            </div>  
                                        </td>
                                    </tr>
                                </tbody>
                            </table> 
                        </form>
                    </div>
                
                <div class="clear"></div>
            </div> <!-- /widget-content -->
        </div> <!-- /widget -->						
    </div> <!-- /span12 -->     	
</div> <!-- /row -->
</div> <!-- /container -->
</div> <!-- /main -->