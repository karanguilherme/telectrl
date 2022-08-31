<?php

require_once  '../app/Clientes.php';
require_once '../model/clientesModel.php';

$clientes = new clientesModel();

function selecionar($idcliente){
    $cliente = new Clientes();
    $clientes = $cliente->selecionar($idcliente);
    return json_decode($clientes);
}


if(isset($_POST['cadastrar'])) {
    $cliente = new Clientes();
    $cliente->nome     = $_POST['nome'];
    $cliente->cpf      = $_POST['cpf'];
    $cliente->cep      = $_POST['cep'];
    $cliente->endereco = $_POST['endereco'];
    $cliente->bairro   = $_POST['bairro'];
    $cliente->cidade   = $_POST['cidade'];
    $cliente->estado   = $_POST['estado'];

    $resp = $clientes->create($cliente);

    if($resp)
    {
        echo 'Cliente cadastrado com sucesso';
        header('Location: ../clientes.php');

    }

}

if(isset($_POST['editar'])) {

    $cliente = new Clientes();
    $cliente->nome     = $_POST['nome'];
    $cliente->cpf      = $_POST['cpf'];
    $cliente->cep      = $_POST['cep'];
    $cliente->endereco = $_POST['endereco'];
    $cliente->bairro   = $_POST['bairro'];
    $cliente->cidade   = $_POST['cidade'];
    $cliente->estado   = $_POST['estado'];
    $cliente->idcliente= $_POST['idcliente'];


    $resp = $clientes->edit($cliente);

    if($resp)
    {
        echo 'Cliente atualizado com sucesso';
        header('Location: ../clientes.php');
    }

}

if(isset($_POST['excluir'])) {

    $cliente = new Clientes();
    $cliente->idcliente = $_POST['idcliente'];

    $resp = $clientes->delete($cliente);

    if($resp)
    {
        echo 'Cliente deletado com sucesso';
        header('Location: ../clientes.php');
    }

}



