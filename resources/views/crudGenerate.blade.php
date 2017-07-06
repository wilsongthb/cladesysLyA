@extends('layouts.app')

<?php

$inputs = [
    [
        'type' => 'text',
        'layout' => 'Detalle',
        'required' => true,
        'placeholder' => 'Detalle',
        'maxlength' => '255'
    ],
    [
        'type' => 'text',
        'layout' => 'Detalle',
        'required' => true,
        'placeholder' => 'Detalle',
        'maxlength' => '255'
    ],
    [
        'type' => 'text',
        'layout' => 'Detalle',
        'required' => true,
        'placeholder' => 'Detalle',
        'maxlength' => '255'
    ],
    [
        'type' => 'text',
        'layout' => 'Detalle',
        'required' => true,
        'placeholder' => 'Detalle',
        'maxlength' => '255'
    ]
];

?>

@section('content')

<!--<input type="text" maxlength="" placeholder="" required type="">-->

<div class="container">

    <!--form-->
    <div>
    @foreach ($inputs as $input)
    <div class="form-group">
            <label for="">{{$input['layout']}}</label>
            <input class="form-control"
                type="{{$input['type']}}"
                placeholder="{{$input['placeholder']}}"
                maxlength="{{$input['maxlength']}}"
                @if ($input['required']){{"required"}}@endif>
        </div>
    @endforeach
    <button type="submit" class="btn btn-primary">Guardar</button>
    <button type="button" class="btn btn-danger">Cancelar</button>
    </div>
    <!--end-form-->
</div>

@stop
