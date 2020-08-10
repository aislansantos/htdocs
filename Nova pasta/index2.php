<?php
$gmtDate = gmdate("D, d M Y H:i:s");
header("Expires: {$gmtDate} GMT");
header("Last-Modified: {$gmtDate} GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-Type: text/html; charset=ISO-8859-1");

$con = mysql_connect('localhost', 'root', '') or die ("Erro de conexão");
$res = mysql_select_db('trabalho') or die ("Banco de dados inexistente");
import_request_variables("g");

// Atualização do produto
if($_GET['acao'] == 'atualizar'){
	if(!empty($_GET['nome']) && !empty($_GET['preco'])){
		$preco = str_replace(",",".", $_GET['preco']); //troca a vírgula por ponto
		if(is_numeric($preco)){
			$sql = mysql_query("update produtos set nome = '".$_GET['nome']."', preco = '".$preco."' where codigo = '".$_GET['cod']."'");
			$res2 = mysql_query($sql);
			echo '1';
		}else{
			echo 'Preço inválido';
		}
	}
}

// exclusão de produtos
elseif($_GET['acao'] == 'excluir'){
	$sql = "delete from produtos where codigo = '".$_GET['cod']."'";
	$res = mysql_query($sql);
	echo '2';
}

// Cadastro de produtos
elseif($_GET['acao'] == 'cadastrar'){
	if(!empty($_GET['nome']) && !empty($_GET['preco'])){
		$preco = str_replace(",",".", $_GET['preco']);
		if(is_numeric($preco)){
			$sql = "insert into produtos (nome, preco) values ('".$_GET['nome']."', '".$preco."')";
			$res2 = mysql_query($sql);
			$novo_codigo = mysql_insert_id($con);
			
			//retorna a mensagem de confirmação de cadasro do produto
			echo "3";
		}else{
			echo 'Preço inválido';
		}
	}else{
		echo 'Você deve preencher todos os campos!';
	}
}
?>