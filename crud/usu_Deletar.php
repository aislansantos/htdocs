<?php
session_start();

if (!isset($_SESSION['usuario']) or $_SESSION['ativo'] != true) {
    header('location: index.php?erro=2');
}
require 'conn.php';
require_once "classes/cadastroUsuario.class.php";
$usuario = new CadastroUsuario($pdo);

if (!empty($_GET['id'])) {
    $cod = $_GET['id'];
    $iden = $_GET['nome'];
    $user = $_SESSION['usuario'];
    $usuario->SetNome($iden);
    $usuario->SetId($cod);
    $usuario->SetUser($user);
    $usuario->deletar();
    header('location: usu_Consultar.php');
}