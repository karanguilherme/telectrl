<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produtos - Àrea Administrativa de Ordem de serviços</title>

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

<?php
require_once 'model/produtosModel.php';
if(isset($_POST['selecionar'])) {

    $produto = new produtosModel();
    $resp = $produto->selecionar($_POST['idproduto']);

}
?>
<main>
    <div class="container">

        <!--      Bloco Cabeçalho -->
        <div class="row">
            <div class="col-12 col-md-6 col-sm-12">
                <h2 class="modal-title" >Novo Produto</h2>
            </div>
            <div class="col-12 col-md-6 col-sm-12 text-right">
                <a href="produtos.php" >Voltar</a>
            </div>
        </div>

        <div id="novoProduto">
            <form method="post" id="novo-produto" action="controllers/produtosController.php">
                <input type="hidden" name="idproduto" id="idproduto"  value="<?php echo $resp['idproduto']?>">

                <div class="modal-body">

                    <div>
                        <label for="codigo">Codigo</label>
                        <input type="text" name="codigo" id="codigo" placeholder="Ex: 0001" required class="form-control" value="<?php echo $resp['codigo']?>">
                    </div>

                    <div>
                        <label for="descricao">Descrição</label>
                        <input type="text" name="descricao" id="descricao" placeholder="Impressora Elgin" required class="form-control" value="<?php echo $resp['descricao']?>">
                    </div>

                    <div>
                        <label for="situacao">Situação</label>
                        <input type="checkbox" id="situacao" name="situacao" checked>
                    </div>

                </div>
                <div class="modal-footer">
                    <a href="produtos.php" class="btn btn-danger" data-bs-dismiss="modal">Fechar</a>
                    <button type="submit" class="btn btn-success" name="editar">Salvar</button>
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