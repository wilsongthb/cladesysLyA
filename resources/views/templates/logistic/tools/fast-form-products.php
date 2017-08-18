<div class="container-fluid">
    
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <legend>Formulario Rapido Productos</legend>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <button ng-click="$t.verDef()" class="btn">Modificar Valores Predeterminados</button>
        </div>
    </div>
    
    
    <!-- 
        p_packings_id
        p_units
        p_detail
        p_brands_id
        po_minimum
        po_permanent
        po_duration
    
         -->
    <form ng-submit="guardar()">
        <table class="table table-condensed table-hover">
            <thead>
                <tr>
                    <th>Empaquetado</th>
                    <th>Unidades</th>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Stock Minimo</th>
                    <th>Stock Permanente</th>
                    <th>Tiempo de duracion(Meses)</th>
                </tr>
                <tr>
                    <th>
                        <select ng-model="reg.p_packings_id" required class="form-control" id="init_focuss">
                            <option ng-repeat="p in packings.registros" ng-value="p.id">{{p.detail}} </option>
                        </select>
                    </th>
                    <th>
                        <input type="text" ng-model="reg.p_units" class="form-control" required>
                    </th>
                    <th>
                        <input type="text" ng-model="reg.p_detail" class="form-control" required>
                    </th>
                    <th>
                        <select ng-model="reg.p_brands_id" class="form-control" required>
                            <option ng-repeat="b in brands.registros" ng-value="b.id">{{b.detail}} </option>
                        </select>
                    </th>
                    <th>
                        <input type="text" ng-model="reg.po_minimum" class="form-control" required>
                    </th>
                    <th>
                        <input type="text" ng-model="reg.po_permanent" class="form-control" required>
                    </th>
                    <th>
                        <input type="text" ng-model="reg.po_duration" class="form-control" required>
                    </th>
                    <th>
                        <button type="submit" class="btn">Guardar</button>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </form>

</div>

<div class="modal fade" id="default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <!-- <h4 class="modal-title">Modal title</h4> -->
            </div>
            <div class="modal-body">
                <p>
                    <label for="">Categoria</label>
                    <select ng-model="def.categories_id" class="form-control">
                        <option ng-repeat="c in categories.registros" ng-value="c.id">{{c.detail}} </option>
                    </select>
                </p>
                <p>
                    <label for="">Unidad de Medida (Distribucion)</label>
                    <select ng-model="def.measurements_id" class="form-control">
                        <option ng-repeat="m in measurements.registros" ng-value="m.id">{{m.detail}} </option>
                    </select>
                </p>
                <p>
                    <label for="">Localizacion (para las configuraciones de stock)</label>
                    <select ng-model="def.locations_id" class="form-control">
                        <option ng-repeat="m in locations.registros" ng-value="m.id">{{m.name}} </option>
                    </select>
                </p>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>
