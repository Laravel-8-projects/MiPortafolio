@extends('layouts.plantillabase')

@section('contenido') {{-- todo lo que haga aqui ponga en plantila base linea 1--}}
<a href="knowledges/create" class="btn btn-primary">CREAR</a>


<table class="table table-dark table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">Imagen</th>
      <th scope="col">Descripción</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>    
    @foreach ($conocimientos as $conocimiento)
    <tr>
        <td><img src="{{$conocimiento->imagen}}" alt="" height="70px" width="100px"></td>
        <td>{{$conocimiento->descripcion}}</td>
        <td>
         <form action="{{ route('knowledges.destroy',$conocimiento->id) }}" method="POST">
            <div class="btn-group" role="group" aria-label="">
                <a class="btn btn-warning" href="{{route('knowledges.edit',$conocimiento->id)}}">Editar</a>
            </div>         
              @csrf
              @method('DELETE')
          <button type="submit" class="btn btn-danger">Eliminar</button>
         </form>          
        </td>        
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
