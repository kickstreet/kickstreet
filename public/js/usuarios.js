var _columns  = [
    { data: "id", className: "text-right"},
    {
        data: function (row, type, set) {
            let img = 
                (row.imagen != "" && row.imagen != null)
                ? "<img id='foto-id-"+row.id+"' src='"+row.imagen+"' width='48px' />" 
                : "<img id='foto-id-"+row.id+"' src='https://dummyimage.com/256x256/000/fff' width='48px' height='48px'/>";
            return  img;
        },
            className: "text-center" 
        },
    {   
        "data": function (row, type, set) {
            let label = row.firstname + " " + row.lastname;
            return label;
        },
        className: "text-center"
    },
    { data: "email",className:"text-center"},
    { 
        "data": function (row, type, set) {
            let label = row.estatus == "Activo" ? "<label class='badge badge-success'>" + row.estatus + "</label>" : "<label class='badge badge-danger'>" + row.estatus + "</label>";
            return label;
        },
        className: "text-center"
    },
    { data: "updated_at",className:"text-center"},
    {
        "data": function (row, type, set) {
            
            let a = row;
            let btnEditar   = "<button type='button' id='' class='btn btn-sm btn-warning edit' data-id='" + row.id + "' onclick='editarRegistro(" + (row.id) + ")'><i class='fas fa-edit'></i></button>";
            let btnFoto     = "<button type='button' id='foto-id-"+row.id+"' class='btn btn-sm btn-info ' data-id='" + row.id + "' onclick='cambiarFoto($(this))'><i class='fas fa-camera'></i></button>";
            let grupo       = btnEditar + "&nbsp;" + btnFoto ;
            return  grupo;
        },
        className: "text-center" 
    }
]