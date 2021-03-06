<?php
session_start();

if (!isset($_SESSION['usuario']) or $_SESSION['ativo'] != true) {
    header('location: index.php?erro=2');
}
require("conn.php");
require 'classes/cadastroCliente.class.php';
$cliente = new Cliente($pdo);
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
    <title>Consulta Clientes</title>
</head>

<body class="bg-light">
    <div class="">
        <header>
            <?php
            //adiciona topo e menu.
            include_once "menu.php"; ?>
        </header>
        <section class="corpo">
            <h1 id="content" class="bd-title">Cadastro de Clientes</h1>
            <hr class="my-4">

            <form action="" name="filtro" method="POST">
                <input type="search" name="pesquisar" class="form-control" id="pesquisar" placeholder="Digite o nome"><br>
                <input type="submit" class="btn btn-primary" value="PESQUISAR">
                <input type="button" value="NOVO" class="btn btn-success" onclick="window.location='cliente_Salvar.php';">
            </form><br>


            <table class="table table-striped table-dark table-hover tab">
                <thead>
                    <tr>
                        <th scope="col">Nome</td>
                        <th scope="col">Cidade</td>
                        <th scope="col">Ação</td>
                    </tr>
                </thead>
                <?php if (!empty($_POST['pesquisar'])) {
                    $pesq = $_POST['pesquisar'];
                    $lista = $cliente->consultar($pesq);
                } else {
                    $lista = $cliente->consultar();
                }
                foreach ($lista as $item) :
                ?>
                    <tr>
                        <td><?php echo $item['nome']; ?></td>
                        <td><?php echo $item['cidade']; ?></td>
                        <td>
                            <a href="<?php echo 'cliente_Salvar.php?id=' . $item['id']; ?>" class="btn btn-info">CONSULTAR</a>
                            <a href="<?php echo 'cliente_Deletar.php?id=' . $item['id'] . '&nome=' . $item['nome']; ?>" class="btn btn-danger">EXCLUIR</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <hr>
        </section>
    </div>

</body>

</html>