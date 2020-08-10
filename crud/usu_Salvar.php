<?php
session_start();
if (!isset($_SESSION['usuario']) or $_SESSION['ativo'] != true) {
    header('location: index.php?erro=2');
}
require("conn.php");
require_once "classes/cadastroUsuario.class.php";

$usuario = new CadastroUsuario($pdo);
if (!empty($_GET['id'])) {
    $cod = $_GET['id'];
    $lista = $usuario->consultaEditar($cod);
} else {

    $lista = null;
}
if (!empty($_POST['nome']) || !empty($_POST['email']) || !empty($_POST['senha']) || !empty($_POST['sexo']) || !empty($_POST['nivel_Acesso'])) {
    $cod = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $sexo = $_POST['sexo'];
    $acesso = $_POST['nivel_Acesso'];
    $user = $user = $_SESSION['usuario'];
    $usuario->SetId($cod);
    $usuario->SetNome($nome);
    $usuario->SetEmail($email);
    $usuario->SetSenha($senha);
    $usuario->SetSexo($sexo);
    $usuario->SetNivelAcesso($acesso);
    $usuario->SetUser($user);
    $usuario->salvar();
    header('location: usu_Consultar.php');
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
    <title>Cadastro de Usuários
    </title>
</head>

<body class="bg-light">
    <div class="">
        <header>
            <?php
            //adiciona topo e menu.
            include_once "menu.php"; ?>
        </header>
        <section class="corpo">
            <h1 id="content" class="bd-title">Cadastro de Usuários</h1>
            <hr class="my-4">
            <form action="" method="post">
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php if (!empty($lista['id'])) {
                                                                echo $lista['id'];
                                                            } ?>">
                    <label for="">Nome:</label>
                    <input type="text" name="nome" value="<?php if (!empty($lista['nome'])) {
                                                                echo $lista['nome'];
                                                            } ?>" id="nome" class="form-control" required /><br>
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" value="<?php if (!empty($lista['email'])) {
                                                                echo $lista['email'];
                                                            } ?>" id="email" class="form-control" required /><br>
                    <div class="row">
                        <div class="col">
                            <label for="email">Senha:</label>
                            <input type="text" name="senha" value="<?php if (empty($lista['email'])) {
                                                                        echo "";
                                                                    } else {
                                                                        echo ($lista['senha']);
                                                                    }; ?>" id="senha" class="form-control" required /><br>
                            <div class="row">
                                <div class="col">
                                    <label for="sexo">Sexo:</label>
                                    <select name="sexo" id="sexo" class="form-control" required>
                                        <option value="">Selecione</option>
                                        <option value="1" <?php if (!empty($lista['sexo'])) {
                                                                if ($lista['sexo'] == 1) echo "selected";
                                                            } ?>>Masculino</option>
                                        <option value="2" <?php if (!empty($lista['sexo'])) {
                                                                if ($lista['sexo'] == 2) echo "selected";
                                                            } ?>>Feminino</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="sexo">Nivel de Acesso:</label>
                                    <select name="nivel_Acesso" id="nivel_Acesso" class="form-control" required>
                                        <option value="">Selecione</option>
                                        <option value="1" <?php if (!empty($lista["nivelAcesso"])) {
                                                                if ($lista['nivelAcesso'] == 1) echo "selected";
                                                            } ?>>Administrador</option>
                                        <option value="2" <?php if (!empty($lista['nivelAcesso'])) {
                                                                if ($lista['nivelAcesso'] == 2) echo "selected";
                                                            } ?>>Operacional</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <input type="submit" value="SALVAR" class="btn btn-success">
                <input type="button" value="CONSULTAR" class="btn btn-info" onclick="window.location='usu_Consultar.php';">
            </form>
        </section>
    </div>
</body>

</html>