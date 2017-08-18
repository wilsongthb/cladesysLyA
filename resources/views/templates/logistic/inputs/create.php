
<div class="container">
    <h3 class="text-center">{{config.title}} </h3>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            
            <!-- <p>Creando, espere por favor...</p> -->
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
                <button class="btn btn-success">Continuar</button>
            </form>
        </div>
    </div>
</div>
