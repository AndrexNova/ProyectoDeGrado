//Validación de formulario adjuntar - Inicio
jQuery(document).ready(function(){
    $("#frm_radicar").validationEngine();
});

function verificar(){
    var obj_formulario = $("#frm_ant");
    if (obj_formulario.validationEngine('validate')){
        if (moon2_process(obj_formulario)){
            return true;
        }
    }
    return false;
}

$(function () {
    $(document).on('click', 'a.descargar', function (e) {
            e.preventDefault();
            var $this = $(this);
            var txt = $this.attr('title');

                        var obj = $("<form>") 
                        obj.attr("method", "GET");
                        obj.attr("action", $this.attr('href'));
                        moon2_process(obj);

    });
});

$(function () {
    $(document).on('click', 'a.msgbox-confirm', function (e) {
            e.preventDefault();
            var $this = $(this);
            var txt = $this.attr('title');
            $.msgbox("¿ Está seguro que desea borrar el registro ? <br />" +txt, {
              type: "confirm",
              buttons : [
                {type: "submit", value: "Aceptar"},
                {type: "cancel", value: "Cancelar"}
              ]
            },  function(result) {
                    if (result == "Aceptar"){
                        var obj = $("<form>") 
                        obj.attr("method", "GET");
                        obj.attr("action", $this.attr('href'));
                        moon2_process(obj);
                    }
                    //$("#result2").text(result);
                });
    });
});
//Validación de formulario adjuntar - Fin