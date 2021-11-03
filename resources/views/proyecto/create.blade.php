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
            <form action="">
                <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" name="nombre" id="nombre" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                  <label>Imagen</label>
                  <input type="file" name="imagen" id="imagen" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                  <label>Descripción</label>
                  <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                  <label>URL</label>
                  <input type="text" name="url" id="url" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <br/>
                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
