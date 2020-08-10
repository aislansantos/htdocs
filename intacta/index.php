<?php
require('conn.php');
require("assets/class/cadastroCliente.class.php");

$cliente = new CadastroCLiente($pdo);

//Pega ID do cliente e chama rotina de pesquisa e retorna vetor com os dados do cliente  para edição
if (!empty($_GET['idCliEdita'])) {
    $cod = addslashes($_GET['idCliEdita']);
    $lista = $cliente->consultaEditar($cod);
}

//Pega ID do cliente e chama a função para deletar
if (!empty($_GET['idCliDelete'])) {
    $codDel = addslashes($_GET['idCliDelete']);

    $lista = $cliente->deletarCliente($codDel);
}

//Se campo não em branco faz a Insert ou Update do cadastro
if (!empty($_POST['nomeCli'])) {
    $cod = addslashes($_POST['idCli']);
    $nome = addslashes($_POST['nomeCli']);
    $cpf = addslashes($_POST['cpfCli']);
    $gerado = addslashes($_POST["gerado"]);
    $enviado = addslashes($_POST['enviado']);
    $autorizado = addslashes($_POST['autorizado']);
    $vLancado = addslashes($_POST['vLancado']);



    //seta os campos da classes com os valores das variaveis
    $cliente->setId($cod);
    $cliente->setNome($nome);
    $cliente->setCpf($cpf);
    $cliente->setGerado($gerado);
    $cliente->setEnviado($enviado);
    $cliente->setAutorizado($autorizado);
    $cliente->setLancado($vLancado);

    //verifica se tem o cliente cadastrado para evitar duplicidade do cadastro
    $cliente->verificaCliente();

    //executa a função que salva/edita o cliente
    $cliente->Salvar();

    //faz refresh da pagina usando JavaScript
    echo "<script>window.location = 'index.php'; </script>";
}

include('paginas/header.php');
?>




<br>
<div class="container">

    <?php
    //trata se campo em branco no momento de salvar mostra mensagem de alerta para digitar nome do cliente
    //if (isset($_POST['nomeCli'])) {
    //    echo "<div class='alert alert-danger' role='alert'>
    //    Digite nome do Cliente!
    //     </div>";
    //}
    //if ($cliente->Salvar()){

    //}
    ?>

    <form action="" method="post">
        <div class="input-group mb-3 w-75">

            <input type="hidden" name="idCli" value="<?php
                                                        /*se a lista(array) foi carregada ele popula o campo com o 
                                                        valor correspondente dentro da chave na tabela do banco de dados*/
                                                        if (!empty($lista['id'])) {
                                                            echo $lista['id'];
                                                        } ?>" />
            <input type="text" name="nomeCli" id="nomeCli" class="form-control" placeholder="Nome" aria-describedby="btSalvarCli" maxlength="50" value="<?php
                                                                                                                                                        /*se a lista(array) foi carregada ele popula o campo com o 
                                                                                                                                                        valor correspondente dentro da chave na tabela do banco de dados*/
                                                                                                                                                        if (!empty($lista['nome'])) {
                                                                                                                                                            echo $lista['nome'];
                                                                                                                                                        } ?>" />

            <input type="text" name="cpfCli" id="cpfCli" class="form-control" placeholder="CPF" aria-describedby="btSalvarCli" maxlength="50" value="<?php
                                                                                                                                                        /*se a lista(array) foi carregada ele popula o campo com o 
                                                                                                                                                        valor correspondente dentro da chave na tabela do banco de dados*/
                                                                                                                                                        if (!empty($lista['cpf'])) {
                                                                                                                                                            echo $lista['cpf'];
                                                                                                                                                        } ?>" />

            <div class="input-group-append">
                <input type="submit" class="btn btn-success" type="button" id="btSalvarCli" value="Salvar">
                <button class="btn btn-success" type="button" onclick="window.location = 'index.php';">Novo</button>
                <input type="button" class="btn btn-success" value="Imprimir" onclick="window.location.href='imprime.php'" />
            </div>

        </div>
        <div class=" form-row">
            <div class="form-group col-md-2">
                <label for="">Acordo Gerado</label>
                <select name="gerado" id="gerado" class="form-control">
                    <option value="0" <?php if (!empty($lista['acordoGerado'])) {
                                            if ($lista['acordoGerado'] == 0) echo "selected";
                                        } ?>>Não</option>
                    <option value="1" <?php if (!empty($lista['acordoGerado'])) {
                                            if ($lista['acordoGerado'] == 1) echo "selected";
                                        } ?>>Sim</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="">Acordo Enviado</label>
                <select name="enviado" id="enviado" class="form-control">
                    <option value="0" <?php if (!empty($lista['acordoEnviado'])) {
                                            if ($lista['acordoEnviado'] == 0) echo "selected";
                                        } ?>>Não</option>
                    <option value="1" <?php if (!empty($lista['acordoEnviado'])) {
                                            if ($lista['acordoEnviado'] == 1) echo "selected";
                                        } ?>>Sim</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="">Acordo Autorizado</label>
                <select name="autorizado" id="autorizado" class="form-control">
                    <option value="0" <?php if (!empty($lista['acordoAutorozado'])) {
                                            if ($lista['acordoAutorozado'] == 0) echo "selected";
                                        } ?>>Não</option>
                    <option value="1" <?php if (!empty($lista['acordoAutorozado'])) {
                                            if ($lista['acordoAutorozado'] == 1) echo "selected";
                                        } ?>>Sim</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="">Volume Lançado</label>
                <select name="vLancado" id="vLancado" class="form-control">
                    <option value="0" <?php if (!empty($lista['volumeLancado'])) {
                                            if ($lista['volumeLancado'] == 0) echo "selected";
                                        } ?>>Não</option>
                    <option value="1" <?php if (!empty($lista['volumeLancado'])) {
                                            if ($lista['volumeLancado'] == 1) echo "selected";
                                        } ?>>Sim</option>
                </select>
            </div>
        </div>
    </form>

    <hr>

    <table class="table table-striped table-hover" name="clientes" id="clientes">
        <thead class="thead-dark">
            <th>Nome</th>
            <th>Cod</th>
            <th>CNPJ/CPF</th>
            <th>Gerado</th>
            <th>Enviado</th>
            <th>Autorizado</th>
            <th>Lançado</th>
            <th></th>
        </thead>
        <?php
        //chama a função que roda o select da tabela cliente cria array com todos os registros.
        $lista = $cliente->ConsultaCliente();

        //cria de item a item da consulta(array) $lista.
        foreach ($lista as $item) :
        ?>
            <tr>
                <?php
                $tabela=$cliente->populaTabela($item);
                ?>
                <td>
                    <a href="<?php echo 'index.php?idCliEdita=' . $item['id']; ?>" class="btn btn-info">Editar</a>
                    <a href="<?php echo 'index.php?idCliDelete=' . $item['id']; ?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <script src="assets/js/script.js"></script>
</div>


<?php
include('paginas/footer.php');
?>