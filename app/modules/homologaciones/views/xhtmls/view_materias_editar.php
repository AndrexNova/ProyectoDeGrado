<?php
if (!isset($DOM["SECURITY_ID"])) {
    echo "<h1>MOON2 Message:<br />Can not call view, requires the view controller</h1>";
    exit();
}
?>
<form id="frm_programas" method="ajax" onSubmit="javascript:return managedProccess(this);">
    <input type="hidden" id="action" name="action" value="editar" />
    <input type="hidden" id="id_programa" name="id_programa" value="<?php echo $Programa->get_id_programa() ?>" />
    <input type="hidden" id="controller" name="controller" value="homologaciones/programascontroller" />
    <div class="table-responsive">
        <table class="table table-striped table-condensed" border="0" width="100%">
            <tbody>
                <tr>
                    <td><label class="col-sm-12 control-label">Nombre</label></td>
                    <td><div class="col-sm-12">
                            <input type="text" class="form-control error" id="nombre" name="nombre" size="40" tabindex="1" value="<?php echo $Programa->get_nombre(); ?>" required="" aria-required="true" aria-invalid="true"/>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><label class="col-sm-12 control-label">Facultad</label></td>
                    <td><div class="col-sm-12">
                            <input type="text" class="form-control error" id="facultad" name="facultad" size="40" tabindex="1" value="<?php echo $Programa->get_facultad(); ?>" required="" aria-required="true" aria-invalid="true"/>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><label class="col-sm-12 control-label">Nivel</label></td>
                    <td><div class="col-sm-12">
                            <input type="text" class="form-control error" id="nivel" name="nivel" size="40" tabindex="1" value="<?php echo $Programa->get_nivel(); ?>" required="" aria-required="true" aria-invalid="true"/>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><label class="col-sm-12 control-label">Snies</label></td>
                    <td><div class="col-sm-12">
                            <input type="text" class="form-control error" id="snies" name="snies" size="40" tabindex="1" value="<?php echo $Programa->get_snies(); ?>" required="" aria-required="true" aria-invalid="true"/>
                        </div>
                    </td>
               <?php echo $Programa->get_id_programa() ?>
                </tr>
                <tr><td colspan="2"><button type="submit" class="btn btn-primary">Editar</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</form>
