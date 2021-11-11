@extends('layouts.plantillabase')

@section('contenido')
    <h2>REGISTRAR PROYECTO</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('proyectos.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" value="{{old('nombre')}}" id="nombre" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label>Imagen</label>
            <input type="file" name="imagen" value="{{old('imagen')}}" id="imagen" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="form-group">
                <label>Descripcion</label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="3">{{old('descripcion')}}</textarea>
        </div>
        <div class="form-group">
        <label>URL</label>
        <input type="text" name="url" value="{{old('url')}}" id="url" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <br/>
        <div class="btn-group" role="group" aria-label="">
            <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
    </form>
@endsection