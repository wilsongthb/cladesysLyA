<div class="container-fluid">
    <h2 class="text-center">{{config.title}} </h2>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <form ng-submit="agregarDetalle()">
                <legend>Producto</legend>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <label for="">Nombre del producto *</label>
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
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label for="">Precio unitario *</label>
                        <input ng-model="detalle.unit_price" type="text" class="form-control" required>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label for="">Cantidad *</label>
                        <input ng-model="detalle.quantity" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">  
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label for="">Fecha de expiracion *</label>
                        <input ng-model="detalle.expiration" type="text" class="form-control" placeholder="AAAA-MM-DD" required>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label for="">Fecha de fabricacion</label>
                        <input ng-model="detalle.fabrication" type="text" class="form-control" placeholder="AAAA-MM-DD">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label for="">Lote</label>
                        <input ng-model="detalle.lot" type="text" class="form-control">
                    </div>
                </div>
                
                <legend>Detalles de compra</legend>
                <div class="row form-group">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label for="">Proveedor *</label>
                        <select ng-model="detalle.suppliers_id" class="form-control" ng-keyup="suppliers.get('', $event.keyCode)" required>
                            <option ng-repeat="s in suppliers.registros" ng-value="s.id">{{s.company_name}} </option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label for="">Tipo de Ticket *</label>
                        <select ng-model="detalle.tickets_id" class="form-control" ng-keyup="tickets.get('', $event.keyCode)" required>
                            <option ng-repeat="t in tickets.registros" ng-value="t.id">{{t.name}} </option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label for="">Numero de Ticket *</label>
                        <input ng-model="detalle.ticket_number" type="text" class="form-control" required>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <label for="">Localizacion *</label>
                        <select ng-model="detalle.locations_id" class="form-control" ng-keyup="locations.get('', $event.keyCode)" required>
                            <option ng-repeat="l in locations.registros" ng-value="l.id">{{l.name}} </option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Agregar Detalle</button>
            </form>
            
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="panel panel-info">
                  <div class="panel-heading">
                        <h3 class="panel-title">Detalles del Producto</h3>
                  </div>
                  <div class="panel-body">
                        <p><b>Categoria:</b> {{product.categories_detail}} </p>
                        <p><b>Nombre:</b> {{product.detail}} </p>
                        <p><b>Marca:</b> {{product.brands_detail}} </p>
                        <p><b>Codigo de barras:</b> {{product.barcode}} </p>
                        <p><b>Medida:</b> {{product.measurements_detail}} </p>
                        <p><b>Empaquetado:</b> {{product.packings_detail}} </p>
                  </div>
            </div>
        </div>
        
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h3>Detalles</h3>
            <table class="table table-condensed table-hover table-bordered">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Ticket</th>
                        <th>Numero de Tickets</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="d in detalles track by $index">
                        <td>
                            <i class="fa fa-chevron-circle-up" title="Copiar arriba" ng-click="copiarArriba(d)"></i> - 
                            <i class="fa fa-trash" title="Eliminar" ng-click="detalles.splice($index, 1)"></i>
                        </td>
                        <td ng-bind="d.id"></td>
                        <td ng-bind="d.products_detail"></td>
                        <td ng-bind="d.tickets_id"></td>
                        <td ng-bind="d.ticket_number"></td>
                        <td ng-bind="d.quantity"></td>
                        <td ng-bind="d.unit_price"></td>
                        <td ng-bind="d.quantity * d.unit_price"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <th colspan="6">Total</th>
                        <td ng-bind="total()"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="row">
        
        <form class="col-xs-12 col-sm-12 col-md-12 col-lg-12" ng-submit="guardar()">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label for="">Observaciones</label>
                        <textarea rows="3" ng-model="registro.observation" class="form-control" placeholder="Nombre del producto, apariencia, etc"></textarea>
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