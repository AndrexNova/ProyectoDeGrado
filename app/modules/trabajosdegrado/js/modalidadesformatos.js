//Flotante - Deasignar formato - INICIO
$(function () {
    $(document).on('click', 'a.msgbox-confirm', function (e) {
            e.preventDefault();
            var $this = $(this);
            var txt = $this.attr('title');
            $.msgbox("¿ Está seguro que desea desasignar este formato ? <br />" +txt, {
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

//Flotante - ver formatos disponibles - INICIO
$(function() {
    $(document).on('click', 'a.flotante_disponibles', function (e) {
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
            }).width(940 - horizontalPadding).height(470 - verticalPadding);
    });
});
//Flotante - ver formatos disponibles - FIN

//VENTANA FLOTANTE CREAR
$(document).ready(function(){
    $('#VentanaFlotanteCrear').on('shown.bs.modal', function (e) {
        var src = $('#contenedorIframe').attr('data-iframe-src');
        $('#contenedorIframe').attr('src', src);
    });

    $('#VentanaFlotanteCrear').on('hidden.bs.modal', function (e) {
        $('#contenedorIframe').attr('src', '');
    });
});
