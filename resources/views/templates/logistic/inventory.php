
<div class="container">
    <h3 class="text-center">INVENTARIO</h3>
    
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Info:</strong> Esta pagina muestra solo productos de los cuales hay un stock mayor a 0
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            
            <table class="table table-condensed table-hover">
                <thead>
                    <tr>
                        <th title="ID de entrada">ID</th>
                        <th>ID PRODUCTO</th>
                        <th>UBICACION</th>
                        <th>CATEGORIA</th>
                        <th>NOMBRE DE PRODUCTO</th>
                        <th>FECHA DE ENTRADA</th>
                        <th>CANTIDAD INGRESADA</th>
                        <th>SALIDAS</th>
                        <th>STOCK</th>
                        <th>ULTIMA SALIDA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="s in stock.list">
                        <td ng-bind="s.id" >ID</td>
                        <td ng-bind="s.products_id"></td>
                        <td ng-bind="s.ubicacion"></td>
                        <td ng-bind="s.categoria"></td>
                        <td ng-bind="s.product_name"></td>
                        <td ng-bind="s.fecha_entrada"></td>
                        <td ng-bind="s.cantidad_entrada"></td>
                        <td ng-bind="s.total_salidas"></td>
                        <td ng-bind="s.stock"></td>
                        <td ng-bind="s.fecha_ultima_salida"></td>
                    </tr>
                </tbody>
            </table>
            
        </div>
    </div>
    
</div>
