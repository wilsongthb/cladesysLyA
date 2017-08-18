<div class="container">
    <form ng-submit="detalle_guardar()">
        <legend>DETALLES DE SALIDA</legend>
        <div class="form-group">
            <label for="">Producto *</label>
            <select class="form-control" ng-model="detalle.registro.input_details_id" required>
                <option ng-repeat="s in stock" ng-value="s.id">{{s.products_detail}} - {{s.stock}} </option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Cantidad *</label>
            <input type="number" class="form-control" required ng-model="detalle.registro.quantity">
        </div>
        <div class="form-group">
                <label for="">Utilidad *</label>
                <input type="text" class="form-control" required ng-model="detalle.registro.utility">
            </div>
            <div class="form-group">
                    <label for="">Precio unitario *</label>
                    <input type="text" class="form-control" required ng-model="detalle.registro.unit_price">
                </div>
        <button type="submit" class="btn btn-default">Guardar</button>
    </form>
    
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="d in detalle.registros">
                <td ng-bind="d.id"></td>
                <td ng-bind="d.detail"></td>
                <td ng-bind="d.quantity"></td>
            </tr>
        </tbody>
    </table>
    
    <form ng-submit="guardar()">
        <legend>ENCABEZADO</legend>
        <div class="form-group">
            <label for="">Tipo *</label>
            <select ng-model="registro.type" required class="form-control">
                <?php foreach(config('consts.output.type') as $key => $value){ ?>
                    <option ng-value="<?= $key ?>"><?= $value ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Destino *</label>
            <select 
                ng-model="registro.locations_id" 
                class="form-control" 
                ng-keyup="locations.get('', $event.keyCode)" 
                required>
                <option ng-repeat="l in locations.registros" ng-value="l.id">{{l.name}} </option>
            </select>
        </div>
        <button class="btn btn-default">Guardar</button>
    </form>
</div>