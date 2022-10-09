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
                    <div class="card card-outline-azul">
                        <div class="card-header">Productos</div>
                        <div class="card-body">
                            <table class="table table-secondary table-striped table-hover" id="example">
                                <thead>
                                    <tr>
                                        <th class="all">#</th>
                                        <th class="min-tablet"> ID</th>
                                        <th class="min-tablet">Nombre</th>
                                        <th class="min-tablet">Medida</th>
                                        <th class="min-tablet">Precio</th>
                                        <th class="min-tablet">Tipo</th>
                                        <th class="all">Acciones</th>
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
    <script>
        var table
        $(() => {
            table = $('#example').DataTable({
                dom: 'Bfrtip',
                pageLength: 30,
                fixedHeader: {
                    header: true,
                    footer: true
                },
                responsive: {
                    breakpoints: [
                        { name: 'desktop', width: Infinity },
                        { name: 'tablet',  width: 1024 },
                        { name: 'fablet',  width: 768 },
                        { name: 'phone',   width: 480 }
                    ]
                },
                language: {
                    url: 'es-MX.json'
                },
                buttons: [
                    {
                        text: '<i class="fa fa-file-excel"></i> Excel',
                        className: 'btn btn-success text-white',
                        extend: 'excelHtml5',
                    },
                    'pdfHtml5'
                ],
                columns: [
                    { 
                        data: null,
                        title: '#',
                        render : function(data, type, row, meta) {
                            return `${meta.row + 1}`
                        }
                    },
                    {
                        data: 'id'
                    },
                    {
                        data: 'name',
            
                    },
                    {
                        data: 'measure',
                    },
                    {
                        data: 'price',
                    },
                    {
                        data: 'type',
                    },
                    {
                        data: null,
                        className: 'tablet desktop',
                        render: function(data, type, row, meta) {
                            return `
                                <button class="btn btn-primary ver">
                                    <i class="fa fa-eye"></i>
                                </button>
                            `
                        }
                    }
                ],
            });
            
            getData();
        })

        let data = []

        window.getData = function() {
            axios.get('/articles')
            .then(response => {
                data = response.data.data
                table.clear().rows.add(data).draw();
                Swal.fire({
                    title: 'Cargado',
                    text: 'Los datos se cargaron correctamente',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                })
            })
            .catch(error => {
                console.log(error);
            });
        }

        $(document).on('click', '.ver', function() {
            let button = $(this);
            button.html('<i class="fa fa-spinner fa-spin"></i>');
            setTimeout(() => {
                button.html('<i class="fa fa-eye"></i>');
            }, 2000);
        })
    </script>
</body>
</html>