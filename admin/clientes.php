<?php

require_once 'model/clientesModel.php';

function listarClientes(){
    $cliente = new clientesModel();
    $clientes = $cliente->list();
    //print_r($clientes);
    return $clientes;
}
?>

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
            <div class="col-6 col-md-6 col-sm-6">
                <h2 class="title-head">Clientes</h2>
            </div>
            <div class="col-6 col-md-6 col-sm-6 text-right">
                <a href="formularioCadCliente.php" class="btn btn-primary">Novo Cliente</a>
            </div>
        </div>

        <!--      Bloco Cabeçalho da tabela-->
        <div class="row">
            <div class="col-12 col-md-2 col-sm-12 fw-bold  d-sm-none d-md-block d-none d-sm-block">
                Cod. Cliente
            </div>
            <div class="col-6 col-md-5 col-sm-6 fw-bold">
                Nome
            </div>
            <div class="col-12 col-md-3 col-sm-12 fw-bold  d-sm-none d-md-block d-none d-sm-block">
                CPF
            </div>
            <div class="col-6 col-md-2 col-sm-6 fw-bold">
                Ações
            </div>
        </div>
        <!--      Bloco Listagem de dados dos clientes-->
        <?php
          $clientes = listarClientes();
        ?>
        <?php if( !empty($clientes) ){?>

        <div id="clientes">
                <?php foreach ($clientes as $c){?>

                    <div class="list row" i>
                    <div class="col-12 col-md-2 col-sm-12  d-sm-none d-md-block d-none d-sm-block">
                        <?php echo $c['idcliente']?>
                    </div>
                    <div class="col-6 col-md-5 col-sm-6">
                        <?php echo $c['nome']?>
                    </div>
                    <div class="col-12 col-md-3 col-sm-12  d-sm-none d-md-block d-none d-sm-block">
                        <?php echo $c['cpf']?>
                    </div>
                    <div class="col-6 col-md-1 col-sm-6 flex">
                        <form method="post" id="excluir-cliente" action="controllers/clientesController.php">
                            <input type="hidden" name="idcliente" value="<?php echo $c['idcliente']?>">
                           <button id="deletarCliente"  name="excluir">
                               <i class="bi bi-trash-fill"></i>
                           </button>
                        </form>

                        <form action="formularioEdtCliente.php" method="post">
                            <input type="hidden" name="idcliente" value="<?php echo $c['idcliente']?>">
                            <button id="editaCliente" class="editar-model" name="selecionar">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        </form>

                    </div>
                </div>

                <?php } ?>

                <?php }else{ ?>

                    <div class="row">
                    <div class="col-12 col-md-12 col-sm-12 text-center">
                        Nenhum registro encontrado até o momento.
                    </div>
                    </div>

                <?php } ?>
        </div>


    </div>

</main>


<div class="modal fade" id="excluirCliente" tabindex="-1" aria-labelledby="excluirClienteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="excluirClienteLabel">Excluir Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" id="excluir-cliente" action="controllers/clientesController.php">
                <input type="hidden" value="" id="codigo-cliente">
                <div class="modal-body">
                    Deseja realmente excluir este Cliente?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" name="excluir">Excluir</button>
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

            <form method="post" id="editar-cliente" action="controllers/clientesController.php">
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
                    <button type="submit" class="btn btn-success" name="editar">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="assets/js/jquery-3.6.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.mask.min.js"></script>
<script src="assets/js/admin.js"></script>
</body>
</html>