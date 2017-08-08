<div class="container">
    <h3 class="text-center">{{config.title}} </h3>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            
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
                    <tr ng-repeat="d in registros">
                        <td ng-bind="d.id"></td>
                        <td ng-bind="d.products_detail"></td>
                        <td ng-bind="d.quantity"></td>
                        <td title="{{d.detail}} "><i class="fa fa-table"></i> </td>
                        <td>
                            <button ng-click="cotizar(d.id)"><i class="fa fa-edit"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
            
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <form ng-submit="guardar()">
                <div class="form-group">
                    <label for="">ID</label>
                    <p class="form-control" ng-bind="registro.order_details_id"></p>
                </div>
                <div class="form-group">
                    <label for="">Proveedor *</label>
                    <select 
                        class="form-control"
                        ng-model="registro.suppliers_id" 
                        ng-keyup="suppliers.get('', $event.keyCode)" 
                        required>
                        <option 
                            ng-repeat="s in suppliers.registros" 
                            ng-value="s.id">
                            {{s.company_name}} 
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Precio *</label>
                    <input class="form-control" type="text" ng-model="registro.unit_price" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
        
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Proveedor</th>
                        <th>Precio Unitario</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="d in detalles">
                        <td>{{d.id}}_{{d.order_details_id}}</td>
                        <td ng-bind="d.products_detail"></td>
                        <td ng-bind="d.suppliers_name"></td>
                        <td ng-bind="d.unit_price"></td>
                        <td>
                            <button title="Eliminar" ng-click="eliminar(d.id)"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
</div>