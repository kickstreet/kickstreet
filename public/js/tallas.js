var _columns  = [
    { data: "id", className: "text-right"},
    { data: "categoria"},
    { data: "tipo"},
    { data: "talla"},
    { 
        "data": function (row, type, set) {
            let label = row.estatus == "Activo" ? "<label class='badge badge-success'>" + row.estatus + "</label>" : "<label class='badge badge-danger'>" + row.estatus + "</label>";
            return label;
        },
        className: "text-center"
    },
    { data: "fecha_actualizacion",className:"text-center"},
    {
        "data": function (row, type, set) {
            
            let a = row;
            let btnEditar   = "<button type='button' id='' class='btn btn-sm btn-warning edit' data-id='" + row.id + "' onclick='editarRegistro(" + (row.id) + ")'><i class='fas fa-edit'></i></button>";
            let btnFoto     = "";//"<button type='button' id='foto-id-"+row.id+"' class='btn btn-sm btn-info ' data-id='" + row.id + "' onclick='cambiarFoto($(this))'><i class='fas fa-camera'></i></button>";
            let grupo       = btnEditar + "&nbsp;" + btnFoto ;
            return  grupo;
        },
        className: "text-center" 
    }
];


$(document).ready(function(){
    $.ajax({
        url         : "/categorias/lista",       
        dataType    : "json" ,
        success     : function(response){
            let options = "";
            console.log(response.data);
            $.each(response.data,function(i,v){
                options += "<option value='" + v.id + "'>" + v.categoria + "</option>";
            });
            $("#id_categoria").html(options)
        }
    });

    $.ajax({
        url         : "/tipos/lista",       
        dataType    : "json" ,
        success     : function(response){
            let options = "";
            console.log(response.data);
            $.each(response.data,function(i,v){
                options += "<option value='" + v.id + "'>" + v.tipo + "</option>";
            });
            $("#id_tipo").html(options)
        }
    }); 
    
});
