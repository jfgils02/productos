<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tipos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="/"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="btn btn-primary" aria-current="page" href="{{ route('productos.index') }}">Productos</a>
              </li>
              <li class="nav-item">
                <a class="btn btn-primary" href="{{ route('tipo_producto.index') }}">Tipo de Producto</a>
              </li>

            </ul>
          </div>
        </div>
    </nav>
    <div class="container-fluid">
        <form action="{{ route('tipo_producto.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nombre:</strong>
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                        @error('nombre')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary ml-3">Crear</button>
            </div>
        </form>
    </div>
    <div class="container-fluid">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>nombre</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @isset($tipos)
                    @foreach ($tipos as $tipo)
                    <tr>
                        <td>{{ $tipo->id }}</td>
                        <td>{{ $tipo->nombre }}</td>
                        <td>
                            <form action="{{ route('tipo_producto.destroy',$tipo->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('tipo_producto.edit',$tipo->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @endisset

            </tbody>
        </table>
        @isset($tipos)
        {!! $tipos->links() !!}
        @endisset

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
