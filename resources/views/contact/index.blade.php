@extends('layouts.plantillabase')
@section('contenido')

            <table class="table table-dark table-striped mt-4">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Mensaje</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contactos as $contacto)
                        <tr>
                            <td>{{$contacto->nombre}}</td>
                            <td>{{$contacto->email}}</td>
                            <td>{{$contacto->telefono}}</td>
                            <td>{{$contacto->mensaje}}</td>
                            
                            <td>
                                <form action="/admin/{{$contacto->id}}/contactos" method="POST">
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
