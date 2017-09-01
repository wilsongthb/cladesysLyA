
<div class="container">
    <h3 class="text-center">REPORTE DE PRODUCTOS</h3>
    
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Info:</strong> Esta pagina muestra todos los productos activos
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            
            <table class="table table-condensed table-hover">
                <thead>
                    <tr>
                        <th title="ID de entrada">ID</th>
                        <th>Producto</th>
                        <th>Ubicacion</th>
                        <th>Fecha de Ultima Salida</th>
                        <th>Stock</th>
                         <th>Minimo</th>
                        <th>Permanente</th>
                        <th>Duracion</th>
                        <th>Estado</th> 
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="s in purchase.list">
                        <td ng-bind="s.id" >ID</td>
                        <td ng-bind="s.products_detail"></td>
                        <td ng-bind="s.locations_name"></td>
                         <!-- <td ng-bind="s.fecha_entrada.split(' ')[0]"></td> -->
                        <td ng-bind="s.ultima_salida"></td>
                         <!-- <td ng-bind="dateFormat(s.fecha_entrada)"></td>  -->
                        <td ng-bind="s.stock_total"></td>
                         <td ng-bind="s.po_minimum"></td>
                        <td ng-bind="s.po_permanent"></td>
                        <td ng-bind="s.po_duration"></td> 
                        <td ng-show="estado(s).type == 2" ng-class="{ warning: estado(s).msj, danger: estado(s).urg }">
                             <!-- <code>{{estado(s)}} </code>  -->
                            <span title="Quedan {{estado(s).diff}} dias" ng-show="estado(s).msj || estado(s).urg">Requieres Comprar </span>
                            <strong ng-show="estado(s).urg">Urgente!</strong>
                        </td>
                        <td ng-show="estado(s).type == 1" ng-class="{ warning: estado(s).msj, danger: estado(s).urg }">
                            <span ng-show="estado(s).msj || estado(s).urg">Requieres Comprar </span>
                            <strong ng-show="estado(s).urg">Urgente!</strong>
                        </td>
                    </tr>
                </tbody>
            </table>
            
        </div>
    </div>
    
</div>
