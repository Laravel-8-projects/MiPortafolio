@extends('layouts.plantillabase')

@section('contenido')
    
    <h2>EDITAR PROYECTO</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('proyectos.update',$proyecto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" value="{{$proyecto->nombre}}" id="nombre" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label>Imagen</label>
            <input type="file" name="imagen"  value="{{$proyecto->imagen}}" id="imagen" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="form-group">
                <label>Descripcion</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="3">{{$proyecto->descripcion}}</textarea>
        </div>
        <div class="form-group">
        <label>URL</label>
        <input type="text" name="url" value="{{$proyecto->url}}" id="url" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <br/>
        <div class="btn-group" role="group" aria-label="">
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
@endsection