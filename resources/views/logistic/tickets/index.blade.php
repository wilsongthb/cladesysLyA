@extends('logistic.index')

@section('content')
<div class="container">
    <legend>{{$titulo}} </legend>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
            
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <a href="{{ url('logistic/'.$name.'/create') }}"><button type="button" class="btn btn-default">Agregar</button></a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <form action="" method="GET" class="form-inline" role="form">
                        <div class="form-group">
                            <input type="text" class="form-control" name="search"
                            @if (isset($search))
                                value="{{$search}}"
                            @endif>
                        </div>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>
                </div>
            </div>
            
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th></th>
                        <!--<th></th>-->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $dato)
                        <tr>
                            <td>{{$dato->id}} </td>
                            <td>{{$dato->name}} </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="...">
                                    <a href="{{ url('logistic/'.$name.'/'.$dato->id.'/edit') }}" type="button" class="btn btn-default">Editar</a>
                                    <button type="button" class="btn btn-danger" onclick="eliminar({{ $dato->id }})">Eliminar</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $datos->links() }}

<script>
function eliminar(id){
    if(window.confirm('Eliminar a ' + id)){
        $.ajax({
            url: "{{ url('logistic/'.$name) }}/" + id,
            method: 'DELETE',
            params: {
                id
            },
            headers: {
                'X-CSRF-TOKEN': window.axios.defaults.headers.common['X-CSRF-TOKEN']
            }
        }).done(function(){
            window.location.replace("{{ url('logistic/'.$name) }}")
        })
    }
}
</script>
        </div>
    </div>
</div>
@stop
