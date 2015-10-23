//Flotante eliminar - Inicio
$(function () {
    $('#melleva').on('click', 'a.msgbox-confirm', function (e) {
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
                    if (result === "Aceptar"){
                        var obj = $("<form>") 
                        obj.attr("method", "GET");
                        obj.attr("action", $this.attr('href'));
                        moon2_process(obj);
                    }
                    //$("#result2").text(result);
                });
    });
});
//Flotante eliminar - Fin


//Flotante crear, editar - Inicio
$(function() {
    $(document).on('click', 'a.abrir_flotante', function (e) {
            e.preventDefault();
            var $this = $(this);
            var horizontalPadding = 20;
            var verticalPadding = 20;
            $('<iframe id="xflotante" src="' + this.href + '" />').dialog({
                    title: ($this.attr('title')) ? $this.attr('title') : 'Moon2',
                    autoOpen: true,
                    width: 830,
                    height: 390,
                    modal: true,
                    resizable: false,
                    hide: "clip",
                    show: "puff"
            }).width(800 - horizontalPadding).height(390 - verticalPadding);
    });
});
//Flotante crear - Fin