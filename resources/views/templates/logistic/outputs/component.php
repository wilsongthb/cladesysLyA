
<div class="container">
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h3 class="text-center">SALIDA</h3>
            <form ng-submit="guardar()">
                <p>
                    Tipo: 
                    <select 
                        ng-model="registro.tickets_id">
                        <?php foreach(config('consts.ticket.type') as $key => $doc){ ?>
                            <option ng-value="<?= $key ?>"><?= $doc ?> </option>
                        <?php } ?>
                    </select>
                </p>
                <p>
                    Ubicacion: 
                        <select 
                        ng-model="registro.locations_id" 
                        ng-keyup="locations.get('', $event.keyCode)" 
                        ng-change="leer()"
                        required>
                        <option ng-repeat="l in locations.registros" ng-value="l.id">{{l.name}} </option>
                    </select>
                </p>
                <pre>{{registro}}</pre>
                <button>Guardar</button>
            </form>
            <form ng-submit="detalles.guardar()" ng-if="registro.id">
                <p>
                    output: <select ></select>
                </p>
                <select ng-model="detalles.registro.input_details_id">
                    <option value=""></option>
                </select>
            </form>
        </div>
    </div>
</div>
