<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/geral.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />

    <script>
        $(document).ready(function() {
            $('.btnModalFilial').click(function() {
                let id = $(this).data('id');
                let nome = $(this).data('nome');

                $('#idFiPedidoC').val(id);
                $('#nFiPedidoC').val(nome);

                $("#modal").modal();
            });
        });
    </script>

    <title>Pedido de Filiais</title>
</head>

<body>



    <!-- Modal -->
    <div class="modal fade" id="modalFilial" tabindex="-1" role="dialog" aria-labelledby="modalFilial" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFilial">Pesquisa Fornecedor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped tab" id="tabPesqFilial">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <?php
                        if (!empty($_POST['pesquisarFilial'])) {
                            $pesq = $_POST['pesquisarFilial'];
                            $lista = $filial->consultar($pesq);
                        } else {
                            $lista = $filial->consultar();
                        }
                        foreach ($lista as $item) :
                        ?>
                            <tr>
                                <td><?php echo $item['nome']; ?></td>
                                <td>
                                    <button class="btn btn-primary btnModalFilial btn-sm" data-id="<?php echo $item['id']; ?>" data-nome="<?php echo $item['nome']; ?>" data-dismiss="modal">SELECIONAR</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                    <script>
                        $(document).ready(function() {
                            $('#tabPesqFilial').DataTable({

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
                                }


                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
    </section>



</body>

</html>