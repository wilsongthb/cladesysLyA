
<div class="container">
    <h2>BIENVENIDO AL MODULO DE LOGISTICA</h2>
    <code>{{msj}} </code>

    <legend>LOCALIZACION PARA GESTIONAR</legend>
    <div class="btn-group">
        <label ng-repeat="l in locations.lista" class="btn btn-primary" ng-model="locations.id" uib-btn-radio="l.id" ng-click="locations.set(l.id)">{{l.name}} </label>
    </div>
</div>
