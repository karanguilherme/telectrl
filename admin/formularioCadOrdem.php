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

    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

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
                <h2 class="modal-title" >Novo Ordem</h2>
            </div>
            <div class="col-12 col-md-6 col-sm-12 text-right">
                <a href="ordem-servico.php" >Voltar</a>
            </div>
        </div>

        <div id="novaOrdem">
            <form method="post" id="novaordem" action="controllers/ordensController.php">
                <div class="modal-body">

                    <div>
                        <label for="nordem">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="Aberto">Aberto</option>
                            <option value="Fechado">Fechado</option>
                        </select>
                    </div>

                    <div>
                        <label for="nordem">Nº Ordem</label>
                        <input type="text" name="numero_ordem" id="numero_ordem" required placeholder="Ex: OS021"  class="form-control">
                        <input type="hidden"name="cadastrar" id="cadastrar" value="cadastrar">
                    </div>

                    <div>
                        <label for="data">Data Abertura</label>
                        <input type="date" name="data_abertura" required id="data_abertura"   class="form-control">
                    </div>

                    <?php
                    require_once 'model/clientesModel.php';
                    require_once 'model/produtosModel.php';

                    function listarClientes(){
                        $cli    = new clientesModel();
                        $cliente = $cli->list();
                        return $cliente;
                    }

                    function listarProdutos(){
                        $pro    = new produtosModel();
                        $produto = $pro->list();
                        return $produto;
                    }

                    $clientes = listarClientes();
                    $produtos = listarProdutos();

                    ?>
                    <div>
                        <label for="consumidor">Nome do consumidor</label>

                        <select id="consumidores" name="consumidores" required class="buscaSelect form-control">
                            <option value="">Busque pelo nome do consumidor</option>
                            <?php foreach ($clientes as $c){?>
                                <option value="<?php echo $c['idcliente']?>"><?php echo $c['nome']?></option>
                            <?php }?>
                        </select>
                    </div>

                    <div>
                        <label for="produto">Produto</label>

                        <select id="produtos" name="produtos" required class="buscaSelect form-control">
                            <option value="">Busque pelo nome do produto</option>
                            <?php foreach ($produtos as $p){?>
                            <option value="<?php echo $p['idproduto']?>"><?php echo $p['descricao']?></option>
                            <?php }?>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <a href="ordem-servico.php" class="btn btn-danger" >Fechar</a>
                    <button type="submit" class="btn btn-success" >Salvar</button>
                </div>
            </form>
        </div>

    </div>

</main>

<script src="assets/js/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.mask.min.js"></script>
<script src="assets/js/admin.js"></script>


</body>
</html>