<?php

require_once __DIR__ .'/conexao.php';

class produtosModel
{

    public function selecionar($id)
    {
        try{
            $con = new conexao();
            $connect = $con->getConn();

            $sql = "SELECT * FROM produtos WHERE idproduto = $id";

            $query = $connect->query($sql);

            return $query->fetch();

        }
        catch (PDOException $e){

            echo $e->getMessage();

        }


    }

    public function list()
    {
        try{
            $con = new conexao();
            $connect = $con->getConn();

            $sql = "SELECT * FROM produtos";

            $query = $connect->query($sql);

            return $query->fetchAll();

        }
        catch (PDOException $e){

            echo $e->getMessage();

        }


    }

    public function create($dados)
    {
        try{
            $con = new conexao();
            $connect = $con->getConn();
            $sql = "INSERT INTO produtos 
                            (
                              codigo          ,
                              descricao       ,
                              situacao
                            )
                    VALUES 
                           (
                            '$dados->codigo'    ,
                            '$dados->descricao' ,
                            '$dados->situacao'
                            );";

            $query = $connect->query($sql);

            return $query;

        }
        catch (PDOException $e){

            echo $e->getMessage();

        }


    }

    public function edit($dados)
    {
        try{

            $con = new conexao();
            $connect = $con->getConn();

            $sql = "UPDATE produtos  SET
                           
                            codigo     = '$dados->codigo'     ,
                            descricao  = '$dados->descricao'  ,
                            situacao   = '$dados->situacao'

                   WHERE
                         
                           idproduto = $dados->idproduto;

                   ";

            $query = $connect->query($sql);

            return $query;

        }
        catch (PDOException $e){

            echo $e->getMessage();

        }


    }

    public function delete($dados)
    {
        try{
            $con = new conexao();
            $connect = $con->getConn();

            $sql = "DELETE FROM produtos  
                    WHERE
                    idproduto = $dados->idproduto;
            ";

            $query = $connect->query($sql);

            return $query;

        }
        catch (PDOException $e){

            echo $e->getMessage();

        }


    }

}