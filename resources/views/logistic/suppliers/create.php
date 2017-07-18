<div class="container">
    <div class="row">
        <h2 class="text-center">{{config.title}} </h2>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="alert alert-info" title="Si, todos son requeridos XD">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Información:</strong> Los campos con * son requeridos para guardar el registro
            </div>
        </div>
        <form class="col-xs-12 col-sm-12 col-md-12 col-lg-12" ng-submit="guardar()">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                    <label>Nombre de La compañia *</label>
                    <!-- enfoque incial -->
                    <input id="init_focus" type="text" ng-model="registro.company_name" class="form-control" required>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                    <label>Nombre de contacto *</label>
                    <input type="text" ng-model="registro.contact_name" class="form-control" required>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                    <label>Direccion *</label>
                    <input type="text" ng-model="registro.address" class="form-control" required>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 form-group">
                    <label>Pagina web *</label>
                    <input type="text" ng-model="registro.home_page" class="form-control" required>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 form-group">
                    <label>Email *</label>
                    <input type="email" ng-model="registro.email" class="form-control" required>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                    <label>Tipo de documento *</label>
                    <select 
                        class="form-control"
                        ng-model="registro.tickets_id"  
                        ng-keyup="tickets.get('', $event.keyCode)" 
                        required>
                        <option 
                            ng-repeat="t in tickets.registros" 
                            ng-value="t.id"
                            ng-bind="t.name">
                            </option>
                    </select>
                </div>
                
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                    <label>ID de identidad *</label>
                    <input type="text" ng-model="registro.identity" class="form-control" required>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                    <label>Telefono *</label>
                    <input type="text" ng-model="registro.phone" class="form-control" required>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                    <label>Codigo Postal *</label>
                    <input type="text" ng-model="registro.postal_code" class="form-control" required>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                    <label>Pais *</label>
                    <input type="text" ng-model="registro.country" class="form-control" required>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                    <label>Region *</label>
                    <input type="text" ng-model="registro.region" class="form-control" required>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                    <label>Localización *</label>
                    <select 
                        ng-model="registro.locations_id" 
                        class="form-control" 
                        ng-keyup="locations.get('', $event.keyCode)" 
                        required>
                        <option ng-repeat="l in locations.registros" ng-value="l.id">{{l.name}} </option>
                    </select>
                </div>
            </div>
            <!--mensaje de error-->
            <div class="alert alert-danger" ng-show="error">
                <button type="button" class="close" ng-click="error = false" aria-hidden="true">&times;</button>
                <strong>ERROR:</strong> Ocurrio un error :'(  , contacte a su administrador 
            </div>
            <button class="btn btn-primary">Guardar</button>
        </form>
    </div>
    <hr>
</div>