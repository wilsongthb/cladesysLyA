
@extends('logistic.index')


@section('content')
<div class="container">
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="text-center">ORDEN DE COMPRA</h3>
                   @if (isset($proveedor->company_name))
                        <h4><strong>Compañia: </strong>{{$proveedor->company_name}}</h4>
                    @endif
                    <h4><strong>Contacto: </strong>{{$proveedor->contact_name}}</h4>
                    <table class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($filas as $fila)
                            <tr>
                                <td>{{$fila->id}} </td>
                                <td>{{$fila->detail}} </td>
                                <td>{{(isset($fila->quantity)) ? $fila->quantity : $fila->od_quantity}} </td>
                            </tr>    
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- <button class="btn btn-success" onclick="imprimir()">Imprimir</button> -->
        </div>
    </div>
</div>
<script>
    function imprimir(){
        window.print()
    }
</script>
{{--  <pre>{{print_r($filas, true)}}</pre>  --}}
@stop

