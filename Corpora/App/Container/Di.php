<?php
namespace App\Container;

use App\DataBase\Db;

class Di 
{
	private static $connection;

	public function getModel($name) 
	{
		$className = "\\App\\Model\\".ucfirst($name);
		
		$model = new $className(self::getConnection());

		return $model;
	}

	private static function getConnection() 
	{
		if(! isset(self::$connection))
			self::$connection = new Db();

		return self::$connection;
	}
}