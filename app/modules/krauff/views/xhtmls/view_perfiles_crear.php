<?php
if (!isset($DOM["SECURITY_ID"])) {
    echo "<h1>MOON2 Message:<br />Can not call view, requires the view controller</h1>";
    exit();
}
?>
<form id="frm_perfil" name="frm_perfil" method="post" action="moon2.php" onSubmit="javascript:return managedProccess(this);">       
    <input type="hidden" id="action" name="action" value="crear"/>
    <input type="hidden" id="controller" name="controller" value="krauff/perfilescontroller" />
    <div class="table-responsive">
        <table class="table table-striped table-condensed" border="0" width="100%">
            <tbody>
                <tr>
                    <td><label class="col-sm-12 control-label">Nombre</label></td>
                    <td><div class="col-sm-12">
                            <input type="text" class="form-control error" id="nombreperfil" name="nombreperfil" size="40" tabindex="1" required aria-required="true" aria-invalid="true"/>
                        </div>
                    </td>
                </tr>
                <tr><td colspan="2"><button type="submit" class="btn btn-primary">Agregar</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</form>