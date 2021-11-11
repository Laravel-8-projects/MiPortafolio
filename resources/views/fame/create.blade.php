@extends('layouts.plantillabase')

@section('contenido')
<h2>REGISTRAR HABILIDAD</h2>

<form action="{{route('knowledges.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Imagen</label>
        <input type="file" name="imagen" value="{{old('imagen')}}" id="imagen" class="form-control" placeholder="" aria-describedby="helpId">
    </div>
  <div class="mb-3">
    <label for="" class="form-label">Descripción</label>
    <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="2">
  </div>
  <a href="/knowledges" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
@endsection