<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="card">
        <div class="card-header">
            Proyectos
            <br/>
            <br/>
            <div class="btn-group" role="group" aria-label="">
                <a class="btn btn-success" type="button" href="{{route('proyectos.create')}}">Añadir proyecto</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
