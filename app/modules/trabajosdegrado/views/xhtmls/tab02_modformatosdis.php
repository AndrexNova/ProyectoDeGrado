<?php
if (!isset($DOM["SECURITY_ID"])) {
    echo "<h1>MOON2 Message:<br />Can not call view, requires the view controller</h1>";
    exit();
}
?>
<form enctype="multipart/form-data" name="frm_formato" id="frm_formato" method="POST" action="moon.php" onsubmit="javascript:return managedProccess(this);">
    <input type="hidden" id="codformato" name="codformato" value="" />
    <input type="hidden" id="codmodalidad" name="codmodalidad" value="<?php echo $cod_modalidadgrado; ?>">
    <input type="hidden" id="action" name="action" value="adjuntarFormato" />
    <input type="hidden" id="controller" name="controller" value="Trabajosdegrado/ModalidadesGradoController" />

    <div class="table-responsive">
        <table width="95%" class="table table-bordered">
            <tbody>
                <tr>
                    <td><label class="col-sm-12 control-label">Documento:</label></td>
                    <td><input type="file" id="nombreformato" name="nombreformato" required style="cursor: pointer;"></td>
                </tr>
                <tr>
                    <td><label class="col-sm-12 control-label">Versión:</label></td>
                    <td><div class="col-sm-12"><input type="text" id="version" name="version" class="form-control" required></div></td>
                </tr>
                <tr>
                    <td><label class="col-sm-12 control-label">Descripción:</label></td>
                    <td><div class="col-sm-12"><textarea cols="70" rows="3" id="descripcion" name="descripcion" class="form-control" required></textarea></div></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Adjuntar documento</button>
    </div>
</form>