<div class="container">
    <legend>{{config.categoria}} </legend>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <a href="{{name}}/create"><button type="button" class="btn btn-default">Agregar</button></a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="r in registros">
                        <td ng-bind="r.id"></td>
                        <td ng-bind="r.detail"></td>
                        <td>
                            
                            <a href="{{name}}/edit/{{r.id}}"><button type="button" class="btn btn-warning">Editar</button></a>
                            
                            <button type="button" class="btn btn-danger" ng-click="eliminar(r)">Eliminar</button>
                            
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>