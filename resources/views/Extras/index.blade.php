
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proyectos</title>
</head>
<body>

    <div class="card">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">      
                <nav class="nav">
                    <a class="nav-link" href="{{route('proyectos.index')}}">Proyectos</a>
                    <a class="nav-link" href="{{route('admin.contactos.index')}}">Contactos</a>
                    <a class="nav-link" href="{{route('extras.index')}}">Extras</a>
                  </nav>
            </div>
        </nav>
        <div class="card-header">
            Extras
            <br/>
            <br/>
            <div class="btn-group" role="group" aria-label="">
                <a class="btn btn-success" type="button" href="{{route('extras.create')}}">Añadir extra</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
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
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
