@extends('layouts.master')
@section('titulo', 'Master en PHP')

@section('content')
<h2>Vista detall:</h2>

<p><strong>Nom i cognoms del client: </strong>{{$cliente->nom}} {{$cliente->cognoms}}</p>
<p><strong>Data de naixement del client: </strong>{{$cliente->data_naixement}}</p>
<p><strong>Tractaments del client: </strong>
    <ul>
        @foreach($cliente->tractaments as $tractament)
            <li>{{$tractament->nom_tractament}}</li>
        @endforeach
    </ul>
</p>

<a href="{{ action('EntradasController@editar_cliente',  ['id' => $cliente->id]) }}" style="color: white; text-decoration: none;">
    <button type="button" class="btn btn-primary">Actualitzar</button>
</a>
<a href="{{ action('EntradasController@delete_cliente',  ['id' => $cliente->id]) }}" style="color: white; text-decoration: none;">
    <button type="button" class="btn btn-danger">Eliminar</button>
</a>
@stop

