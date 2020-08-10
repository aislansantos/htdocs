<?php
session_start();

if (!isset($_SESSION['usuario']) or $_SESSION['ativo'] != true) {
    header('location: index.php?erro=2');
}
require 'conn.php';
require_once "classes/cadastroVendedor.class.php";
$vendedor = new Vendedor($pdo);

if (!empty($_GET['id'])) {
    $cod = $_GET['id'];
    $iden = $_GET['nome'];
    $user = $_SESSION['usuario'];
    $vendedor->SetNome($iden);
    $vendedor->SetId($cod);
    $vendedor->SetUser($user);
    $vendedor->deletar();
    header('location: vendedor_Consultar.php');
}