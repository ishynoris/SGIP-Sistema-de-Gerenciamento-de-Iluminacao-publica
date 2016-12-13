<?php

class HomeController
{
    public static function getLastLightPoints()
    {
        $dtibd = new Dtidb(Dtidb::HOST, Dtidb::DB_NAME, Dtidb::USER_NAME, Dtidb::PASSWORD);
        return $dtibd->executarQuery("select","SELECT logradouro FROM pontoiluminacao order by id desc Limit 10");
    }

    public static function getLastUserName()
    {
        $dtibd = new Dtidb(Dtidb::HOST, Dtidb::DB_NAME, Dtidb::USER_NAME, Dtidb::PASSWORD);
        return $dtibd->executarQuery("select","SELECT * FROM usuario order by id desc Limit 10");
    }
}