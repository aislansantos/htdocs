<?php
session_start();
require("conn.php");
require 'classes/usuario.class.php';

if ($_GET['acao'] == "sair") {
    session_destroy();
    header("Location: index.php");
}
if (!empty($_POST['user']) && !empty($_POST['pass'])) {
    $user  = addslashes($_POST['user']);
    $pass  =  addslashes($_POST['pass']);
    $usuario = new Usuario($pdo);
    if ($usuario->fazerLogin($user, $pass)) {
        header("Location: index.php");
        exit;
     }else{
     }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/geral.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Login - Controle de Soja</title>
</head>

<body>
    <div id="form-container">
        <div class="card" id="form-box">
            <form action="" method="post" id="login">
                <h1 class="text-center">Login</h1>

                <div class="form-group">
                    <label class="sr-only" for="login">Usuário</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-user"></span>
                        </div>
                        <input type="email" name="user" class="form-control" placeholder="E-mail" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="sr-only" for="senha">Senha</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-lock"></span>
                        </div>
                        <input type="password" name="pass" class="form-control" placeholder="Senha">
                    </div>
                </div>
                <div name="erro">
                        
                </div>

                <div class="form-group">
                    <input type="submit" value="Entrar" class="btn btn-secondary form-control">
                </div>
            </form>
        </div>
    </div>
</body>

</html>