<!--
@ Cont�m os c�digos que exibir�o os produtos existentes no banco de dados em forma de tabela e os 
@ controle necess�rios a sua manipula��o;

@ Copyright (c) 2008 Aline Lima, Aline Magalh�es, Andr�a Lopes, Frederico Pimentel.
@ Este documento permite c�pia, distribui��o e/ou modifica��o garantida sob os termos da Lincen�a 
@ P�blica Geral Menor do GNU conforme publicada pela Free Software Foundation; tanto a vers�o 2.1 da 
@ Licen�a quanto as vers�es posteriores. Esta biblioteca � distribu�do na expectativa de que seja 
@ �til, por�m, SEM NENHUMA GARANTIA; nem mesmo a garantia impl�cita de COMERCIABILIDADE OU ADEQUA��O A 
@ UMA FINALIDADE ESPEC�FICA. Consulte a Licen�a P�blica Geral Menor do GNU para mais detalhes. 
-->

<html>

<head>
	<script type="text/javascript" src="bibliotecaAjax.js"></script>
	<link rel="stylesheet" type="text/css" href="estiloDataGrid.css">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>DataGrid</title>
</head>

<body>
	<h2>Data Grid</h2>
	<div align="center">
		<div id="avisos">
			<form name="formulario">
				<table id="minhaTabela" cellpadding="1" cellspacing="1">
					<tr>
						<td colspan="5" id="titulo"><strong>CADASTRO DE PRODUTOS</strong></td>
					</tr>
					<tr id="cabecalho">
						<td id="codigo"><strong>C�digo</strong></td>
						<td id="nome"><strong>Nome:</strong></td>
						<td id="preco"><strong>Pre�o (R$):</strong></td>
						<td id="editar"><strong>&nbsp;</strong></td>
						<td id="excluir"><strong>&nbsp;</strong></td>
					</tr>
					<?php
					$dsn = "mysql:dbname=trabalho;host=localhost";
					$dbuser = "root";
					$dbpass = "";

					try {
						$pdo = new PDO($dsn, $dbuser, $dbpass);
						$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					} catch (PDOException $e) {
						echo "Falhou" . $e->getMessage();
					}
					$sql = "SELECT * FROM produtos";
					$stmt = $pdo->prepare($sql);
					$stmt->execute();
					if ($stmt->rowCount() > 0) {
						return $stmt->fetchAll();
					} else {
						return array();
					}
					$lista = $sql;
					foreach ($lista as $item) {
						echo $item['codigo'];
						echo $item['nome'];
						echo $item['preco'];
						$preco = number_format($preco, 2, ',', '.'); //formata o pre�o
						$idLinha = "linha$i";
						echo '<tr id="' . $idLinha . '">';
						echo '<td class="linhas" align="center">' . $codigo . '</td>';
						echo "<td class=\"linhas\">$nome</td>";
						echo "<td class=\"linhas\">$preco</td>";
						echo "<td class=\"linhas\"><a href=\"#\" onclick=\"EditarLinha('$idLinha', '$codigo');\"><img src=\"images/editar.gif\" alt=\"Editar\" title=\"Editar\"></a></td>";
						echo "<td class=\"linhas\"><a href=\"#\" onclick=\"ExcluirLinha('$idLinha', '$codigo');\"><img src=\"images/excluir.gif\" alt=\"Excluir\" title=\"Excluir\"></a></td>";
					}
					?>
					<tr>
						<td colspan="5" id="novo"><a href="javascript:NovoRegistro();"><img src="images/novo.gif" alt="Novo Produto" title="Novo Produto" /></a></td>
					</tr>
				</table>
			</form>
		</div>
</body>

</html>