<?php
session_start();

if (!isset($_SESSION['usuario']) or $_SESSION['ativo'] != true) {
    header('location: index.php?erro=2');
}
require("conn.php");
require_once "classes/log.class.php";
$log = new log($pdo);
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
    <title>Consulta LOGS</title>
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
            <table class="table table-striped tab" id="tabLog">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Usuario</td>
                        <th scope="col">Data Alteração</td>
                        <th scope="col">Ação</td>
                    </tr>
                </thead>
                <?php if (!empty($_POST['pesquisar'])) {
                    $pesq = $_POST['pesquisar'];
                    $lista = $log->consultar($pesq);
                } else {
                    $lista = $log->consultar();
                }
                foreach ($lista as $item) :
                ?>
                    <tr>
                        <td><?php echo $item['usuario']; ?></td>
                        <td><?php echo $item['data_acao']; ?></td>
                        <td><?php echo $item['acao']; ?></td>

                    </tr>
                <?php endforeach; ?>
            </table>
            <script>
                $(document).ready(function() {
                    $('#tabLog').DataTable({

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
            <hr>
        </section>
    </div>

</body>

</html>