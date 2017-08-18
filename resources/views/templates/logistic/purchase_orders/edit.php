
<div ng-class="{ container: data.container_fluid, 'container-fluid': !data.container_fluid}" >
     <p>
        <input type="checkbox" ng-model="data.container_fluid"> formato contenido
        <input type="checkbox" ng-model="data.editar_cantidades"> editar cantidades
    </p> 
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h3 class="text-center">ORDEN DE COMPRA</h3>
            <table class="table table-condensed table-hover">
                <thead>
                    <tr>
                        <th colspan="3">REQUERIMIENTO</th>
                        <th colspan="{{data.suppliers.length}} ">COTIZACION</th>
                    </tr>
                    <tr>
                        <!-- requerimiento -->
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <!-- cotizacion -->
                        <!-- <span ng-repeat="r in data.registros">

                        </span> -->
                        <th ng-repeat="s in data.suppliers">
                            <span title="{{s.contact_name}}">{{s.company_name}}</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="r in data.registros">
                        <!-- requerimiento -->
                        <td ng-bind="r.id"></td>
                        <td ng-bind="r.products_detail"></td>
                        <td ng-bind="r.quantity"></td>
                        <!-- cotizacion -->
                        <td ng-repeat="s in data.suppliers">
                            <input ng-if="data.quotations[r.id][s.id]" type="checkbox" ng-model="data.quotations[r.id][s.id].status" class="form-temp" ng-change="guardar(data.quotations[r.id][s.id])">
                            <input ng-if="data.editar_cantidades && data.quotations[r.id][s.id]" type="text" ng-model="data.quotations[r.id][s.id].quantity" ng-change="guardar(data.quotations[r.id][s.id])"> 
                            {{enSoles(data.quotations[r.id][s.id].unit_price)}}
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- <button class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> PDF</button>
            <button class="btn btn-success"><i class="fa fa-file-excel-o"></i> Excel</button>
            <button class="btn btn-default"><i class="fa fa-file-o"></i> Generar Entrada</button> -->
            <button class="btn btn-default" ng-click="seleccionarMasBarato()"><i class="fa fa-money"></i> Seleccionar el mas barato</button>
            <button class="btn btn-default" ng-click="generarOrdenDeCompra()">Generar Orden de Compra</button>
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
                    <a 
                        class="list-group-item" 
                        ng-repeat="s in data.suppliers" 
                        ng-bind="s.company_name"
                        target="_blank"
                        ng-href="{{ data.GLOBAL.app_url }}/purchase_order/{{data.orders_id}}/{{s.id}} "
                        ></a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>

