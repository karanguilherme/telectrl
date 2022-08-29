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
                <nav>
                    <ul class="flex end">
                        <li><a href="clientes.php">Clientes</a></li>
                        <li><a href="produtos.php">Produtos</a></li>
                        <li><a href="ordem-servico.php">Ordem de Serviços</a></li>
                    </ul>
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
                <h2 class="title-head">Ordens de serviço</h2>
            </div>
            <div class="col-12 col-md-6 col-sm-12 text-right">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#novoOrdem">Nova Ordem</button>
            </div>
        </div>

        <!--      Bloco de Pesquisa-->
        <div class="row  box-search">
            <div class="col-12 col-md-12 col-sm-12">
                <form id="login" method="post"></form>
                <input type="text" name="pesquisa" id="pesquisa" placeholder="Busque pelo codigo, cpf, nome do cliente ou produto" required class="form-control">
            </div>
        </div>

        <!--      Bloco Cabeçalho da tabela-->
        <div class="row">
            <div class="col-12 col-md-2 col-sm-12 fw-bold">
                Nº Ordem
            </div>
            <div class="col-12 col-md-5 col-sm-12 fw-bold">
                Data Abertura
            </div>
            <div class="col-12 col-md-3 col-sm-12 fw-bold">
                Consumidor
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
                <button id="deletarProduto" data-id="" data-bs-toggle="modal" data-bs-target="#excluirOrdem">
                    <i class="bi bi-trash-fill"></i>
                </button>
            </div>
            <div class="col-12 col-md-1 col-sm-12">
                <button id="editaProduto" data-id="" data-bs-toggle="modal" data-bs-target="#editarOrdem">
                    <i class="bi bi-pencil-square"></i>
                </button>
            </div>
        </div>



    </div>

</main>

<div class="modal fade" id="novoOrdem" tabindex="-1" aria-labelledby="novoOrdemLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="novoOrdemLabel">Nova Ordem</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="post" id="novo-produto">
                <div class="modal-body">

                    <div>
                        <label for="nordem">Nº Ordem</label>
                        <input type="text" name="nordem" id="nordem" placeholder="Ex: OS021" required class="form-control">
                    </div>

                    <div>
                        <label for="data">Data Abertura</label>
                        <input type="date" name="data" id="data"  required class="form-control">
                    </div>

                    <div>
                        <label for="cpf">CPF do consumidor</label>
                        <input type="text" name="cpf" id="cpf" placeholder="Informe o CPF" required class="form-control">
                    </div>

                    <div>
                        <label for="consumidor">Nome do consumidor</label>
                        <input type="text" name="consumidor" id="consumidor" placeholder="Nome do consumidor" required class="form-control">
                    </div>

                    <div>
                        <label for="produto">Produto</label>
                        <input type="text" name="produto" id="produto" placeholder="Informe o produto" required class="form-control">
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
<div class="modal fade" id="excluirOrdem" tabindex="-1" aria-labelledby="excluirOrdemLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="excluirOrdemLabel">Excluir Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" id="excluir-ordem">
                <input type="hidden" value="" id="codigo-cliente">
                <div class="modal-body">
                    Deseja realmente excluir esta Ordem de Serviço?
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