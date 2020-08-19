$(document).ready(function () {
    
    var datos_tabla = '';
    
    $("#btn_guardar").click(function () {
        
        var datos = $("#form_productos").serialize();
        $.ajax({
            url: 'productos/nuevo_producto',
            type: "POST",
            data: datos,
            success: function (html) {
                if(html.trim()=='1'){
                    $("#mldProductos").modal('toggle');
                    $('#form_productos').trigger("reset");
                    alert("Producto agregado correctamente!!!.");
                }else{
                    alert("El producto NO pudoo ser creado.");
                }
            }
        });
    });

});

function get_talla() {

    var 
        categoria = $("#categoria").val(),
        tipo = $("#tipo").val();

    $.ajax({
        url: 'productos/tallas',
        type: "POST",
        data: 'catagoria=' + categoria + '&tipo=' + tipo,
        dataType: "json",
        success: function (html) {
            var opciones = "<option value=''>Selecciona una opcion...</option>";
            $.each(html, function (key, value) {
                opciones += "<option value='" + value.id + "'>" + value.talla + "</option>";
            });

            $("#talla").html(opciones);
        }
    });
}