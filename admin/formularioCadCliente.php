<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clientes - Àrea Administrativa de Ordem de serviços</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>
<header>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-sm-12">
                <h2 class="navbar-brand">Sistema de Ordem de serviços</h2>
            </div>
            <div class="col-12 col-md-6 col-sm-12">
                <nav class="navbar navbar-expand-lg">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false">
                        <i class="bi bi-list"></i>
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
                <h2 class="modal-title" >Novo Cliente</h2>
            </div>
            <div class="col-12 col-md-6 col-sm-12 text-right">
                <a href="clientes.php" >Voltar</a>
            </div>
        </div>

        <div id="novoCliente">
           <form method="post" id="novo-cliente" action="controllers/clientesController.php">
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
                            <a href="clientes.php" class="btn btn-danger">Fechar</a>
                            <button type="submit" class="btn btn-success" name="cadastrar">Salvar</button>
                        </div>
                    </form>
        </div>

    </div>

</main>

<script src="assets/js/jquery-3.6.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.mask.min.js"></script>
<script src="assets/js/admin.js"></script>
</body>
</html>