@extends('layouts.plantillabase')
@section('contenido')
    

<a href="{{route('proyectos.create')}}" class="btn btn-primary">CREAR</a>
            <table class="table table-dark table-striped mt-4">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Descripción</th>
                        <th>URL</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proyectos as $proyecto)
                        <tr>
                            <td>{{$proyecto->nombre}}</td>
                            <td>
                                <img src="{{$proyecto->imagen}}" height="70px" width="70px">
                            </td>
                            <td>{{$proyecto->descripcion}}</td>
                            <td><a href="{{$proyecto->url}}">{{$proyecto->url}}</a></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="">
                                    <a class="btn btn-warning" href="{{ route('proyectos.edit',$proyecto->id) }}">Editar</a>
                                </div>
                            </td>
                            <td>
                                <form action="{{ route('proyectos.destroy',$proyecto->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
