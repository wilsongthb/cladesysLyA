<div class="container">
    <h3 class="text-center">{{config.title}} </h3>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <form ng-submit="guardar()">
                <p class="form-group">
                    <label>Fecha de Envio *</label>
                    <input 
                        id="init_focus"
                        type="text" 
                        class="form-control"
                        uib-datepicker-popup="dd/mm/yyyy"
                        ng-model="registro.shipping" 
                        placeholder="dd/mm/aaaa">
                </p>
                <p class="form-group">
                    <label for="">Localizacion *</label>
                    <select 
                        ng-model="registro.locations_id" 
                        class="form-control" 
                        ng-keyup="locations.get('', $event.keyCode)" 
                        required>
                        <option ng-repeat="l in locations.registros" ng-value="l.id">{{l.name}} </option>
                    </select>
                </p>
                <p class="form-group">
                    <button class="btn btn-success">Continuar</button>
                </p>
            </form>
            
            <!--mensaje de error-->
            <div class="alert alert-danger" ng-show="error">
                <button type="button" class="close" ng-click="error = false" aria-hidden="true">&times;</button>
                <strong>ERROR:</strong> Ocurrio un error :'(  , contacte a su administrador 
            </div>
        </div>
    </div>
    
</div>