<div class="container-fluid" ng-class="{container: !fluid}">
    <input type="checkbox" ng-model="fluid">Formato Fluido
    <h3 class="text-center">COTIZACION</h3>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <button class="btn btn-primary" ng-click="verModalAP()">Agregar Proveedor</button>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <table class="table table-condensed table-hover">
                <thead>
                    <tr>
                        <th class="text-center" colspan="3">REQUERIMIENTO</th>
                        <th class="text-center" colspan="{{order_details.suppliers.length}} ">COTIZACION - PRECIOS POR PROVEEDORES</th>
                    </tr>
                    <tr>
                        <!-- requerimiento -->
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <!-- cotizacion -->
                        <!-- <span ng-repeat="r in data.registros">
                        </span> -->
                        <th ng-repeat="s in order_details.suppliers track by $index" ng-if="s">
                        <!-- <th ng-repeat="s in order_details.suppliers track by s.id" ng-if="s"> -->
                            {{s.company_name}} - {{s.contact_name}}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="r in order_details.lista track by $index">
                        <!-- requerimiento -->
                        <td ng-bind="r.id"></td>
                        <td ng-bind="r.products_detail"></td>
                        <td class="text-center" ng-bind="r.quantity"></td>
                        <!-- cotizacion -->
                        <td ng-repeat="s in order_details.suppliers track by $index" ng-if="s" title="Precio">
                        <!-- <td ng-repeat="s in order_details.suppliers track by s.id" ng-if="s" title="Precio"> -->
                            <input 
                                type="text" 
                                ng-model="order_details.quotations[r.id][s.id].unit_price" 
                                ng-model-options="{ debounce: 1000 } "
                                ng-change="order_details.guardarQuotation(order_details.quotations[r.id][s.id], r.id, s.id)">
                        </td>
                        <!-- <td ng-repeat="s in data.suppliers">
                            <input ng-if="data.quotations[r.id][s.id]" type="checkbox" ng-model="data.quotations[r.id][s.id].status" class="form-temp"
                                ng-change="guardar(data.quotations[r.id][s.id])">
                            <input ng-if="data.editar_cantidades && data.quotations[r.id][s.id]" type="text" ng-model="data.quotations[r.id][s.id].quantity"
                                ng-change="guardar(data.quotations[r.id][s.id])"> {{enSoles(data.quotations[r.id][s.id].unit_price)}}
                        </td> -->
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="modalIOC">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Generar orden de Compra</h4>
            </div>
            <div class="modal-body">

                <div class="list-group">
                    <a class="list-group-item" ng-repeat="s in data.suppliers" ng-bind="s.company_name" target="_blank" ng-href="{{ data.GLOBAL.app_url }}/purchase_order/{{data.orders_id}}/{{s.id}} "></a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>



<!-- agregar proveeedor modal -->
<div class="modal fade" id="agregarProveedor">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Modal title</h4>
            </div> -->
            <div class="modal-body">
                
                <div class="list-group">
                    <a 
                        ng-repeat="s in suppliers.registros"
                        ng-click="agregarProveedor(s)" class="list-group-item">{{s.company_name}} - {{s.contact_name}} </a>
                </div>
                
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>
