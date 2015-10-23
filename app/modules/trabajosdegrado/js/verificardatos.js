/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function verificar(){
    var obj_formulario = $("#form1");
    estado=$("#estado").val();
    if(estado!=7)
        $("#estado").attr("value",3);
    
    if (obj_formulario.validationEngine('validate')){
        if (moon2_process(obj_formulario)){
            return true;
        }
    }
    return false;
}

function verificarrechazar(){
   
    $("#estado").attr("value",7);
    $("#form1").submit();    
}

//Flotante - ver formatos disponibles - INICIO
$(function() {
    $(document).on('click', 'a.flotante_consignacion', function (e) {
            e.preventDefault();
            var $this = $(this);
            var horizontalPadding = 20;
            var verticalPadding = 20;
            $('<iframe id="xflotante" src="' + this.href + '" />').dialog({
                    title: ($this.attr('title')) ? $this.attr('title') : 'Moon2',
                    autoOpen: true,
                    width: 970,
                    height: 500,
                    modal: true,
                    resizable: false,
                    hide: "clip",
                    show: "puff"
            }).width(970 - horizontalPadding).height(500 - verticalPadding);
    });
});
//Flotante - ver formatos disponibles - FIN