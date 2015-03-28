<?php
namespace App\Traits\Db;

trait Querys 
{

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