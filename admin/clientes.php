<?php require_once 'inc/conexao.php';?>

<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Clientes - Àrea Administrativa de Ordem de serviços</title>

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
                <h2 class="title-head">Clientes</h2>
            </div>
            <div class="col-12 col-md-6 col-sm-12 text-right">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#novoCliente">Novo Cliente</button>
            </div>
        </div>

        <!--      Bloco de Pesquisa-->
        <div class="row  box-search">
            <div class="col-12 col-md-12 col-sm-12">
                <form id="login" method="post"></form>
                <input type="text" name="pesquisa" id="pesquisa" placeholder="Busque por CPF, Nome, Endereço ou Codigo do Cliente" required class="form-control">
            </div>
        </div>

        <!--      Bloco Cabeçalho da tabela-->
        <div class="row">
            <div class="col-12 col-md-2 col-sm-12 fw-bold">
                Cod. Cliente
            </div>
            <div class="col-12 col-md-5 col-sm-12 fw-bold">
                Nome
            </div>
            <div class="col-12 col-md-3 col-sm-12 fw-bold">
                CPF
            </div>
            <div class="col-12 col-md-2 col-sm-12 fw-bold">
                Ações
            </div>
        </div>
        <!--      Bloco Listagem de dados dos clientes-->
        <div class="list row">
            <div class="col-12 col-md-2 col-sm-12">
                Cod. Cliente
            </div>
            <div class="col-12 col-md-5 col-sm-12">
                Nome
            </div>
            <div class="col-12 col-md-3 col-sm-12">
                CPF
            </div>
            <div class="col-12 col-md-1 col-sm-12">
               <button id="deletarCliente" data-id="" data-bs-toggle="modal" data-bs-target="#excluirCliente">
                   <i class="bi bi-trash-fill"></i>
               </button>
            </div>
            <div class="col-12 col-md-1 col-sm-12">
                <button id="editaCliente" data-id="" data-bs-toggle="modal" data-bs-target="#editarCliente">
                    <i class="bi bi-pencil-square"></i>
                </button>
            </div>
        </div>



    </div>

</main>

<div class="modal fade" id="novoCliente" tabindex="-1" aria-labelledby="excluirClienteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="novoClienteLabel">Novo Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="post" id="novo-cliente">
            <div class="modal-body">

                    <div>
                        <label for="nome">Nome Completo</label>
                        <input type="text" name="nome" id="nome" placeholder="Nome Completo" required class="form-control">
                    </div>

                    <div>
                        <label for="nome">CPF</label>
                        <input type="text" name="cpf" id="cpf" placeholder="CPF" required class="form-control">
                    </div>

                    <div>
                        <label for="nome">CEP</label>
                        <input type="text" name="cep" id="cep" placeholder="Informe o Cep" required class="form-control">
                    </div>

                    <div>
                        <label for="nome">Endereço</label>
                        <input type="text" name="endereco" id="endereco" placeholder="Rua, Av, Travessa" required class="form-control">
                    </div>

                    <div>
                        <label for="nome">Bairro</label>
                        <input type="text" name="bairro" id="bairro" placeholder="Nome Completo" required class="form-control">
                    </div>
                    <div>
                        <label for="nome">Cidade</label>
                        <input type="text" name="cidade" id="cidade" placeholder="Nome Completo" required class="form-control">
                    </div>
                    <div>
                        <label for="nome">Estado</label>
                        <input type="text" name="estado" id="estado" placeholder="Nome Completo" required class="form-control">
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
<div class="modal fade" id="excluirCliente" tabindex="-1" aria-labelledby="excluirClienteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="excluirClienteLabel">Excluir Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" id="excluir-cliente">
                <input type="hidden" value="" id="codigo-cliente">
                <div class="modal-body">
                    Deseja realmente excluir este Cliente?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger">Excluir</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editarCliente" tabindex="-1" aria-labelledby="editarClienteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="editarClienteLabel">Editar Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="post" id="editar-cliente">
                <div class="modal-body">

                    <div>
                        <label for="nome">Nome Completo</label>
                        <input type="text" name="nome" id="nome" placeholder="Nome Completo" required class="form-control">
                    </div>

                    <div>
                        <label for="nome">CPF</label>
                        <input type="text" name="cpf" id="cpf" placeholder="CPF" required class="form-control">
                    </div>

                    <div>
                        <label for="nome">CEP</label>
                        <input type="text" name="cep" id="cep" placeholder="Informe o Cep" required class="form-control">
                    </div>

                    <div>
                        <label for="nome">Endereço</label>
                        <input type="text" name="endereco" id="endereco" placeholder="Rua, Av, Travessa" required class="form-control">
                    </div>

                    <div>
                        <label for="nome">Bairro</label>
                        <input type="text" name="bairro" id="bairro" placeholder="Nome Completo" required class="form-control">
                    </div>
                    <div>
                        <label for="nome">Cidade</label>
                        <input type="text" name="cidade" id="cidade" placeholder="Nome Completo" required class="form-control">
                    </div>
                    <div>
                        <label for="nome">Estado</label>
                        <input type="text" name="estado" id="estado" placeholder="Nome Completo" required class="form-control">
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

<script src="../assets/js/jquery-3.6.1.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/jquery.mask.min.js"></script>
<script src="../assets/js/admin.js"></script>
</body>
</html>