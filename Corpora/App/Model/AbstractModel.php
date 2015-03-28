<?php
namespace App\Model;

use App\DataBase\Db;

abstract class AbastractModel {

	use App\Traits\Db\Querys;
	
	protected $connection;

	public function __construct(Db $db) 
	{
		$this->connection = $db->getConnection();
	}
}