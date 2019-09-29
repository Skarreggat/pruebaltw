@extends('layouts.master')
@section('titulo', 'Master en PHP')

@section('content')
@if(isset($tratamiento) && is_object($tratamiento))
    <h2>Formulari d'actualització de tractament</h2>
@else
    <h2>Formulari de creació de tractament</h2>
@endif
    <br/>
    <form action="{{ isset($tratamiento) ? action('EntradasController@update_tratamiento') : action('EntradasController@save_tratamiento') }}" method="POST">
        {{ csrf_field() }}
        @if(isset($tratamiento) && is_object($tratamiento))
            <input type="hidden" name="id" value="{{ $tratamiento->id }}" />
        @endif
        <div class="row">
            <div class="col">
                <label for="nom_tractament">Nom</label>
                <input class="form-control" type="text" name="nom_tractament" value="{{ isset($tratamiento->nom_tractament) ? $tratamiento->nom_tractament : '' }}" required="required" pattern="[a-zA-Z ]+" />
            </div>
            
        </div>
        <br/>
        <div class="row">
            <div class="col">
                <label for="descripcio">Descripció</label>
                <textarea class="form-control" name="descripcio" required="required">{{ isset($tratamiento->descripcio) ? $tratamiento->descripcio : '' }} </textarea>
            </div>
        </div>
        <br/>
        <input class="btn btn-primary" type="submit" value="Guardar" />
    </form>
@stop

