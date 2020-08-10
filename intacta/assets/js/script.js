$(document).ready(function () {
    $('#clientes').DataTable({

        scrollY: '50vh',
        scrollCollapse: true,
        paging: false,


        "language": {
            "lengthMenu": "Mostrando _MENU_ registros por pagina",
            "zeroRecords": "Nada encontrado",
            "info": "",
            "infoEmpty": "Nenhum registro disponivel",
            "infoFiltered": "(Filtrado de _MAX_ total registros)",
            "search": "Pesquisar:",
        },

        "columnDefs" : [
            {
            "targets": [1],
            "visible": false,
            "searchable": false
        },
        ]

    });
});