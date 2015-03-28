<?php
namespace App\DataBase;

class Db 
{

	//use \App\Traits\Db\Querys;

	/**
	* \PDO
	*/
	private $connection;

	const MYSQL = "mysql";
	const PGSQL = "pgsql";

	public function __construct($configDir = null) 
	{	
		try {
			if(! $configDir)
				$configDir = __DIR__."/../Config.php";

			$result = (object) $this->getConfiguracoes($configDir);		

			if($result->type != self::MYSQL && $result->type != self::PGSQL) 
				throw new \Exception("Nao existe esse banco de dados", 121);
				
			$this->connection = new \PDO($result->type.":"."host=".$result->host.";dbname=".$result->db, $result->user, $result->password);
		} catch(\Exception $e) {
			echo $e->getMessage();die;
		}
	}

	private function getConfiguracoes($config, $database = null) 
	{	
        $config = require_once($config);
       
        if(! isset($database)) {
            $default = $config['databases']['default'];
            if ( isset($config['databases'][$default]) ) {
                return $config['databases'][$default];
            } else {
                return 'Não existe configuração';
            }
        } else {        
            if(isset($config['databases'][$database])) {
                return $config['databases'][$database];
            } else {
                return 'Não existe configuração';
            }
               
        }
    }

	public function getConnection() 
	{
		return $this->connection;
	}

	public function findAll($table) 
	{
		$statement = $this->connection->prepare("SELECT * FROM {$table} ");
		$statement->execute();

		return $statement->fetchAll(\PDO::FETCH_OBJ);
	}

	public function find($table, $id) 
	{
		$statement = $this->connection->prepare("SELECT * FROM {$table} WHERE id = :id");
		$statement->bindParam("id", $id);
		$statement->execute();

		return $statement->fetchObject();
	}
	
	public function query($sql) 
	{
		return $this->connection->prepare($sql)->execute();
	}
}