<div class="container">
    <h2 class="text-center">{{config.title}} </h2>
    <a id="init_focus" class="btn btn-primary" ng-click="mostrarForm()"><i class="fa fa-plus"></i> Agregar Detalle</a>
    <div class="modal" id="detalleModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Nuevo Detalle</h4>
                </div>
                <div class="modal-body">
                    <form ng-submit="guardarDetalle()">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Precio Unitario *</label>
                                <input type="text" ng-model="detalle.unit_price" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Vista Previa</label> 
                                <!-- <input type="text" ng-model="detalle.unit_price" class="form-control" disabled> -->
                                <p class="form-control">{{enSoles(detalle.unit_price)}} </p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Cantidad *</label>
                            <input type="number" ng-model="detalle.quantity" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Fecha de Expiracion *</label>
                            <!-- <input 
                                type="text" 
                                ng-model="detalle.expiration" 
                                class="form-control" 
                                required 
                                placeholder="DD/MM/AAAA"
                                uib-datepicker-popup="dd/MM/yyyy"> -->
                            <div class="input-group">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    uib-datepicker-popup="dd/MM/yyyy"
                                    ng-model="detalle.expiration" 
                                    is-open="pop1" 
                                    datepicker-options="dateOptions" 
                                    ng-required="true" 
                                    close-text="Close" />
                                <span class="input-group-btn">
                                    <button 
                                        type="button" 
                                        class="btn btn-default" 
                                        ng-click="pop1 = true">
                                        <i class="glyphicon glyphicon-calendar"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Numero Ticket *</label>
                            <input type="text" ng-model="detalle.ticket_number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tipo ticket *</label>
                            <select ng-model="detalle.tickets_id" class="form-control" required>
                                <?php foreach(config('consts.ticket.type') as $key => $ticket){ ?>
                                    <option ng-value="<?= $key ?>"><?= $ticket ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Proveedor *</label>
                            <select 
                                ng-model="detalle.suppliers_id" 
                                class="form-control" 
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
                        <!-- inputs_id -->
                        <!-- user_id -->
                        
                        <div class="form-group">
                            <label>Fecha de Fabricación</label>
                            <div class="input-group">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    uib-datepicker-popup="dd/MM/yyyy"
                                    ng-model="detalle.fabrication" 
                                    is-open="pop" 
                                    datepicker-options="dateOptions" 
                                    ng-required="true" 
                                    close-text="Close" />
                                <span class="input-group-btn">
                                    <button 
                                        type="button" 
                                        class="btn btn-default" 
                                        ng-click="pop = true">
                                        <i class="glyphicon glyphicon-calendar"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Lote</label>
                            <input type="text" class="form-control" ng-model="detalle.lot">
                        </div>
                        <button class="btn btn-success">Guardar</button>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Proveedor</th>
                        <th class="text-right" >Cantidad</th>
                        <th class="text-right" >Precio</th>
                        <th class="text-right" >SubTotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="d in detalles">
                        <td ng-bind="d.detail"></td>
                        <td ng-bind="d.company_name"></td>
                        <td class="text-right" ng-bind="d.quantity"></td>
                        <td class="text-right">{{enSoles(d.unit_price)}} </td>
                        <td class="text-right">{{enSoles(d.quantity * d.unit_price)}} </td>
                        <td>
                            <i title="Eliminar" class="fa fa-trash" ng-click="eliminarDetalle(d.id)"></i>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="4" class="text-right">TOTAL</th>
                        <th class="text-right">{{enSoles(total())}} </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <form ng-submit="guardar()">
                <div class="form-group">
                    <label>Localización *</label>
                    <select 
                        ng-model="registro.locations_id" 
                        class="form-control" 
                        ng-keyup="locations.get('', $event.keyCode)" 
                        required>
                        <option ng-repeat="l in locations.registros" ng-value="l.id">{{l.name}} </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Observaciones:</label>
                    <textarea rows="3" class="form-control" ng-model="registro.observation" maxlength="500"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-default">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
