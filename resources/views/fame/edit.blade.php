@extends('layouts.plantillabase')

@section('contenido')
<h2>EDITAR HABILIDADES</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('knowledges.update',$habilidad->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                        <label>Imagen</label>
                        <input type="file" name="imagen"  value="{{$habilidad->imagen}}" id="imagen" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label>Descripcion</label>
                        <input type="text" name="descripcion" value="{{$habilidad->descripcion}}" id="descripcion" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                   
                   
                    <br/>
                    <div class="btn-group" role="group" aria-label="">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
@endsection