<?php
session_start();

if (!isset($_SESSION['usuario']) or $_SESSION['ativo'] != true) {
    header('location: index.php?erro=2');
}

require('conn.php');
require('classes/cadastroProduto.class.php');

$produto = new CadastroProduto($pdo);

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
    <title>Cadastro Produtos</title>
</head>



<body class="bg-light">

    <div class="">
        <header>
            <?php
            include_once 'menu.php';
            ?>
        </header>

        <section class="corpo">
            <h1 id="content" class="bd-title">Cadastro de Produto</h1>
            <hr class="my-4">
            <input type="button" value="NOVO" class="btn btn-success" onclick="window.location='produto_Salvar.php';">
            <br>

            <table class="table table-striped table-hover tab" id="tabProdutos">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Unidade</th>
                        <th scope="col">Fornecedor</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>

                <?php
                if (!empty($_POST['pesquisar'])) {
                    $pesq = $_POST['pesquisar'];
                    $lista = $produto->consultarProduto($pesq);
                } else {
                    $lista = $produto->consultarProduto();
                }
                foreach ($lista as $item) :
                ?>
                    <tr>
                        <td><?php echo $item['codigo']; ?></td>
                        <td><?php echo $item['descProduto']; ?></td>
                        <td><?php echo $item['embApelido']; ?></td>
                        <td><?php echo $item['fornApelido']; ?></td>
                        <td>
                            <a href="<?php echo 'produto_Salvar.php?id=' . $item['id']; ?>" class="btn btn-info btn-sm">Consultar</a>
                            <a href="<?php echo 'produto_Deletar.php?id=' . $item['id'] . '&descricao=' . $item['descricao']; ?>" class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>

            <script>
                $(document).ready(function() {
                    $('#tabProdutos').DataTable({

                        scrollY: '60vh',
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