<?php
session_start();

if (!isset($_SESSION['usuario']) or $_SESSION['ativo'] != true) {
    header('location: index.php?erro=2');
}
require 'conn.php';
require_once "classes/cadastroFilial.class.php";
$filial = new Filial($pdo);

if (!empty($_GET['id'])) {
    $cod = $_GET['id'];
    $iden = $_GET['nome'];
    $user = $_SESSION['usuario'];
    $filial->SetNome($iden);
    $filial->SetId($cod);
    $filial->SetUser($user);
    $filial->deletar();
    header('location: Filial_Consultar.php');
}
