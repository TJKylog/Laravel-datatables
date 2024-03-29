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
                    <div class="form-group">
                        <select multiple name="select" id="select" class="form-control">
                            <option value="">Seleccione</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <select multiple name="select2" id="select2" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline-azul">
                        <div class="card-header">Productos</div>
                        <div class="card-body">
                            <table class="table table-secondary table-striped table-hover w-100" id="example">
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
            $("#select").select2({
                placeholder: "Seleccione"
            });
            $("#select2").selectpicker({
                liveSearch: true,
                liveSearchPlaceholder: 'Buscar',
                title: 'Seleccione'
            });
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
                        title: 'Productos',
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [ 1, 2, 3, 4, 5 ]
                        }
                    },
                    {
                        text: '<i class="fa fa-file-pdf"></i> PDF',
                        className: 'btn btn-danger text-white',
                        title: 'Productos',
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [ 1, 2, 3, 4, 5 ]
                        },
                        customize: function (doc) {
                            doc.styles.title = {
                                color: '#4c4c4c',
                                fontSize: '30',
                                alignment: 'center'
                            }
                            doc.styles['td:nth-child(2)'] = {
                                width: '100px',
                                'max-width': '100px',
                            }
                            doc.styles.tableHeader = {
                                fillColor: '#4c4c4c',
                                color: 'white',
                            }
                            doc.content[1].table.widths = "*";
                        }
                    }
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
                        render: function(data, type, row, meta) {
                            return `$${data}`
                        }
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
                        },
                        orderable: false
                    }
                ],
            });
            
            getData();
        })

        let data = []

        window.getData = async function() {
            await axios.get('/articles')
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