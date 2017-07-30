<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2 class="text-center">{{config.title}} </h2>
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
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <table class="table table-hover small">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Proveedor</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>SubTotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="d in detalles">
                        <td ng-bind="d.detail"></td>
                        <td ng-bind="d.company_name"></td>
                        <td ng-bind="d.quantity"></td>
                        <td class="text-right"><?= config('consts.money.symbol') ?> {{d.unit_price}} </td>
                        <td class="text-right"><?= config('consts.money.symbol') ?> {{d.quantity * d.unit_price}} </td>
                    </tr>
                </tbody>
            </table>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">HEADE</h3>
                </div>
                <div class="panel-body">
                    Panel content
                </div>
                <div class="panel-footer">
                    Panel footer
                </div>
            </div>
        </div>
    </div>
</div>
