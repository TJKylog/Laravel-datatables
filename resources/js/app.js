require('./bootstrap');
import 'datatables.net-bs5';
import 'datatables.net-buttons-bs5';
import 'datatables.net-buttons/js/buttons.colVis.js'
import 'datatables.net-buttons/js/buttons.html5';
import JSZip from 'jszip';
window.JSZip = JSZip;
import pdfMake from 'pdfmake/build/pdfmake';
import pdfFonts from 'pdfmake/build/vfs_fonts';
pdfMake.vfs = pdfFonts.pdfMake.vfs;

/* var table
let data = []
$(() => {
    table = $('#example').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        language: {
            url: 'es-MX.json'
        },
        buttons: [
            {
                text: '<i class="fa fa-file-excel"></i> Excel',
                className: 'btn btn-verde',
                extend: 'excelHtml5',
            },
            'pdfHtml5'
        ],
        columns: [
            { 
                data: 'num',
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
                render: function(data, type, row, meta) {
                    return `<a href="/articles/${row.id}/edit" class="btn btn-primary">Editar</a>`
                }
            }
        ],
    });
    getData();
})

window.getData = function() {
    axios.get('/articles')
    .then(response => {
        data = response.data.data
        table.clear().rows.add(data).draw();
    })
    .catch(error => {
        console.log(error);
    });
} */