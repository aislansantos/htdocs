<?php
session_start();

if (!isset($_SESSION['usuario']) or $_SESSION['ativo'] != true) {
    header('location: index.php?erro=2');
}
require("conn.php");
require 'classes/cadastroFilial.class.php';
$filial = new Filial($pdo);
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
    <title>Consulta Filiais</title>
</head>

<body>
    <div class="container">
    <header>
            <?php
            //adiciona topo e menu.
            include_once "menu.php"; ?>
        </header>
        <section class="corpo">
             <h2>Consulta de Filiais</h2>
             <form action="" method="POST">
                 <input type="search" name="pesquisar"  class="form-control" id="pesquisar" placeholder="Digite o nome"><br>
                 <input type="submit" class="btn btn-light" value="Pesquisar"><br><br>
             </form>
            <table class="table table-hover tab">
                <thead>
                    <tr>
                        <th scope="col">Nome</td>
                            <!--
                        <th scope="col">Sexo</td>
                        <th scope="col">Nivel de Acesso</td>
                        <th scope="col">Data de Cadastro</td>
                        -->
                        <th scope="col">Ação</td>
                    </tr>
                </thead>
                <?php if (!empty($_POST['pesquisar'])) {
                    $pesq = $_POST['pesquisar'];                    
                    $lista = $filial->consultar($pesq);
                }else {
                    $lista = $filial->consultar(); 
                }  
                foreach ($lista as $item) :
                    ?>
                    <tr>
                        <td><?php echo $item['nome']; ?></td>
  
                        <td>
                            <a href="<?php echo 'filial_Salvar.php?id=' . $item['id']; ?>" class="btn btn-outline-success">Editar</a>
                            <a href="<?php echo 'filial_Deletar.php?id=' . $item['id'].'&nome='.$item['nome']; ?>" class="btn btn-outline-danger">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <hr>
        </section>
    </div>

</body>

</html>