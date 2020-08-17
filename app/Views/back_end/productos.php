<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Productos</h1>
    <a href="#" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#mldProductos">
        <i class="fas fa-plus fa-sm text-white-50"></i> Nuevo registro
    </a>
</div>
<div class="row">
    <!-- Area Chart -->
    <div class="col-12">
        <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Registros</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <table id="tablaCategorias" class="table table-hover table-striped table-bordered table-sm">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Producto</th>
                        <th>Talla</th>
                        <th>Marca</th>
                        <th>Precio</th>
                        <th>Estatus</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mldProductos" tabindex="-1" aria-labelledby="mldProductosLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mldProductosLabel">Nuevo Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="codigo">Código</label>
                        <input type="email" class="form-control" id="codigo" aria-describedby="emailHelp">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="producto">Producto</label>
                            <input type="email" class="form-control" id="producto" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="marca">Marca</label>
                            <select class="form-control" id="marca">
                                <option value="">Selecciona una opcion...</option>
                                <?php foreach($marca as $reg){ ?>
                                <option value="<?php echo $reg['id']; ?>"><?php echo $reg['marca']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="categoria">Categoria</label>
                            <select class="form-control" id="categoria" onchange="get_talla();">
                                <option value="">Selecciona una opcion...</option>
                                <?php foreach($categoria as $reg){ ?>
                                <option value="<?php echo $reg['id']; ?>"><?php echo $reg['categoria']; ?></option>
                                <?php } ?>
                            </select>
                        </div> 
                        <div class="form-group col-md-6">
                            <label for="tipo">Tipo</label>
                            <select class="form-control" id="tipo" onchange="get_talla();">
                                <option value="">Selecciona una opcion...</option>
                                <?php foreach($tipo as $reg){ ?>
                                <option value="<?php echo $reg['id']; ?>"><?php echo $reg['tipo']; ?></option>
                                <?php } ?>
                            </select>
                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="talla">Talla</label>
                            <select class="form-control" id="talla">

                            </select>
                        </div> 
                        <div class="form-group col-md-6">
                            <label for="precio">Precio</label>
                            <input type="text" class="form-control" id="precio">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" id="descripcion" rows="2" maxlength="250" style="resize: none"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="estatus">Estatus</label>
                        <select class="form-control" id="estatus">
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    function get_talla(){
        
        var categoria = $("#categoria").val(),
            tipo = $("#tipo").val();
        
        
        $.ajax({
            url:'productos/tallas',
            type:"POST",
            data:'catagoria='+categoria+'&tipo='+tipo,
            dataType:"json",
            success: function(html){
                var opciones = "<option value=''>Selecciona una opcion...</option>";
                $.each(html, function(key,value) {
                    opciones += "<option value='"+value.id+"'>"+value.talla+"</option>";
                });
                
                $("#talla").html(opciones);
            }
        });
    }
    
</script>