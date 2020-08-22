<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tallas</h1>
    <a href="#" class=" d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="nuevoRegistro" onclick="nuevoRegistro()">
        <i class="fas fa-plus fa-sm text-white-50"></i> Nuevo registro
    </a>
</div>
<div class="row">
    <div class="col-12">
        <div class="alert alert-success d-none" id="mensajeGeneral"></div>
    </div>
</div>
<div class="row card-component" id="contenedoRegistro" width="100%">
    <!-- Area Chart -->
    <div class="col-12">
        <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Registros</h6>
            </div>
            
            
            <!-- Card Body -->
            <div class="card-body">
                <table id="tablaRegistros" class="table table-hover table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Categoria</th>
                            <th>Tipo</th>
                            <th>Talla</th>
                            <th>Estatus</th>
                            <th>Fecha</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Form  -->
<div class="row card-component d-none" id="contenedorForm">
    <!-- Area Chart -->
    <div class="col-12">
        <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
            <div id="headerForm" class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 id="titleForm" class="m-0 font-weight-bold text-primary title"></h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form id="formData">
                    <div class="row">
                        <label class="col-12" for="">Categoría</label>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="hidden" value="0" class="form-control" name="id" id="id">
                                <select name="id_categoria" id="id_categoria" class="form-control"></select>
                            </div>
                        </div>
                        <label class="col-12" for="">Tipo</label>
                        <div class="col-12">
                            <div class="form-group">
                                <select name="id_tipo" id="id_tipo" class="form-control"></select>
                            </div>
                        </div>
                        <label class="col-12" for="">Talla</label>
                        <div class="col-12">
                            <div class="form-group">
                                
                                <input type="text" class="form-control" name="talla" id="talla">
                            </div>
                        </div>
                        <label class="col-12" for="">Estatus</label>
                        <div class="col-12">
                            <div class="form-group">
                                <select name="estatus" id="estatus" class="form-control">
                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-danger d-none" id="errorsForm">
                            
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12" align="right">
                            <span onclick="guardarRegistro()" class="btn btn-sm btn-success pull-right"> 
                                <i class="fas fa-save"></i> 
                                Guardar
                            </span>
                            <span onclick="cancelarRegistro()" class="btn btn-sm btn-danger pull-right"> 
                                <i class="fas fa-arrow-left"></i> 
                                Cancelar
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End form -->
<div class="row card-component d-none" id="contenedorCarga">
    <!-- Area Chart -->
    <div class="col-12">
        <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Selecciona la imagen</h6>
                <span onclick="cancelarCarga()" class="btn btn-sm btn-primary pull-right"> <i class="fas fa-arrow-left"></i> Regresar</span>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <input type="file" name="upload_image" id="upload_image" />
                <br />
                <div id="uploaded_image"></div>
            </div>
        </div>
    </div>
</div>




<div id="uploadimageModal" class="modal" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
      		<div class="modal-body">
        		<div class="row">
  					<div class="col-xs-12 col-sm-12 text-center">
						  <div id="image_demo" style="width:100%"></div>
  					</div>
				</div>
                <div class="row">
                    <div class="col-12">
                        <div id="mensajeCargando" class="d-none alert alert-info"><b>Cargando imagen...</b></div>
                    </div>
                </div>
      		</div>
      		<div class="modal-footer">
                <button class="btn btn-success crop_image" id="crop_image" data-id="">Cargar imagen</button>
                <button onclick="cancelarCarga()" type="button" class="btn btn-info btn-default" data-dismiss="modal">Cancelar</button>
      		</div>
    	</div>
    </div>
</div>
<link rel="stylesheet" href="/public/css/croppie.css">
