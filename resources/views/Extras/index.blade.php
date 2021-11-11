
@extends('layouts.plantillabase')

@section('contenido')
<a href="{{route('extras.create')}}" class="btn btn-primary">CREAR</a>
            <table class="table table-dark table-striped mt-4">
                <thead>
                    <tr>
                        <th>Foto perfil</th>
                        <th>Conocimientos</th>
                        <th>Acerca de</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($extras as $extra)
                        <tr>
                            <td>
                                <img src="{{$extra->foto}}" height="70px" width="70px">
                            </td>
                            <td>{{$extra->conocimientos}}</td>
                            <td>{{$extra->acercade}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="">
                                    <a class="btn btn-warning" href="{{ route('extras.edit',$extra->id) }}">Editar</a>
                                </div>
                            </td>
                            <td>
                                <form action="{{ route('extras.destroy',$extra->id) }}" method="POST">
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
    