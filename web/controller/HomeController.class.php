<?php

class HomeController
{
    public static function getLastLightPoints()
    {
        $dtibd = new Dtidb(Dtidb::HOST, Dtidb::DB_NAME, Dtidb::USER_NAME, Dtidb::PASSWORD);
        $query = "SELECT logradouro, numPredialProx, bairro, cidade, uf 
                    FROM endereco AS e 
                    INNER JOIN pontoiluminacao as pi 
                    WHERE e.id = pi.id_endereco order by e.id desc Limit 10";
        return $dtibd->executarQuery("select", $query);
    }

    public static function getLastUserName()
    {
        $dtibd = new Dtidb(Dtidb::HOST, Dtidb::DB_NAME, Dtidb::USER_NAME, Dtidb::PASSWORD);
        return $dtibd->executarQuery("select","SELECT * FROM usuario order by id desc Limit 10");
    }
}