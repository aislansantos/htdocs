<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['ativo'] != true) {
    header('location: index.php?erro=2');
}


require('conn.php');
require_once 'classes/CadastroFornecedor.class.php';

$fornecedor = new CadastroFornecedores($pdo);
if (!empty($_GET['id'])) {
    $cod = $_GET['id'];
    $lista = $fornecedor->consultaEditar($cod);
} else {
    $lista = null;
}

if (!empty($_POST['nome']) || !empty($_POST['contato']) || !empty($_POST['email']) || !empty($_POST['telefone'])) {
    $cod = $_POST['id'];
    $nome = $_POST['nome'];
    $contato = $_POST['contato'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    $fornecedor->setId($cod);
    $fornecedor->setNome($nome);
    $fornecedor->setContato($contato);
    $fornecedor->setEmail($email);
    $fornecedor->setTelefone($telefone);

    $fornecedor->salvar();

    header('location: fornecedor_salvar.php');
}



?>



<!DOCTYPE html>
<html lang="pt-br">

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/geral.css">


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Forncedores</title>
</head>

<body>

</body>
<div class="container">
    <header>
        <?php include_once "menu.php" ?>
    </header>

    <section class="corpo">
        <h2>Cadastro de Fornecedores</h2>

        <form action="" method="post">
            <div class="form-group">
                <input type="hidden" name="id" value="<?php if (!empty($lista['id'])) {
                                                            echo $lista['id'];
                                                        } ?>">

                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control" maxlength="50" value="<?php if (!empty($lista['nome'])) {
                                                                                                        echo $lista['nome'];
                                                                                                    }  ?>" /><br>

                <div class="row">
                    <div class="col">
                        <label for="nome">Contato:</label>
                        <input type="text" name="contato" value="<?php if (!empty($lista['contato'])) {
                                                                        echo $lista['contato'];
                                                                    } ?>" id="contato" class="form-control" maxlength="50" required />
                    </div>
                    <div class="col">
                        <label for="contato">telefone:</label>
                        <input type="text" name="telefone" id="telefone" class="form-control" maxlength="50" value="<?php if (!empty($lista['telefone'])) {
                                                                                                                        echo $lista['telefone'];
                                                                                                                    } ?>" /><br>
                    </div>
                </div>

                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email" class="form-control" maxlength="100" value="<?php if (!empty($lista['email'])) {
                                                                                                            echo $lista['email'];
                                                                                                        } ?>" /><br>

            </div>
            <input type="submit" value="Salvar" class="btn btn-outline-secondary">
            <input type="button" value="Consultar" class="btn btn-outline-secondary" onclick="window.location='fornecedor_Consultar.php';">
        </form>
    </section>
</div>

</html>