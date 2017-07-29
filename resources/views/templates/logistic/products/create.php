<div class="container">
    <div class="row">
        <h2 class="text-center">{{config.title}} </h2>
        <form class="col-xs-12 col-sm-12 col-md-12 col-lg-12" ng-submit="guardar()">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
                            <div class="form-group">
                                <label for="">Detalle *</label>
                                <input id="init_focus" ng-model="registro.detail" type="text" class="form-control" placeholder="Nombre del producto, apariencia, etc" required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="">Codigo *</label>
                                <input ng-model="registro.barcode" type="text" class="form-control" placeholder="Codigo de barras" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="">Marca *</label>
                                <input 
                                    type="text"
                                    class="form-control"
                                    placeholder="Buscar marca"
                                    ng-model="registro.brands_detail"
                                    ng-model-options="{ debounce: 1000 } "
                                    ng-change="brands.get(registro.brands_detail, false)"
                                    ng-show="!registro.brands_id">
                                <select ng-model="registro.brands_id" class="form-control" required>
                                    <option value="">Buscar...</option>
                                    <option ng-repeat="b in brands.registros" ng-value="b.id">{{b.detail}} </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="">Categoria *</label>
                                <input 
                                    type="text"
                                    class="form-control"
                                    placeholder="Buscar categoria"
                                    ng-model="registro.categories_detail"
                                    ng-model-options="{ debounce: 1000 } "
                                    ng-change="categories.get(registro.categories_detail, false)"
                                    ng-show="!registro.categories_id">
                                <select ng-model="registro.categories_id" class="form-control" required>
                                    <option value="">Buscar...</option>
                                    <option ng-repeat="c in categories.registros" ng-value="c.id">{{c.detail}} </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="">Unidad de Medida *</label>
                                <input 
                                    type="text"
                                    class="form-control"
                                    placeholder="Buscar unidad de medida"
                                    ng-model="registro.measurements_detail"
                                    ng-model-options="{ debounce: 1000 } "
                                    ng-change="measurements.get(registro.measurements_detail, false)"
                                    ng-show="!registro.measurements_id">
                                <select ng-model="registro.measurements_id" class="form-control" required>
                                    <option value="">Buscar...</option>
                                    <option ng-repeat="m in measurements.registros" ng-value="m.id">{{m.detail}} </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <legend>Empaquetado del producto</legend>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="">Paquete *</label>
                                <input 
                                    type="text"
                                    class="form-control"
                                    placeholder="Buscar paquete"
                                    ng-model="registro.packings_detail"
                                    ng-model-options="{ debounce: 1000 } "
                                    ng-change="packings.get(registro.packings_detail, false)"
                                    ng-show="!registro.packings_id">
                                <select ng-model="registro.packings_id" class="form-control" required>
                                    <option value="">Buscar...</option>
                                    <option ng-repeat="p in packings.registros" ng-value="p.id">{{p.detail}} </option>
                                </select>
                            </div>
                        </div>                
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="">Nivel *</label>
                                <input 
                                    ng-model="registro.level" 
                                    type="text" 
                                    class="form-control" 
                                    placeholder="1" 
                                    required>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="">Unidades *</label>
                                <input 
                                    ng-model="registro.units" 
                                    type="text" 
                                    class="form-control" 
                                    placeholder="1" 
                                    title="Numero de unidades menores que este producto"
                                    required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                        <label for="">Imagen</label>
                        <p><a class="btn btn-info" href="{{ APP_CONST.url + '/getimage' }} " target="_blank">Subir archivo</a></p>
                        <div ng-if="registro.image_path">
                            <img width="100" ng-src="{{config.url + '/' + registro.image_path}}" alt="Image">
                        </div>
                         <a class="btn btn-primary" data-toggle="modal" href='#modalSeleccionarImagen'>Seleccionar Imagen</a>
                        <div class="modal fade" id="modalSeleccionarImagen">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Imagenes <i class="fa fa-refresh" ng-click="images.get()"></i></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="media" ng-repeat="i in images.list">
                                            <img width="100" class="media-object" src="{{config.url}}/{{i}}" alt="Image" ng-click="registro.image_path = i">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            
            <!--mensaje de error-->
            <div class="alert alert-danger" ng-show="error">
                <button type="button" class="close" ng-click="error = false" aria-hidden="true">&times;</button>
                <strong>ERROR:</strong> Ocurrio un error :'(  , contacte a su administrador 
            </div>
            <button class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>