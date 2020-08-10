<?php

session_start();



if (!isset($_SESSION['usuario']) or $_SESSION['ativo'] != true) {
    header('location: index.php?erro=2');
}

require 'conn.php';

require 'classes/pedidoCompra.class.php';
$fornecedores = new PedidoCompra($pdo);
?>
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
    <title>Formulario de Compra</title>
</head>

<body class="bg-light">
    <div class="">
        <header>
            <?php
            include_once 'menu.php';
            ?>
        </header>
        <section class="container corpo">
            <h3 id="content" class="bd-title">Pedidos de Compra</h3>
            <hr class="my-4">
            <form action="" name="filtro" method="post">
                <input type="button" value="NOVO" class="btn btn-success" onclick="window.location='compra_Salvar.php';">
            </form>
            <br>
            <table class="table table-striped tab" id="tabPedidoCompra">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">N° Pedido</th>
                        <th scope="col">Fornecedor</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Filial</th>
                        <th scope="col">Opçôes</th>
                    </tr>
                </thead>
                <?php
                if (!empty($_POST['pesquisar'])) {
                    $pesq = $_POST['pesquisar'];
                    $lista = $fornecedores->consultar($pesq);
                } else {
                    $lista = $fornecedores->consultar();
                }
                foreach ($lista as $item) :
                ?>
                    <tr>
                        <td><?php echo $item['numero_Pedido']; ?></td>
                        <td><?php echo $item['nome']; ?></td>
                        <td><?php echo 'R$ ' . number_format($item['totalpedido'], 2, ',', '.'); ?></td>
                        <td><?php echo $item['nomefl']; ?></td>
                        <td>
                            <a href="<?php echo 'compra_Salvar.php?idPedido=' . $item['idPed']; ?>" class="btn btn-info btn-sm">CONSULTAR</a>
                            <a href="<?php echo 'fornecedor_Deletar.php?idPedido=' . $item['id'] . '&nome=' . $item['nome']; ?>" class="btn btn-danger btn-sm">EXCLUIR</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <script>
                $(document).ready(function() {
                    $('#tabPedidoCompra').DataTable({

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
        </section>
    </div>
</body>

</html>