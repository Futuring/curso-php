<?php
namespace App\Model;

use App\Image\Upload;

class Pessoa 
{
	public $name;

	public function __construct() 
	{
		$upload = new Upload();
		$upload->setFile("fdsa.png");
		echo $upload->getFile();
	}
}