//Validación de formulario adjuntar - Inicio
jQuery(document).ready(function(){
    $("#frm_radicar").validationEngine();
});

function verificar(){
    var obj_formulario = $("#frm_radicar");
        if (moon2_process(obj_formulario)){
            return true;
        }
    return false;
}
//Validación de formulario adjuntar - Fin