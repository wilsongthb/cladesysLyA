
@extends('logistic.index')


@section('content')
    
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                
                @foreach ($po[0] as $key2 => $val)
                <th>{{ $key2 }} </th>    
                @endforeach
                
                
            </tr>
        </thead>
        <tbody>
            
            @foreach ($po as $key => $record)
            <tr>
                
                @foreach ($record as $key1 => $camp)
                <td>{{ $camp }} </td>    
                @endforeach
            </tr>    
            @endforeach
            
            
        </tbody>
    </table>
    
@stop
