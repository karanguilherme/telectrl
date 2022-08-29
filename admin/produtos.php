<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Produtos - Àrea Administrativa de Ordem de serviços</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../assets/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
<header>

  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 col-sm-12">
        <h2 class="navbar-brand">Sistema de Ordem de serviços</h2>
      </div>
      <div class="col-12 col-md-6 col-sm-12 text-right">
        <nav class="navbar navbar-expand-lg">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="menu">
          <ul class="flex end navbar-nav me-auto mb-2 mb-lg-0">
            <li><a href="clientes.php">Clientes</a></li>
            <li><a href="produtos.php">Produtos</a></li>
            <li><a href="ordem-servico.php">Ordem de Serviços</a></li>
          </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</header>

<main>
  <div class="container">

    <!--      Bloco Cabeçalho -->
    <div class="row">
      <div class="col-12 col-md-6 col-sm-12">
        <h2 class="title-head">Produtos</h2>
      </div>
      <div class="col-12 col-md-6 col-sm-12 text-right">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#novoProduto">Novo Produto</button>
      </div>
    </div>

    <!--      Bloco de Pesquisa-->
    <div class="row  box-search">
      <div class="col-12 col-md-12 col-sm-12">
        <form id="login" method="post"></form>
        <input type="text" name="pesquisa" id="pesquisa" placeholder="Busque pelo produto" required class="form-control">
      </div>
    </div>

    <!--      Bloco Cabeçalho da tabela-->
    <div class="row">
      <div class="col-12 col-md-2 col-sm-12 fw-bold">
        Código
      </div>
      <div class="col-12 col-md-5 col-sm-12 fw-bold">
        Descrição
      </div>
      <div class="col-12 col-md-3 col-sm-12 fw-bold">
        Situação
      </div>
      <div class="col-12 col-md-2 col-sm-12 fw-bold">
        Ações
      </div>
    </div>
    <!--      Bloco Listagem de dados dos clientes-->
      <div class="list row">
        <div class="col-12 col-md-2 col-sm-12 fw-bold">
          Código
        </div>
      <div class="col-12 col-md-5 col-sm-12 fw-bold">
        Descrição
      </div>
      <div class="col-12 col-md-3 col-sm-12 fw-bold">
        Situação
      </div>
      <div class="col-12 col-md-1 col-sm-12">
        <button id="deletarProduto" data-id="" data-bs-toggle="modal" data-bs-target="#excluirProduto">
          <i class="bi bi-trash-fill"></i>
        </button>
      </div>
      <div class="col-12 col-md-1 col-sm-12">
        <button id="editaProduto" data-id="" data-bs-toggle="modal" data-bs-target="#editarProduto">
          <i class="bi bi-pencil-square"></i>
        </button>
      </div>
    </div>



  </div>

</main>

<div class="modal fade" id="novoProduto" tabindex="-1" aria-labelledby="excluirProdutoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="novoClienteLabel">Novo Produto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form method="post" id="novo-produto">
        <div class="modal-body">

          <div>
            <label for="codigo">Codigo</label>
            <input type="text" name="codigo" id="codigo" placeholder="Ex: 0001" required class="form-control">
          </div>

          <div>
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao" placeholder="CPF" required class="form-control">
          </div>

          <div>
            <label for="situacao">Situação</label>
            <input type="checkbox" id="situacao" name="situacao" checked>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-success">Salvar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="excluirProduto" tabindex="-1" aria-labelledby="excluirProdutoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="excluirProdutoLabel">Excluir Produto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" id="excluir-produto">
        <input type="hidden" value="" id="codigo-cliente">
        <div class="modal-body">
          Deseja realmente excluir este Produto?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-danger">Excluir</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script src="../assets/js/jquery-3.6.1.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/jquery.mask.min.js"></script>
<script src="../assets/js/admin.js"></script>
</body>
</html>