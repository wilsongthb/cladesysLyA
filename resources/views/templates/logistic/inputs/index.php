<div class="container">
    <div class="row">
        <h2 class="text-center">{{config.title}} </h2>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <a id="init_focus" href="{{config.urlCreate}}"><button type="button" class="btn btn-default"><i class="fa fa-plus"></i> Agregar</button></a>
                </div>
                <div class="pull-right">
                    <div class="form-inline">
                        <div class="form-group">
                            <input type="text" class="form-control" ng-model="buscar" ng-keyup="buscarEnter($event.keyCode)">
                        </div>
                        <button type="submit" class="btn btn-primary" ng-click="leer()"><i class="fa fa-search"></i> Buscar</button>
                    </div>
                </div>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Observacion</th>
                        <th>Creación</th>
                        <th>Modificación</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="r in registros">
                        <td ng-bind="r.id"></td>
                        <td ng-bind="r.observation"></td>
                        <td ng-bind="r.created_at"></td>
                        <td ng-bind="r.updated_at"></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="...">
                                <!-- <a href="{{config.urlShow}}/{{r.id}}" type="button" class="btn btn-default"> 
                                    <i class="fa fa-search-plus"></i>
                                    Ver
                                </a> -->
                                <a href="{{config.urlEdit}}/{{r.id}}" type="button" class="btn btn-default">
                                    <i class="fa fa-pencil"></i>
                                    Editar
                                </a>
                                <button type="button" class="btn btn-danger" ng-click="eliminar(r.id)">
                                    <i class="fa fa-trash"></i>
                                    Eliminar
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!--mensaje de error-->
            <div class="alert alert-danger" ng-show="error">
                <button type="button" class="close" ng-click="error = false" aria-hidden="true">&times;</button>
                <strong>ERROR:</strong> Ocurrio un error :'(  , contacte a su administrador 
            </div>

            <!--paginacion-->
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    Por pagina: <span ng-bind="per_page"></span>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    Cantidad en esta pagina: <span ng-bind="page_to"></span>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    Total: <span ng-bind="total"></span>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Pagina</button>
                        </span>
                        <input type="number" class="form-control" ng-model="page" ng-change="leer()">
                    </div><!-- /input-group -->
                </div>
            </div>
            <hr>

            <!--dialogo de eleminar registro-->
            <div class="modal fade" id="modal-id">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">ELIMINAR! <i class="fa fa-trash"></i></h4>
                        </div>
                        <div class="modal-body">
                            
                            <div class="alert alert-danger">
                                <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
                                <strong>ELIMINAR</strong> el registro {{delete_id}} seleccionado?
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-danger" ng-click="eliminar()">Confirmar eliminar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
