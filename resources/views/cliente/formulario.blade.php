@extends('layouts.master')
@section('titulo', 'Master en PHP')

@section('content')
@if(isset($cliente) && is_object($cliente))
    <h2>Formulari d'actualització de client</h2>
@else
    <h2>Formulari de creació de client</h2>
@endif
    <br/>
    <form action="{{ isset($cliente) ? action('EntradasController@update_cliente') : action('EntradasController@save_cliente') }}" method="POST">
        {{ csrf_field() }}
        @if(isset($cliente) && is_object($cliente))
            <input type="hidden" name="id" value="{{ $cliente->id }}" />
        @endif
        <div class="row">
            <div class="col">
                <label for="nom">Nom</label>
                <input class="form-control" type="text" name="nom" required="required" value="{{ isset($cliente->nom) ? $cliente->nom : '' }}" required="required" pattern="[a-zA-Z ]+" />
            </div>
            <div class="col">
                <label for="cognoms">Cognoms</label>
                <input class="form-control" type="text" name="cognoms" required="required" value="{{ isset($cliente->cognoms) ? $cliente->cognoms : '' }}" required="required" pattern="[a-zA-Z ]+" />
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col">
                <legend class="col-form-label col-sm-2 pt-0">Tractaments</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        @if(isset($cliente) && is_object($cliente))
                            @foreach($tratamientos as $tratamiento)
                                @if(!in_array($tratamiento->id, $auxiliar))
                                    <input class="form-check-input" type="checkbox" name="{{$tratamiento->nom_tractament}}" value="{{$tratamiento->id}}">
                                    <label class="form-check-label" for="{{$tratamiento->nom_tractament}}">{{$tratamiento->nom_tractament}}</label><br/>
                                @else
                                    <input class="form-check-input" type="checkbox" name="{{$tratamiento->nom_tractament}}" value="{{$tratamiento->id}}" checked="checked">
                                    <label class="form-check-label" for="{{$tratamiento->nom_tractament}}">{{$tratamiento->nom_tractament}}</label><br/>
                                @endif
                            @endforeach
                        @else
                            @foreach($tratamientos as $tratamiento)
                                    <input class="form-check-input" type="checkbox" name="{{$tratamiento->nom_tractament}}" value="{{$tratamiento->id}}">
                                    <label class="form-check-label" for="{{$tratamiento->nom_tractament}}">{{$tratamiento->nom_tractament}}</label><br/>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="col">
                <label for="data_naixement">Data de naixement</label>
                <input class="form-control" type="date" name="data_naixement" required="required" value="{{ isset($cliente->data_naixement) ? $cliente->data_naixement : '' }}" required="required"/>
            </div>
        </div>
        <br/>
        <input class="btn btn-primary" type="submit" value="Guardar" />
    </form>
@stop

