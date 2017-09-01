<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h3 class="text-center">CONFIGURACION DE PRODUCTOS</h3>
        
        
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
            <button type="button" class="btn btn-default" ng-click="verCrear()">Crear</button>
        </div>
        
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
            <input type="text" class="form-control" ng-model="buscar" ng-model-options="{debounce: 1000}" ng-change="leerConfigs()">
        </div>
        

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class="col-lg-1">ID</th>
                    <th class="col-lg-1">ID PRODUCTO</th>
                    <th class="col-lg-6">DENOMINACION</th>
                    <th class="col-lg-1">STOCK MINIMO</th>
                    <th class="col-lg-1">STOCK PERMANENTE</th>
                    <th class="col-lg-1">DURACION(EN DIAS)</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="c in configs">
                    <td ng-bind="c.id"></td>
                    <td ng-bind="c.products_id"></td>
                    <td ng-bind="c.detail"></td>
                    <td ng-bind="c.minimum"></td>
                    <td ng-bind="c.permanent"></td>
                    <td ng-bind="c.duration"></td>
                    <td>
                        <button ng-click="editar(c)" type="button" class="btn btn-default">Editar</button>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</div>

<div class="modal fade" id="modaledit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">EDITAR</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <!-- <div class="form-group" >
                                <label>Localización *</label>
                                <select 
                                    ng-model="registro.locations_id" 
                                    class="form-control" 
                                    ng-keyup="locations.get('', $event.keyCode)" 
                                    ng-change="leer()"
                                    required>
                                    <option ng-repeat="l in locations.registros" ng-value="l.id">{{l.name}} </option>
                                </select>
                            </div> -->
                            <div class="form-group" ng-if="crear">
                                <label for="">Producto *</label>
                                <div ng-keypress="ss.run($event)">
                                    <input id="ss_input" type="text" ng-show="ss.mode" ng-model="ss.query" class="form-control">
                                    <select
                                        class="form-control" 
                                        ng-model="registro.products_id" 
                                        ng-show="!ss.mode" 
                                        id="ss_select" 
                                        ng-change="leer()"
                                        required>
                                        <option
                                            ng-repeat="i in ss.model.registros" 
                                            ng-value="i.id">
                                            {{i.detail}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            
                        <form ng-submit="guardar()">
            
                            <legend>Opciones</legend>
                            <div class="form-group">
                                <label for="">Stock Minimo</label>
                                <input type="text" class="form-control" ng-model="registro.minimum" required>
                            </div>
                            <div class="form-group">
                                <label for="">Stock Permanente</label>
                                <input type="text" class="form-control" ng-model="registro.permanent" required>
                            </div>
                            <div class="form-group">
                                <label for="">Duracion(en Meses)</label>
                                <input type="text" class="form-control" ng-model="registro.duration" required>
                            </div>
                            <button class="btn btn-default">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>
