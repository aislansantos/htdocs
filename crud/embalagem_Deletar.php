<?php
session_start();

if(!isset($_SESSION['usuario']) ||  $_SESSION['ativo']  != true){
    header('location: index.php?error=2');
}

require 'conn.php';
require_once 'classes/cadastroEmbalagem.class.php';
$embalagem = new CadastroEmbalagem($pdo);

if(!empty($_GET['id'])) {
$cod = $_GET['id'];
$descricao =  addslashes($_GET['descricao']);
$user = $_SESSION['usuario'];

$embalagem->setId($cod);
$embalagem->setDescricao($descricao);
$embalagem->setUser($user);
$embalagem->deletar();

header('location: embalagem_Consultar.php');
}