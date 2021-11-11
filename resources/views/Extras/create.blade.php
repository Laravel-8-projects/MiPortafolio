@extends('layouts.plantillabase')

@section('contenido')
<h2>REGISTRO EXTRAS</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('extras.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label>Imagen</label>
        <input type="file" name="foto" value="{{old('foto')}}" id="foto" class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <div class="form-group">
        <label>Conocimientos</label>
        <input type="text" name="conocimientos" value="{{old('conocimientos')}}" id="conocimientos" class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <div class="form-group">
        <label>Acerca de</label>
        <textarea class="form-control" name="acercade" id="acercade" rows="3">{{old('acercade')}}</textarea>
    </div>
    <br/>
    <div class="btn-group" role="group" aria-label="">
        <button type="submit" class="btn btn-primary">Registrar</button>
    </div>
    </form>
@endsection

                 

