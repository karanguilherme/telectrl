<?php

class conexao
{
    public function getConn()
    {
         try{
            $con = new PDO('pgsql:host=localhost;dbname=telecontrol', 'postgres','');
             return $con;
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }


}
