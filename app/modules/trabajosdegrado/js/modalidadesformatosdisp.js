//Validación de formulario adjuntar - Inicio
jQuery(document).ready(function(){
    $("#frm_formato").validationEngine();
});

function verificar(){
    var obj_formulario = $("#frm_formato");
    if (obj_formulario.validationEngine('validate')){
        if (moon2_process(obj_formulario)){
            return true;
        }
    }
    return false;
}
//Validación de formulario adjuntar - Fin

//Flotante - Deasignar formato - INICIO
$(function () {
    $(document).on('click', 'a.msgbox-confirm', function (e) {
            e.preventDefault();
            var $this = $(this);
            var txt = $this.attr('title');
            $.msgbox("¿ Está seguro que desea realizar la siguiente acción: <br />" +txt, {
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
                });
    });
});
//Flotante - Deasignar formato - FIN