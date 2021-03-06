<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['ativo'] != true) {
    header('location: index.php?erro=2');
}

require('conn.php');
require_once('classes/cadastroEmbalagem.class.php');

$embalagem = new CadastroEmbalagem($pdo);

if (!empty($_GET['id'])) {
    $cod = addslashes($_GET['id']);
    $lista = $embalagem->consultaEditar($cod);
} else {
    $lista = null;
}

if (!empty($_POST['decricao']) || !empty($_POST['apelido'])) {
    $cod = $_POST['id'];
    $descricao = addslashes($_POST['descricao']);
    $apelido = addslashes($_POST['apelido']);
    $user = $_SESSION['usuario'];

    $embalagem->setId($cod);
    $embalagem->setDescricao($descricao);
    $embalagem->setApelido($apelido);
    $embalagem->setUser($user);

    $embalagem->salvar();

    header('location: embalagem_Salvar.php');
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
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Embalagens</title>
</head>

<body class="bg-light">
    <div class="">
        <header>
            <?php
            include_once "menu.php";
            ?>
        </header>
        <section class="corpo">
            <h1 id="content" class="bd-title">Cadastro de Embalagens</h1>
            <hr class="my-4">

            <form action="" method="post">
                <input type="hidden" name="id" value="<?php if (!empty($lista['id'])) {
                                                            echo $lista['id'];
                                                        } ?>">
                <label for="descricao">Descrição</label>
                <input type="text" name="descricao" id="descricao" class="form-control" maxlength="50" value="<?php if (!empty($lista['descricao'])) {
                                                                                                                    echo $lista['descricao'];
                                                                                                                } ?>"><br>
                <label for="apelido">Abreviado</label>
                <input type="text" name="apelido" id="apelido" class="form-control" maxlength="50" value="<?php if (!empty($lista['apelido'])) {
                                                                                                                echo $lista['apelido'];
                                                                                                            } ?>"><br>
                <input type="submit" value="SALVAR" class="btn btn-success">
                <input type="button" value="CONSULTAR" class="btn btn-info" onclick="window.location='embalagem_Consultar.php';">
            </form>

        </section>
    </div>
</body>

</html>