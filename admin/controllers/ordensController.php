<?php

require_once '../app/Ordens.php';
require_once '../model/ordensModel.php';

$ordens = new ordensModel();

if(isset($_POST['cadastrar'])) {

    $ordemser = new Ordens();
    $ordemser->idcliente     = $_POST['consumidores'];
    $ordemser->idproduto     = $_POST['produtos'];
    $ordemser->numero_ordem  = $_POST['numero_ordem'];
    $ordemser->data_abertura = $_POST['data_abertura'];
    $ordemser->status        = $_POST['status'];

    $resp = $ordens->create($ordemser);

    if($resp)
    {
        echo 'Ordem cadastrado com sucesso';
        header('Location: ../ordem-servico.php');
    }

}

if(isset($_POST['editar'])) {

    $ordemser = new Ordens();
    $ordemser->idcliente     = $_POST['consumidores'];
    $ordemser->idproduto     = $_POST['produtos'];
    $ordemser->numero_ordem  = $_POST['numero_ordem'];
    $ordemser->data_abertura = $_POST['data_abertura'];
    $ordemser->idordem       = $_POST['idordem'];

    $resp = $ordens->edit($ordemser);

    if($resp)
    {
        echo 'Ordem atualizada com sucesso';
        header('Location: ../ordem-servico.php');
    }

}

if(isset($_POST['excluir'])) {

    $ordem          = new Ordens();
    $ordem->idordem = $_POST['idordem'];

    $resp = $ordens->delete($ordem);

    if($resp)
    {
        echo 'Ordem deletada com sucesso';
        header('Location: ../ordem-servico.php');
    }

}

if(isset($_POST['mudarstatus'])) {

    $ordem          = new Ordens();
    $status         =  $_POST['status'];
    $idordem        =  $_POST['idordem'];

    $resp = $ordens->mudarstatus($status,$idordem);

    if($resp)
    {
        echo 'Status de Ordem de serviços Atualizada';
        header('Location: ../ordem-servico.php');
    }

}
