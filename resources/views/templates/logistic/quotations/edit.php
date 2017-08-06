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
                <p>
                    ID *: <input type="text" ng-model="registro.order_details_id" required disabled>
                </p>
                <p>
                    Proveedor *: 
                    <select 
                        ng-model="registro.suppliers_id" 
                        ng-keyup="suppliers.get('', $event.keyCode)" 
                        required>
                        <option 
                            ng-repeat="s in suppliers.registros" 
                            ng-value="s.id">
                            {{s.company_name}} 
                        </option>
                    </select>
                </p>
                <p>
                    Precio *: <input type="text" ng-model="registro.unit_price" required>
                </p>
                <button>Guardar</button>
            </form>
        </div>
        
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Orden detalle</th>
                        <th>suppliers</th>
                        <th>unit_price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="d in detalles">
                        <td ng-bind="d.id"></td>
                        <td ng-bind="d.order_details_id"></td>
                        <td ng-bind="d.suppliers_id"></td>
                        <td ng-bind="d.unit_price"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
</div>