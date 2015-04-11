<?php
namespace App\Traits\Db;

trait Querys 
{
	protected $table;

	public function findAll() 
	{
		$statement = $this->connection->prepare("SELECT * FROM {$this->table} ");
		$statement->execute();

		return $statement->fetchAll(\PDO::FETCH_OBJ);
	}

	public function find($id) 
	{
		$statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE id = :id");
		$statement->bindParam("id", $id);
		$statement->execute();

		return $statement->fetchObject();
	}
	
	public function query($sql) 
	{
		return $this->connection->prepare($sql)->execute();
	}
	
}