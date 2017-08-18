<div class="container">
    <h3 class="text-center">{{config.title}} </h3>
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
            <!-- <button ng-click="" id="init_focus">Agregar</button> -->
            <form ng-submit="guardar_detalle()">
                <div class="form-group">
                    <label for="">Producto *</label>
                    <input 
                        type="text"
                        class="form-control"
                        placeholder="Buscar producto"
                        ng-model="detalle.products_detail"
                        ng-model-options="{ debounce: 1000 } "
                        ng-change="products.get(detalle.products_detail, false)">
                    <select 
                        ng-model="detalle.products_id" 
                        ng-change="selectProduct()"
                        class="form-control" 
                        required>
                        <option value="">Buscar...</option>
                        <option 
                            ng-repeat="p in products.registros" 
                            ng-value="p.id"
                            ng-bind="p.detail + ' - ' + p.barcode"></option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Cantidad</label>
                    <input type="text" class="form-control" ng-model="detalle.quantity" required>
                </div>
                <div class="form-group">
                    <label for="">Detalle: </label>
                    <textarea class="form-control" ng-model="detalle.detail" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Detalle</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="d in detalles">
                        <td ng-bind="d.id"></td>
                        <td ng-bind="d.products_detail"></td>
                        <td ng-bind="d.quantity"></td>
                        <!-- <td title="{{d.detail}} "><i class="fa fa-table"></i> </td> -->
                        <td ng-bind="d.detail"></td>
                        <!-- <td title="Eliminar"><button><i class="fa fa-remove"></i></button></td> -->
                        
                    </tr>
                </tbody>
            </table>
            
        </div>
    </div>
</div>