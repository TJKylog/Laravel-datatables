<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
</head>
<body>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Productos</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline-azul">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Medida</th>
                                        <th>Precio</th>
                                        <th>Tipo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>