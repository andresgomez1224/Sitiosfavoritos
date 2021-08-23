@extends('layouts.plantillabase');

@section('contenido')
<a href="sitios/create" class="btn btn-primary ">CREAR</a>
<form method="POST" action="{{ route('logout') }}"> <br>
                    @csrf
<a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    this.closest('form').submit();" class="btn btn-danger">Cerrar Sesion</a>

</form>
<table class="table table-dark table-striped mt-4">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">TITULO</th>
            <th scope="col">TEMA</th>
            <th scope="col">URL</th>
            @if(Auth::user()->type_user == 1)
            <th scope="col">ACCIONES</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($sitios as $sitio)
        <tr>
            <td>{{ $sitio->id}}</td>
            <td>{{ $sitio->titulo}}</td>
            <td>{{ $sitio->tema}}</td>
            <td><a href="{{ $sitio->url }}" target="__blank" class="link">Link del Sitio</a></td>
            @if(Auth::user()->type_user == 1)
            <td>
                
                <a href="{{route('editar', $sitio->id)}}" class="btn btn-info">Editar</a>
                <form action="{{ route ('sitios.destroy',$sitio->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
                
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>

@endsection