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

        <!-- <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th class="col-lg-1">CATEGORIA</th>
                    <th class="col-lg-7">DENOMINACION</th>
                    <th class="col-lg-1">MARCA</th>
                    <th class="col-lg-1">MEDIDA DE COMPRA</th>
                    <th class="col-lg-1">CANTIDAD</th>
                    <th class="col-lg-1">MEDIDA DE DISTRIBUCION</th>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <select ng-model="def.categories_id" class="form-control">
                            <option ng-repeat="c in categories.registros" ng-value="c.id">{{c.detail}} </option>
                        </select>
                    </td>
                    <td>
                        <input type="text" ng-model="reg.p_detail" class="form-control" required>
                    </td>
                    <td>
                        <select ng-model="reg.p_brands_id" class="form-control" required>
                            <option ng-repeat="b in brands.registros" ng-value="b.id">{{b.detail}} </option>
                        </select>
                    </td>
                    <td>
                        <select ng-model="reg.p_packings_id" required class="form-control" id="init_focuss">
                            <option ng-repeat="p in packings.registros" ng-value="p.id">{{p.detail}} </option>
                        </select>
                    </td>
                    <td>
                        <input type="text" ng-model="reg.p_units" class="form-control" required>
                    </td>
                    <td>
                        <select ng-model="def.measurements_id" class="form-control">
                            <option ng-repeat="m in measurements.registros" ng-value="m.id">{{m.detail}} </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                </tr>
            </tbody>
        </table> -->

        <table class="table table-condensed table-hover">
            <thead>
                <tr>
                    <th class="col-lg-1">Categoria</th>
                    <th class="col-lg-4">Nombre</th>
                    <th class="col-lg-1">Empaquetado</th>
                    <th class="col-lg-1">Cantidad</th>
                    <th class="col-lg-1">Unidad de Medida (Distribucion)</th>
                    <th class="col-lg-1">Marca</th>
                    <th class="col-lg-1">Stock Minimo</th>
                    <th class="col-lg-1">Stock Permanente</th>
                    <th class="col-lg-1">Tiempo de duracion(dias)</th>
                </tr>
                <tr>
                    <td>
                        <select ng-model="def.categories_id" class="form-control">
                            <option ng-repeat="c in categories.registros" ng-value="c.id">{{c.detail}} </option>
                        </select>
                    </td>
                    <td>
                        <input type="text" ng-model="reg.p_detail" class="form-control" required>
                    </td>
                    <td>
                        <select ng-model="reg.p_packings_id" required class="form-control" id="init_focuss">
                            <option ng-repeat="p in packings.registros" ng-value="p.id">{{p.detail}} </option>
                        </select>
                    </td>
                    <td>
                        <input type="text" ng-model="reg.p_units" class="form-control" required>
                    </td>
                    <td>
                        <select ng-model="def.measurements_id" class="form-control">
                            <option ng-repeat="m in measurements.registros" ng-value="m.id">{{m.detail}} </option>
                        </select>
                    </td>
                    <td>
                        <select ng-model="reg.p_brands_id" class="form-control" required>
                            <option ng-repeat="b in brands.registros" ng-value="b.id">{{b.detail}} </option>
                        </select>
                    </td>
                    <td>
                        <input type="text" ng-model="reg.po_minimum" class="form-control" required>
                    </td>
                    <td>
                        <input type="text" ng-model="reg.po_permanent" class="form-control" required>
                    </td>
                    <td>
                        <input type="text" ng-model="reg.po_duration" class="form-control" required>
                    </td>
                    <td>
                        <button type="submit" class="btn">Guardar</button>
                    </td>
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
                <h4 class="modal-title">Configuraciones</h4>
            </div>
            <div class="modal-body">
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