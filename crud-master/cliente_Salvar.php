<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['ativo'] != true) {
    header('location: index.php?erro=2');
}
require("conn.php");
require "classes/cadastroCliente.class.php";


$cliente = new Cliente($pdo);

if (!empty($_GET['id'])) {
    $cod = $_GET['id'];
    $lista = $cliente->consultaEditar($cod);
} else {

    $lista = null;
}
if (!empty($_POST['nome'])) {
    $cod = $_POST['id'];
    $nome = $_POST['nome'];
    $cidade = $_POST['cidade'];
    $user = $_SESSION['usuario'];
    $cliente->SetId($cod);
    $cliente->SetNome($nome);
    $cliente->SetCidade($cidade);
    $cliente->SetUser($user);
    $cliente->verificaCliente();
    $cliente->salvar();
    header('location: cliente_Consultar.php');
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
    <title>Cadastro de Clientes</title>
</head>

<body>
    <div class="container">
        <header>
            <?php
            //adiciona topo e menu.
            include_once "menu.php"; ?>
        </header>
        <section class="corpo">
            <h2>Cadastro de Clientes</h2>
            <form action="" method="post">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $lista['id']; ?>">
                    <label for="">Nome:</label>
                    <input type="text" name="nome" value="<?php echo $lista['nome']; ?>" id="nome" class="form-control" required /><br>
                    <label for="">Cidade:</label>
                    <input type="text" name="cidade" value="<?php echo $lista['cidade']; ?>" id="cidade" class="form-control" required /><br>
                    <input type="submit" value="Salvar" class="btn btn-light">
                    <input type="button" value="Consultar" class="btn btn-light" onclick="window.location='cliente_Consultar.php';">
                </div>
            </form>
        </section>
    </div>
</body>

</html>