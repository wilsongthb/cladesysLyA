
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
                        <th>Producto</th>
                        <th>Ubicacion</th>
                        <th>Fecha de Entrada</th>
                        <th>Stock</th>
                         <!-- <th>Minimo</th>
                        <th>Permanente</th>
                        <th>Duracion</th> -->
                        <!-- <th>Estado</th>  -->
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="s in stock.list">
                        <td ng-bind="s.id" >ID</td>
                        <td ng-bind="s.products_detail"></td>
                        <td ng-bind="s.locations_name"></td>
                         <td ng-bind="s.fecha_entrada.split(' ')[0]"></td> 
                         <!-- <td ng-bind="dateFormat(s.fecha_entrada)"></td>  -->
                        <td ng-bind="s.stock"></td>
                        <!-- <td ng-bind="s.po_minimum"></td>
                        <td ng-bind="s.po_permanent"></td>
                        <td ng-bind="s.po_duration"></td> -->
                         <!-- <td ng-class="{ warning: (s.stock < s.po_permanent), danger: (s.stock < s.po_minimum)}">
                            <span ng-if="s.stock < s.po_permanent">Requieres Comprar <strong ng-if="s.stock < s.po_minimum">Urgente!</strong></span>
                        </td>  -->
                    </tr>
                </tbody>
            </table>
            
        </div>
    </div>
    
</div>
