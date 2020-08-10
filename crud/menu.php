<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="" href="index.php">
    <img class="logo" id="logoTopo" src="img/logo.png" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Cadastro
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="usu_Consultar.php">Usuários</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="filial_Consultar.php">Filiais</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="vendedor_Consultar.php">Vendedores</a>
          <a class="dropdown-item" href="cliente_Consultar.php">Clientes</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="embalagem_Consultar.php">Embalagens</a>
          <a class="dropdown-item" href="fornecedor_Consultar.php">Fornecedores</a>
          <a class="dropdown-item" href="produto_Consultar.php">Produtos</a>
        </div>
      </li>

      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Movimentação
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="compra_Consultar.php">Compra</a>
          <a class="dropdown-item" href="#">Venda</a>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Estoque <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ultilitarios
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="log_Consultar.php">Logs</a>
        </div>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="login.php?acao=sair">Sair <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>