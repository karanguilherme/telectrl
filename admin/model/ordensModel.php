<?php
require_once __DIR__ .'/conexao.php';

class ordensModel
{
    public function selecionar($id)
    {
        try{
            $con = new conexao();
            $connect = $con->getConn();

            $sql = "SELECT * FROM ordem
                    INNER JOIN clientes ON clientes.idcliente = ordem.idcliente
                    INNER JOIN produtos ON produtos.idproduto = ordem.idproduto
                    WHERE idordem = $id";

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

            $sql = "SELECT * FROM ordem
                    INNER JOIN clientes ON clientes.idcliente = ordem.idcliente
                    INNER JOIN produtos ON produtos.idproduto = ordem.idproduto
                    ORDER BY ordem.status ASC ";

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

               $sql = "INSERT INTO ordem 
                                (
                                  idcliente       ,
                                  idproduto       ,
                                  data_abertura   ,
                                  status          ,
                                  numero_ordem   
                                )
                        VALUES 
                               (
                                
                                 ".$dados->idcliente."        ,
                                 ".$dados->idproduto."        ,
                                '".$dados->data_abertura."'   ,
                                '".$dados->status."'          ,
                                '".$dados->numero_ordem."'     
                                
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

           $sql = "UPDATE ordem  SET
                           
                            idcliente      = '$dados->idcliente'         ,
                            idproduto      = '$dados->idproduto'         ,
                            numero_ordem   = '$dados->numero_ordem'      ,
                            data_abertura  = '$dados->data_abertura'

                   WHERE
                         
                           idordem = $dados->idordem;

                   ";

            $query = $connect->query($sql);

            return $query;

        }
        catch (PDOException $e){

            echo $e->getMessage();

        }


    }

    public function mudarstatus($status,$idordem)
    {
        try{

            $con = new conexao();
            $connect = $con->getConn();

            $sql = "UPDATE ordem  SET  
                           status = '$status'
                   WHERE
                           idordem = $idordem;

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

            $sql = "DELETE FROM ordem  
                    WHERE
                    idordem = $dados->idordem
            ";

            $query = $connect->query($sql);

            return $query;

        }
        catch (PDOException $e){

            echo $e->getMessage();

        }


    }
}