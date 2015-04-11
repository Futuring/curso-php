<?php
namespace App\Model;

use App\DataBase\Db;

abstract class AbstractModel {

	use \App\Traits\Db\Querys;
	
	protected $connection;

	abstract public function __construct(Db $db);
}