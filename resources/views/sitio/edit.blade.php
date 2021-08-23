@extends('layouts.plantillabase');

@section('contenido')

<h2>EDITAR REGISTRO</h2>

<form action="/sitios" method="POST">
@csrf
    <div class="mb-3">
        <label for="" class="form-label">Titulo</label>
        <input id="titulo" name="titulo" type="text" class="form-control" value="{{$sitio->titulo}}" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Tema</label>
        <input id="tema" name="tema" type="text" value="{{$sitio->tema}}" class="form-control" tabindex="2">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">url</label>
        <input id="url" name="url" type= "text" value="{{$sitio->url}}" class="form-control" tabindex="3">
    </div>
    <a href="/sitios" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>

@endsection