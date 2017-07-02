@extends('logistic.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
            <legend>{{$titulo}} </legend>
            
            <!--form-->
            
            @if (isset($dato))
                <form method="POST" action="{{ url('logistic/'.$name.'/'.$dato->id) }} ">
            @else
                <form method="POST" action="{{ url('logistic/'.$name) }} ">
            @endif
            
            
                {{ csrf_field() }}
                
                @if (isset($type) AND $type == 'edit')
                    {{ method_field('PUT') }}
                @endif
                
                <div class="form-group">
                    <label for="">Detalle</label>
                    <input class="form-control"
                        type="text"
                        placeholder="Detalle"
                        maxlength="255"
                        required
                        name="name"
                        @if (isset($dato))
                            value="{{ $dato->name }}"
                        @endif>
                </div>


                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ url('logistic/'.$name) }} "><button type="button" class="btn btn-danger">Cancelar</button></a>
                
            </form>
            <!--end-form-->
        </div>
    </div>
</div>
@stop