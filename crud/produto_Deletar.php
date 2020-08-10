<?php
session_start();

if(!isset($_SESSION['usuario']) ||  $_SESSION['ativo']  != true){
    header('location: index.php?error=2');
}

require 'conn.php';
require_once 'classes/cadastroProduto.class.php';
$fornecedor = new CadastroProduto($pdo);

if(!empty($_GET['id'])) {
$cod = $_GET['id'];
$descricao = $_GET['descricao'];
$user = $_SESSION['usuario'];

$fornecedor->setId($cod);
$fornecedor->setDescricao($descricao);
$fornecedor->setUser($user);
$fornecedor->deletar();

header('location: produto_Consultar.php');
}