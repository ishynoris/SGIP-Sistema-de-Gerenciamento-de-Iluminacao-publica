<?php

require './controller/Controller.class.php';

class PontoIluminacaoController extends Controller
{
    const BTN_SAVE = "btn-save";

    function __construct()
    {
        parent::__construct(array());
    }

    public function triggerInput($input)
    {
        // TODO: Implement triggerInput() method.
    }

    public static function getAll(){
        $dtibd = new Dtidb(Dtidb::HOST, Dtidb::DB_NAME, Dtidb::USER_NAME, Dtidb::PASSWORD);
        $query = "SELECT * FROM pontoiluminacao";
        return $dtibd->executarQuery("select", $query);
    }
}