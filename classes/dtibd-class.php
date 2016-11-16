<?php 

class DTIDb {
    private $host = "localhost";
	private $dbname = "dewol059_sip";
	private $username = "dewol059_sip";
	private $password = "iwd5QplD?$(9";

    private $active_connection;

    function __construct($host, $dbname, $username, $password){
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
    }
    
    private function conectar(){
        try{
            $this->active_connection = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->username, $this->password);
            $this->active_connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }catch(PDOException $e){
            echo "Falha: " . $e->getMessage() . "\n";
            die();
        }
    }

    private function fecharConexao(){
        $this->active_connection = null;
    }

    public function executarQuery($type, $sql, $params = false){
        $this->conectar();
		
        // Preparar e executar a query
        $query_resource = $this->active_connection->prepare($sql);
        if($query_resource){
            if($params){
                $query_execute_return = $query_resource->execute($params);
            }else{
                $query_execute_return = $query_resource->execute();
            }

            switch($type){
                case "select":
                    $return_data = $query_resource->fetchAll();
                    break;

                case "insert":
                    $return_data = $this->active_connection->lastInsertId();
                    break;

                case "exec":
                case "update":
                case "delete":
                    $return_data = $query_execute_return;
                    break;
            }

            $this->fecharConexao();
            return $return_data;

        }else{
            $this->fecharConexao();
            return false;
        }
    }
}
?>
