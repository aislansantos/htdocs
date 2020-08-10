<?php
session_start();

if(!isset($_SESSION['usuario']) ||  $_SESSION['ativo']  != true){
    header('location: index.php?error=2');
}

require 'conn.php';
require_once 'classes/cadastroFornecedor.class.php';
$fornecedor = new CadastroFornecedores($pdo);

if(!empty($_GET['id'])) {
$cod = $_GET['id'];
$nome = $_GET['nome'];
$user = $_SESSION['usuario'];

$fornecedor->setId($cod);
$fornecedor->setNome($nome);
$fornecedor->setUsuario($user);
$fornecedor->deletar();

header('location: fornecedor_Consultar.php');
}