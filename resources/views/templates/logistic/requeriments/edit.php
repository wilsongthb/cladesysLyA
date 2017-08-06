<div class="container">
    <h3>{{title}} </h3>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <!-- <button ng-click="" id="init_focus">Agregar</button> -->
            <form ng-submit="guardar_detalle()">
                <p>
                    products_id:
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
                </p>
                <p>
                    quantity: <input type="text" ng-model="detalle.quantity" required>
                </p>
                <p>
                    detail: <textarea ng-model="detalle.detail" rows="3"></textarea>
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
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Detalle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="d in detalles">
                        <td ng-bind="d.id"></td>
                        <td ng-bind="d.products_detail"></td>
                        <td ng-bind="d.quantity"></td>
                        <td title="{{d.detail}} "><i class="fa fa-table"></i> </td>
                    </tr>
                </tbody>
            </table>
            
        </div>
    </div>
    
    
</div>