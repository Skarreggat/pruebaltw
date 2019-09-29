@extends('layouts.master')
@section('titulo', 'Master en PHP')

@section('content')
    <br/>
    <h1>Vista General Clients/Tractaments</h1>
    <br/>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nom client</th>
                <th scope="col">Tractaments</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>
                        <a href="{{ action('EntradasController@detalle_cliente', ['id' => $cliente->id]) }}" style="text-decoration: none;">
                            {{$cliente->nom}}
                        </a>
                    </td>
                    <td>
                        @foreach($cliente->tractaments as $tractament)
                            <a href="{{ action('EntradasController@detalle_tratamiento', ['id' => $tractament->id]) }}" style="text-decoration: none;">
                                {{$tractament->nom_tractament}}, 
                            </a>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

