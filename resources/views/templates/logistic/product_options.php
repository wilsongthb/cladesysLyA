
<div class="container">
    <h3 class="text-center">OPCIONES DE PRODUCTOS</h3>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            
                <div class="form-group">
                    <label>Localización *</label>
                    <select 
                        ng-model="registro.locations_id" 
                        class="form-control" 
                        ng-keyup="locations.get('', $event.keyCode)" 
                        ng-change="leer()"
                        required>
                        <option ng-repeat="l in locations.registros" ng-value="l.id">{{l.name}} </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Producto *</label>
                    <!-- super Select -->
                    <div ng-keypress="ss.run($event)">
                        <input id="ss_input" type="text" ng-show="ss.mode" ng-model="ss.query" class="form-control">
                        <select
                            class="form-control" 
                            ng-model="registro.products_id" 
                            ng-show="!ss.mode" 
                            id="ss_select" 
                            ng-change="leer()"
                            required>
                            <option
                                ng-repeat="i in ss.model.registros" 
                                ng-value="i.id">
                                {{i.detail}}
                            </option>
                        </select>
                    </div>
                </div>
                
            <form ng-submit="guardar()">

                <legend>Opciones</legend>
                <div class="form-group">
                    <label for="">Stock Minimo</label>
                    <input type="text" class="form-control" ng-model="registro.minimum" required>
                </div>
                <div class="form-group">
                    <label for="">Stock Permanente</label>
                    <input type="text" class="form-control" ng-model="registro.permanent" required>
                </div>
                <div class="form-group">
                    <label for="">Duracion(en dias)</label>
                    <input type="text" class="form-control" ng-model="registro.duration" required>
                </div>
                <button class="btn btn-default">Guardar</button>
            </form>
        </div>
    </div>
</div>
