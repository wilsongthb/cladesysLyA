<div class="container">
    <div class="row">
        <h2 class="text-center">CREAR {{config.title}} </h2>
        <form class="col-xs-12 col-sm-12 col-md-12 col-lg-12" ng-submit="guardar()">
            <div class="row">
                
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <label for="">Observaciones</label>
                        <textarea rows="3" ng-model="registro.detail" class="form-control" placeholder="Nombre del producto, apariencia, etc"></textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
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
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h3>Detalles</h3>
            <a class="btn btn-primary" data-toggle="modal" href='#input_details_create'><i class="fa fa-plus"></i> Agregar Detalle</a>
            <!-- este modal es para crear un detalle de entrada -->
            <div class="modal fade" id="input_details_create">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Agregar Detalle</h4>
                        </div>
                        <div class="modal-body">

                            <legend>Producto</legend>
                            <div class="form-group">
                                <label for="">Detalle</label>
                                <input 
                                    class="form-control" 
                                    ng-if="!registro_detalle.products_id"
                                    ng-model="registro_detalle.products_detail" 
                                    ng-model-options="{ debounce: 1000 }"
                                    type="text" 
                                    ng-change="products.get($event.keyCode, registro_detalle.products_detail, true)" 
                                    placeholder="Buscar con [ctrl]"
                                >
                                <select ng-model="registro_detalle.products_id" class="form-control" required>
                                    <option ng-focus="registro_detalle.products_id = false"></option>
                                    <option ng-repeat="p in products.registros" value="{{p.id}} ">{{p.detail}} </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Precio unitario</label>
                                <input ng-model="registro_detalle.unit_price" type="number" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Cantidad</label>
                                <input ng-model="registro_detalle.quantity" type="number" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Fecha de expiracion</label>
                                <input ng-model="registro_detalle.expiration" type="date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Fecha de fabricacion</label>
                                <input ng-model="registro_detalle.fabrication" type="date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Lote</label>
                                <input ng-model="registro_detalle.lot" type="number" class="form-control">
                            </div>
                            
                            <label for="">Compra</label>
                            <div class="form-group">
                                <label for="">Tipo de Ticket</label>
                                <input class="form-control" ng-model="registro_detalle.tickets_name" type="text" ng-keyup="tickets.get($event.keyCode, registro_detalle.tickets_name)" placeholder="Buscar con [ctrl]">
                                <select ng-if="!ng-repe" ng-model="registro_detalle.tickets_id" class="form-control" required>
                                    <option ng-repeat="t in tickets.registros" value="{{t.id}} ">{{t.name}} </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Numero de Ticket</label>
                                <input ng-model="registro_detalle.unit_price" type="number" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Guardar en:</label>
                                <input class="form-control" ng-model="registro_detalle.locations_name" type="text" ng-keyup="locations.get($event.keyCode, registro_detalle.locations_name)" placeholder="Buscar con [ctrl]">
                                <select ng-model="registro_detalle.locations_id" class="form-control" required>
                                    <option ng-repeat="l in locations.registros" value="{{l.id}} ">{{l.name}} </option>
                                </select>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" type="submit" ng-click="agregarDetalle()">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- table para ver los detalles registrados -->
            
            <table class="table table-condensed table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Ticket</th>
                        <th>Numero de Tickets</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            
        </div>
    </div>
    
    <hr>
</div>
<pre>{{registro_detalle}} </pre>
<pre>{{detalles}} </pre>