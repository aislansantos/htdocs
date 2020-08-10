<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['ativo'] != true) {
    header('location: index.php?erro=2');
}


require('conn.php');
require_once 'classes/cadastroFornecedor.class.php';
require_once 'classes/cadastroEmbalagem.class.php';
require('classes/cadastroProduto.class.php');

$fornecedor = new CadastroFornecedores($pdo);
$embalagem = new CadastroEmbalagem($pdo);

$listaFornecedor = $fornecedor->consultar();
$listaEmbalagem = $embalagem->consultarEmbalagem();

//comwço do uso para cadastro de produto
$produto = new CadastroProduto($pdo);


if (!empty($_GET['id'])) {
    $cod = addslashes($_GET['id']);
    $listaProduto = $produto->consultaEditar($cod);
} else {
    $listaProduto = null;
}

if (!empty($_POST['descricaoSoja']) || !empty($_POST['codigo']) || !empty($_POST['pms']) || !empty($_POST['fornecedor']) || !empty($_POST['embalagem']) || !empty($_POST['intacta'])) {
    $cod = addslashes($_POST['id']);
    $descricao = addslashes($_POST['descricaoSoja']);
    $codigo = addslashes($_POST['codigo']);
    $pms = addslashes($_POST['pms']);
    $fornecedor = addslashes($_POST['fornecedor']);
    $embalagem = addslashes($_POST['embalagem']);
    $intacta = addslashes($_POST['intacta']);
    $user = addslashes($_SESSION['usuario']);


    $produto->setId($cod);
    $produto->setDescricao($descricao);
    $produto->setCodigo($codigo);
    $produto->setPms($pms);
    $produto->setFornecedor($fornecedor);
    $produto->setEmbalagem($embalagem);
    $produto->setIntacta($intacta);
    $produto->setUser($user);

    $produto->salvar();

    header('location: produto_Consultar.php');
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
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    <title>Cadastro Produtos</title>
</head>

<body class="bg-light">
    <div class="">
        <header>
            <?php include_once "menu.php" ?>
        </header>

        <section class="corpo">
            <h1 id="content" class="bd-title">Cadastro de Produto</h1>
            <hr class="my-4">

            <form action="" method="post">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php if (!empty($listaProduto['id'])) {
                                                                echo $listaProduto['id'];
                                                            } ?>" /><br>

                    <label for="descricao">Descrição:</label>
                    <input type="text" name="descricaoSoja" id="descricaoSoja" class="form-control" maxlength="100" value="<?php if (!empty($listaProduto['descricao'])) {
                                                                                                                                echo $listaProduto['descricao'];
                                                                                                                            } ?>" /><br>

                    <div class="row">
                        <div class="col-sm-2">
                            <label for="codigo">Código:</label>
                            <input type="text" name="codigo" id="codigo" class="form-control" maxlength="500" value="<?php if (!empty($listaProduto['codigo'])) {
                                                                                                                            echo $listaProduto['codigo'];
                                                                                                                        } ?>" required /><br>
                        </div>

                        <div class="col-sm-2">
                            <label for="pms">PMS/PEneira:</label>
                            <input type="text" name="pms" id="pms" class="form-control" maxlength="4" value="<?php if (!empty($listaProduto['pms'])) {
                                                                                                                    echo $listaProduto['pms'];
                                                                                                                } ?>" required /><br>
                        </div>


                        <div class="col">
                            <label for="Fornecedor">Fornecedor:</label>
                            <select name="fornecedor" id="fornecedor" class="form-control">
                                <?php if (!empty($listaProduto['id_Fornecedor'] != '')) { ?>
                                    <?php foreach ($listaFornecedor as $chave => $valor) { ?>
                                        <option value="<?= $valor["id"]; ?>" <?php if ($valor["id"] == $listaProduto["id_Fornecedor"]) echo "selected"; ?>><?= $valor["nome"] ?></option>
                                    <?php } ?>
                                <?php } else {
                                    foreach ($listaFornecedor as $iten) {
                                        echo '<option value="' . $iten["id"] . '">' . ($iten["nome"]) . '</option>';
                                    }
                                } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <label for="embalagem">Embalagem:</label>
                            <select name="embalagem" id="embalagem" class="form-control">
                            <?php if (!empty($listaProduto['id_Embalagem'] != '')) { ?>
                                    <?php foreach ($listaEmbalagem as $chave => $valor) { ?>
                                        <option value="<?= $valor["id"]; ?>" <?php if ($valor["id"] == $listaProduto["id_Embalagem"]) echo "selected"; ?>><?= $valor["descricao"] ?></option>
                                    <?php } ?>
                                <?php } else {
                                    foreach ($listaEmbalagem as $valor) {
                                        echo '<option value="' . $valor["id"] . '">' . ($valor["descricao"]) . '</option>';
                                    }
                                } ?>
                            </select>
                        </div>



                        <div class="col-sm-2">
                            <label for="intacta">Intacta:</label>
                            <select name="intacta" id="intacta" class="form-control">
                            <option value="0" <?php if (!empty($listaProduto["intacta"])) {
                                                                if ($listaProduto['intacta'] == 0) echo "selected";
                                                            } ?>>Sim</option>
                                        <option value="1" <?php if (!empty($listaProduto['intacta'])) {
                                                                if ($listaProduto['intacta'] == 1) echo "selected";
                                                            } ?>>Não</option>
                            </select><br>
                        </div>
                    </div>


                </div>
                <input type="submit" value="SALVAR" class="btn btn-success">
                <input type="button" value="CONSULTAR" class="btn btn-info" onclick="window.location='produto_Consultar.php';">
            </form>
        </section>
    </div>
</body>

</html>