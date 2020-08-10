<?php
session_start();

if (!isset($_SESSION['usuario']) or $_SESSION['ativo'] != true) {
    header('location: index.php?erro=2');
}
require 'conn.php';
require_once "classes/cadastroCliente.class.php";
$cliente = new Cliente($pdo);

if (!empty($_GET['id'])) {
    $cod = $_GET['id'];
    $iden = $_GET['nome'];
    $user = $_SESSION['usuario'];
    $cliente->SetNome($iden);
    $cliente->SetId($cod);
    $cliente->SetUser($user);
    $cliente->deletar();
    header('location: cliente_Consultar.php');
}
