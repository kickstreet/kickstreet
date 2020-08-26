$(document).ready(function(){
        
    $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
        width:256,
        height:256,
        type:'square' //circle
    },
    boundary:{
        width:300,
        height:300
    }
});

$('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
        $image_crop.croppie('bind', {
        url: event.target.result
        }).then(function(){
            console.log('jQuery bind complete');
        });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
});

$('.crop_image').click(function(event){
    $image_crop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function(response){

        $("#mensajeCargando").removeClass("d-none");
        $(".modal-footer").addClass("d-none");
        $.ajax({
            url: window.location.pathname + "/guardarImagen",
            type: "POST",
            dataType: "json",
            data:{
                "imagen": response,
                "id":$("#crop_image").data("id")
            },
            success:function(data){

                $("#mensajeCargando").addClass("d-none");
                $(".modal-footer").removeClass("d-none");
                $("#foto-id-" + $("#crop_image").data("id")).attr("src",response);
                $('#uploadimageModal').modal('hide');
                $('#uploaded_image').html(data);

                cancelarCarga()
            }
        });
    })
});

init();
})

var oTable = {};

function init(){    
    $.getJSON(window.location.pathname + '/lista', function(response) {
        oTable = $('#tablaRegistros').dataTable({
            processing: true,
            data: response.data,
            columns: _columns,
            order: [[ 0, "asc" ]],
            language:{
                url: "/assets_admin/vendor/datatables/language.json"
            }
        });
    });
}

function cambiarFoto(e){
    console.log(e);
    $("#crop_image").data("id",e.data("id"));
    $(".card-component").fadeOut(500);
    $("#contenedorCarga").removeClass("d-none").fadeIn(1000);
}

function cancelarCarga(){
$(".card-component").fadeOut(500);
$("#contenedoRegistro").removeClass("d-none").fadeIn(1000);
}

function cancelarRegistro(){
$(".card-component").fadeOut(500);
$("#contenedoRegistro").fadeIn(1000);
}

function guardarRegistro(){
$.ajax({
    url     : window.location.pathname + "/guardar",
    type    : "post",
    data    : $("#formData").serialize(),
    dataType: "json",
    success :function(response){
        if(!response.success){
            $("#errorsForm").removeClass("d-none").html(response.mensaje);
        }else{
            $(".card-component").fadeOut(500);
            $("#mensajeGeneral").removeClass("d-none").text(response.mensaje).fadeOut(10000);
            $("#errorsForm").addClass("d-none").html("");
            $("#contenedoRegistro").fadeIn(1000);
            oTable.fnDestroy();
            $("#tablaRegistros tbody").html("");
            init();

        }
    },
    error   : function(e){
        console.log(e);
    }
});
}

function nuevoRegistro(){
$("#id").val(0);
$(".card-component").fadeOut(500);
$("#headerForm #titleForm").text("Nuevo registro");
$("#contenedorForm").removeClass("d-none").fadeIn("1000");
}

function editarRegistro(e){
console.log(e);

$.ajax({
    url     :   window.location.pathname + "/obtenerRegistro/" + e,
    dataType:   "json",
    success :  function(response){
        $.each(response,function(i,v){
            $.each(v,function(j,w){
                $("#"+j).val(w);   
            });
        });
    },
    error   :   function(e){
        console.log(e);
    } 
});

$(".card-component").fadeOut(500);
$("#headerForm #titleForm").text("Editar registro");
$("#contenedorForm").removeClass("d-none").fadeIn("1000");
}
