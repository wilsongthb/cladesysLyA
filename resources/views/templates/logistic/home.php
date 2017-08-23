<div class="container">
    <div class="page-header">
        <h1 class="text-center">LOGISTICA</h1>
    </div>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-sm-offset-4 col-md-4 col-lg-4">
            <div class="list-group">
                <a 
                    class="list-group-item"
                    ng-repeat="l in service.lista"
                    ng-if="l"
                    ng-class="{ active: l.id == service.get() }"
                    ng-click="service.set(l.id)">
                    {{l.name}} <span class="badge">{{consts.location.type[l.type]}}</span>
                 </a>
            </div>
        </div>
    </div>
</div>
