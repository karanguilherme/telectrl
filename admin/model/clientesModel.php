<?php

require_once __DIR__ .'/conexao.php';

class clientesModel
{

    public function list()
    {
        try{
            $con = new conexao();
            $connect = $con->getConn();

            $sql = "SELECT * FROM clientes";

            $query = $connect->query($sql);

            return $query->fetchAll();

        }
        catch (PDOException $e){

            echo $e->getMessage();

        }


    }

    public function selecionar($id)
    {
        try{
            $con = new conexao();
            $connect = $con->getConn();

             $sql = "SELECT * FROM clientes WHERE idcliente = $id";

            $query = $connect->query($sql);

            return $query->fetch();

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
            $sql = "INSERT INTO clientes 
                            (
                              nome      ,
                              cpf       ,
                              cep       ,
                              endereco  ,
                              bairro    ,
                              cidade    ,
                              estado
                            )
                    VALUES 
                           (
                            '$dados->nome'    ,
                            '$dados->cpf'     ,
                            '$dados->cep'     ,
                            '$dados->endereco',
                            '$dados->bairro'  ,
                            '$dados->cidade'  ,
                            '$dados->estado'
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

            $sql = "UPDATE clientes  SET
                           
                            nome     = '$dados->nome'     ,
                            cpf      = '$dados->cpf'      ,
                            cep      = '$dados->cep'      ,
                            endereco = '$dados->endereco' ,
                            bairro   = '$dados->bairro'   ,
                            cidade   = '$dados->cidade'   ,
                            estado   = '$dados->estado'

                   WHERE
                         
                           idcliente = $dados->idcliente;

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

            $sql = "DELETE FROM clientes  
                    WHERE
                    idcliente = $dados->idcliente;
            ";

            $query = $connect->query($sql);

            return $query;

        }
        catch (PDOException $e){

            echo $e->getMessage();

        }


    }

}