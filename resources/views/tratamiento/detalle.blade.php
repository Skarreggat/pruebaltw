@extends('layouts.master')
@section('titulo', 'Master en PHP')

@section('content')
<br/>
<h2>Vista detall:</h2>

<p><strong>Nom del tractament: </strong>{{$tratamiento->nom_tractament}}</p>
<p><strong>Descripció del tractament: </strong>{{$tratamiento->descripcio}}</p>

<a href="{{ action('EntradasController@editar_tratamiento',  ['id' => $tratamiento->id]) }}" style="color: white; text-decoration: none;">
    <button type="button" class="btn btn-primary">Actualitzar</button>
</a>
<a href="{{ action('EntradasController@delete_tratamiento',  ['id' => $tratamiento->id]) }}" style="color: white; text-decoration: none;">
    <button type="button" class="btn btn-danger">Eliminar</button>
</a>

@stop

