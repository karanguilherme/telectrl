<?php

require_once '../app/Produtos.php';
require_once '../model/produtosModel.php';

$produtos = new produtosModel();

if(isset($_POST['cadastrar'])) {

    $produto             = new Produtos();
    $produto->codigo     = $_POST['codigo'];
    $produto->descricao  = $_POST['descricao'];
    $produto->situacao   = $_POST['situacao'];

    $resp = $produtos->create($produto);

    if($resp)
    {
        echo 'Produto cadastrado com sucesso';
        header('Location: ../produtos.php');
    }

}

if(isset($_POST['editar'])) {

    $produto             = new Produtos();
    $produto->codigo     = $_POST['codigo'];
    $produto->descricao  = $_POST['descricao'];
    $produto->situacao   = $_POST['situacao'];
    $produto->idproduto  = $_POST['idproduto'];


    $resp = $produtos->edit($produto);

    if($resp)
    {
        echo 'Produto atualizado com sucesso';
        header('Location: ../produtos.php');
    }

}

if(isset($_POST['excluir'])) {

    $produto = new Produtos();

    $produto->idproduto  = $_POST['idproduto'];
    $resp = $produtos->delete($produto);

    if($resp)
    {
        echo 'Produto deletado com sucesso';
        header('Location: ../produtos.php');
    }

}

