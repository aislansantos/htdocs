<?php

session_start();



if (!isset($_SESSION['usuario']) or $_SESSION['ativo'] != true) {
    header('location: index.php?erro=2');
}

require 'conn.php';
require('classes/pedidoCompra.class.php');
require('classes/itensPedidoCompra.class.php');
require('classes/cadastroFornecedor.class.php');
require('classes/cadastroFilial.class.php');
require('classes/cadastroProduto.class.php');

$pedidoCompra = new PedidoCompra($pdo);
$itemPedidoCompra = new ItemPedidoCompra($pdo);
$fornecedores = new CadastroFornecedores($pdo);
$filial = new Filial($pdo);
$produtos = new CadastroProduto($pdo);



include_once('modais/consulta_Fornecedor.modal.php');
include_once('modais/consulta_Filial.modal.php');
include_once('modais/consulta_Produto.modal.php');

if (!empty($_GET['idPedido'])) {
    $cod = addslashes($_GET['idPedido']);
    $listapedidoCompra = $pedidoCompra->consultaEditarPedidoCompra($cod);
    $listaItemPedidoCompra = $itemPedidoCompra->Consultar($cod);
} else {
    $listapedidoCompra = null;
    $listaItemPedidoCompra = null;
}

if (
    !empty($_POST['idPedido']) || !empty($_POST['nPedidoC']) || !empty($_POST['dtVencimentoPedidoC'])
    || !empty($_POST['idFnPedidoC']) || !empty($_POST['idFiPedidoC']) || !empty($_POST['obsPedidoC'])
) {

    $cod = addslashes($_POST['idPedido']);
    $numPed = addslashes($_POST['nPedidoC']);
    $dtVencimento = addslashes($_POST['dtVencimentoPedidoC']);
    $fornecedor = addslashes($_POST['idFnPedidoC']);
    $filial = addslashes($_POST['idFiPedidoC']);
    $obs = addslashes($_POST['obsPedidoC']);

    $pedidoCompra->setId($cod);
    $pedidoCompra->setNumero_Pedido($numPed);
    $pedidoCompra->setDtVencimento($dtVencimento);
    $pedidoCompra->setFornecedor($fornecedor);
    $pedidoCompra->setFilial($filial);
    $pedidoCompra->setObservacao($obs);

    $pedidoCompra->Salvar();

    echo "<script>window.location = 'compra_Salvar.php?idPedido=$cod'; </script>";
}

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
    <title>Pedido de Compra</title>
</head>

<body class="bg-light">
    <div class="">
        <header>
            <?php
            include_once 'menu.php';
            ?>
        </header>
    </div>

    <section class="container corpo">
        <h3 id="content" class="bd-title">Pedidos de Compra - Detalhado</h3>
        <hr class="my-4">

        <div class="">
            <form action="" method="post">
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group row">
                            <input type="hidden" name="idPedido" value="<?php if (!empty($listapedidoCompra['idPed'])) {
                                                                            echo $listapedidoCompra['idPed'];
                                                                        } ?>">
                            <div class="col-sm-4">
                                <label for="nPedidoC">Numero:</label>
                                <input type="text" name="nPedidoC" id="nPedido" class="form-control" value="<?php if (!empty($listapedidoCompra['numero_Pedido'])) {
                                                                                                                echo $listapedidoCompra['numero_Pedido'];
                                                                                                            } ?>">
                            </div>
                            <div class="col-sm-6">
                                <label for="">VENCIMENTO:</label>
                                <input type="date" name="dtVencimentoPedidoC" id="dtVencimentoPedidoC" class="form-control" value="<?php if (!empty($listapedidoCompra['dt_Vencimento'])) {
                                                                                                                                        echo $listapedidoCompra['dt_Vencimento'];
                                                                                                                                    } ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="">
                                <input type="hidden" name="idFnPedidoC" id="idFnPedidoC" class="form-control" readonly=true value="<?php if (!empty($listapedidoCompra['id_Forn'])) {
                                                                                                                                        echo $listapedidoCompra['id_Forn'];
                                                                                                                                    } ?>">
                            </div>
                            <div class="col-sm-7">
                                <input type="text" name="nFnPedidoC" id="nFnPedidoC" class="form-control" placeholder="Pesquise Fornecedor..." readonly=true value="<?php if (!empty($listapedidoCompra['apelido_Forn'])) {
                                                                                                                                                                        echo $listapedidoCompra['apelido_Forn'];
                                                                                                                                                                    } ?>">
                            </div>
                            <div class="col-sm-1">
                                <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#modalFornecedor">
                                    FORNECEDOR
                                </button>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="">
                                <input type="hidden" name="idFiPedidoC" id="idFiPedidoC" class="form-control" readonly=true value="<?php if (!empty($listapedidoCompra['id_Filial'])) {
                                                                                                                                        echo $listapedidoCompra['id_Filial'];
                                                                                                                                    } ?>">
                            </div>
                            <div class="col-sm-7">
                                <input type="text" name="nFiPedidoC" id="nFiPedidoC" class="form-control" placeholder="Pesquise Filial..." readonly=true value="<?php if (!empty($listapedidoCompra['nomefl'])) {
                                                                                                                                                                    echo $listapedidoCompra['nomefl'];
                                                                                                                                                                } ?>">
                            </div>
                            <div class="col-sm-1">
                                <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#modalFilial">
                                    FILIAL
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="obsPedidoC">OBSERVAÇÃO:</label>
                                <textarea name="obsPedidoC" id="obsPedidoC" cols="85" rows="6" maxlength="255"><?php if (!empty($listapedidoCompra['observacao'])) {
                                                                                                                    echo $listapedidoCompra['observacao'];
                                                                                                                } ?></textarea>
                            </div>

                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-success btn-sm" value="Salvar">
                <input type="button" value="Consultar" class="btn btn-info btn-sm" onclick="window.location='compra_Consultar.php';">
            </form>
            <hr class="my-4">



            <!-- formulario para adicionar itens -->

            <button type="button" class="btn btn-dark mb-2 btn-sm" data-toggle="modal" data-target="#modalProduto">
                ADD ITENS
            </button>
            <form action="" method="post">
                <input type="hidden" name="idItemPedidoCompra" id="idItemPedidoCompra" readonly=true>
                <div class="row">
                    <div class="col-sm-5">
                        <input type="text" name="nItemPedidoCompra" id="nItemPedidoCompra" class="form-control" readonly=true>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" name="desEmbalagem" id="desEmbalagem" class="form-control" readonly=true>
                    </div>
                </div>
            </form>
            <br><br>
            <div class="form-group">
                <table class="table table-striped  table-hover tab " id="tabItemVenda">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">CÓDIGO</th>
                            <th scope="col">DESCRIÇÃO</th>
                            <th scope="col">QUANTIDADE</th>
                            <th scope="col">R$ UNITÁRIO</th>
                            <th scope="col">R$ TOTAL</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <?php if ($listaItemPedidoCompra <> null) {
                        $listaItemPedidoCompra = $itemPedidoCompra->consultar($cod);
                        foreach ($listaItemPedidoCompra as $item) :
                    ?>
                            <tr>
                                <td><?php echo $item['idProd']; ?></td>
                                <td><?php echo $item['codigo']; ?></td>
                                <td><?php echo $item['descricao']; ?></td>
                                <td><?php echo $item['qtdeItemcompra']; ?></td>
                                <td><?php echo 'R$ ' . number_format($item['vlr_ItemCompra'], 2, ',', '.'); ?></td>
                                <td><?php echo 'R$ ' . number_format($item['totalitens'], 2, ',', '.'); ?></td>
                                <td>
                                    <a href="<?php echo 'compra_Salvar.php?idPedido=' . $item['idPed']; ?>" class="btn btn-info btn-sm">CONSULTAR</a>
                                    <a href="<?php echo 'fornecedor_Deletar.php?idPedido=' . $item['id'] . '&nome=' . $item['nome']; ?>" class="btn btn-danger btn-sm">EXCLUIR</a>
                                </td>
                            </tr>
                    <?php endforeach;
                    }
                    ?>

                </table>
                <script>
                    $(document).ready(function() {
                        $('#tabItemVenda').DataTable({

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

                            "columnDefs": [{
                                    "targets": [0],
                                    "visible": false,
                                    "searchable": false,
                                }

                            ]
                        });
                    });
                </script>

            </div>
        </div>
    </section>

</body>

</html>