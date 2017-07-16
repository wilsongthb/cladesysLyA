<div class="container">
    <div class="row">
        <h2 class="text-center">{{config.title}} </h2>
        <form class="col-xs-12 col-sm-12 col-md-12 col-lg-12" ng-submit="guardar()">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="form-group">
                        <label for="">Detalle</label>
                        <input ng-model="registro.detail" type="text" class="form-control" placeholder="Nombre del producto, apariencia, etc" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="form-group">
                        <label for="">Codigo</label>
                        <input ng-model="registro.barcode" type="text" class="form-control" placeholder="Codigo de barras" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="form-group">
                        <label for="">Stock Minimo</label>
                        <input ng-model="registro.minstock" type="number" class="form-control" placeholder="1" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" title="No disponible aun">
                    <div class="form-group">
                        <label for="">Imagen</label>
                        <!-- <input ng-model="registro.image_file" type="file" required> -->
                        <input ng-model="registro.image_file" type="file" disabled>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="form-group">
                        <label for="">Marca</label>
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
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="form-group">
                        <label for="">Categoria</label>
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
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="form-group">
                        <label for="">Unidad de Medida</label>
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
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="form-group">
                        <label for="">Paquete</label>
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
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="form-group">
                        <label for="">Nivel</label>
                        <input ng-model="registro.level" type="text" class="form-control" placeholder="Nivel de empaquetado, para una unidad es 1, sucesivamente va aumentando" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="form-group">
                        <label for="">Unidades</label>
                        <input ng-model="registro.units" type="text" class="form-control" placeholder="De ser un paquete (nivel > 1), especificar cantidad de unidades contenidas" required>
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
    <hr>
</div>