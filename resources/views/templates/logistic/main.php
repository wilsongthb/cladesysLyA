
<div class="container">
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2>LOCALIZACION POR DEFECTO</h2>
            <div class="btn-group">
                <label ng-repeat="l in locations.lista" class="btn btn-primary" ng-model="locations.id" uib-btn-radio="l.id" ng-click="locations.set(l.id)">{{l.name}} </label>
                <!-- <label class="btn btn-primary" ng-model="radioModel" uib-btn-radio="'Left'">Left</label>
                <label class="btn btn-primary" ng-model="radioModel" uib-btn-radio="'Middle'">Middle</label>
                <label class="btn btn-primary" ng-model="radioModel" uib-btn-radio="'Right'">Right</label> -->
            </div>
        </div>
    </div>
    
</div>
