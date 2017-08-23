<div class="container">
    <h3>SALIDA</h3>
    <form ng-submit="guardar()">
        <div class="form-group">
            <label for="">Tipo *</label>
            <select id="init_focus" ng-model="registro.type" required class="form-control">
                <?php foreach(config('consts.output.type') as $key => $value){ ?>
                    <option value="<?= $key ?>"><?= $value ?></option>
                <?php } ?>
            </select>
        </div>
        <!-- <div class="form-group">
            <label for="">Origen *</label>
            <p class="form-control">{{location.lista[location.id].name}} </p>
        </div> -->
        <div class="form-group">
            <label>Destino *</label>
            <select 
                ng-model="registro.locations_id" 
                class="form-control" 
                ng-keyup="locations.get('', $event.keyCode)" 
                required>
                <option ng-repeat="l in locations.registros" ng-value="l.id">{{l.name}} </option>
            </select>
        </div>
        <button class="btn btn-default">Continuar</button>
    </form>
</div>