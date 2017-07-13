<div class="container">
    <div class="row">
        <h2 class="text-center">CREAR {{config.title}} </h2>
        <form class="col-xs-12 col-sm-12 col-md-12 col-lg-12" ng-submit="guardar()">
            <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                <label>company_name</label>
                <input type="text" ng-model="registro.company_name" class="form-control" required>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                <label>contact_name</label>
                <input type="text" ng-model="registro.contact_name" class="form-control" required>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                <label>identity</label>
                <input type="number" ng-model="registro.identity" class="form-control" required>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                <label>address</label>
                <input type="text" ng-model="registro.address" class="form-control" required>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                <label>phone</label>
                <input type="number" ng-model="registro.phone" class="form-control" required>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                <label>postal_code</label>
                <input type="number" ng-model="registro.postal_code" class="form-control" required>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                <label>country</label>
                <input type="text" ng-model="registro.country" class="form-control" required>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                <label>region</label>
                <input type="text" ng-model="registro.region" class="form-control" required>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                <label>home_page</label>
                <input type="text" ng-model="registro.home_page" class="form-control" required>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                <label>email</label>
                <input type="text" ng-model="registro.email" class="form-control" required>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                <label>Tipo de documento</label>
                <input type="text" ng-model="registro.tickets_name" class="form-control" ng-keyup="tickets.get($event.keyCode, registro.tickets_name)" placeholder="Buscar con [ctrl]">
                <select ng-model="registro.tickets_id" class="form-control" required>
                    <option ng-repeat="t in tickets.registros" value="{{t.id}} ">{{t.name}} </option>
                </select>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 form-group">
                <label>Almacén Relacionado</label>
                <input type="text" ng-model="registro.locations_name" class="form-control" ng-keyup="locations.get($event.keyCode, registro.locations_name)" placeholder="Buscar con [ctrl]">
                <select ng-model="registro.locations_id" class="form-control" required>
                    <option ng-repeat="l in locations.registros" value="{{l.id}} ">{{l.name}} </option>
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