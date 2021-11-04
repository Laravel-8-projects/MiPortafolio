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
    <div class="container col-sm-4">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    Registro de proyectos
                    <div class="btn-group" role="group" aria-label="">
                        <a class="btn btn-warning ms-4" type="button" href="{{route('proyectos.index')}}">Atrás</a>
                    </div>
                </div>
                <div class="card-body">
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
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
