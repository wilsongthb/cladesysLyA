<div class="container">
    <legend> </legend>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
            
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <a href=""><button type="button" class="btn btn-default">Agregar</button></a>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <form action="" method="GET" class="form-inline" role="form">
                        <div class="form-group">
                            <input type="text" class="form-control" name="search">
                        </div>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>
                </div>
            </div>
                        
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Detalle</th>
                        <th></th>
                        <!--<th></th>-->
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="...">
                                <a href="" type="button" class="btn btn-default">Editar</a>
                                <button type="button" class="btn btn-danger" onclick="eliminar({{ $dato->id }})">Eliminar</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!--paginacion-->
            <ul class="pagination">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&raquo;</a></li>
            </ul>
        </div>
    </div>
</div>
