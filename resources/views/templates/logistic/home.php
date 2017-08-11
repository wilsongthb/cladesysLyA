<div class="container">
    <div class="page-header">
        <h1 class="text-center">LOGISTICA</h1>
    </div>
    <!-- <div class="list-group">
        <a 
            class="list-group-item" 
            ng-repeat="l in locations.lista" 
            ng-class="{ active: (l.id == locations.id) }"
            ng-click="locations.set(l.id)">
            <h4 class="list-group-item-heading">{{l.name}} </h4>
             <p class="list-group-item-text">...</p> 
        </a>
    </div> -->
    
    <!-- <div class="dropdown">
        <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown trigger
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dLabel">
            ...
        </ul>
    </div> -->
    <p>Selecciona la localizacion para gestionar</p>

     <div class="btn-group">
        <label 
            ng-repeat="l in locations.lista" 
            class="btn btn-primary" 
            ng-model="locations.id" 
            uib-btn-radio="l.id" 
            ng-click="locations.set(l.id)">
                {{l.name}} 
        </label>
    </div> 
</div>
