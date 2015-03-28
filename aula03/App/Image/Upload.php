<?php
namespace App\Image;

use ArrayIterator;

class Upload 
{
	private $file;
	public $nome;
	protected $dir;

	public function __construct(\App\Model\Pessoa $pessoa = null) 
	{
		$this->file = $pessoa;
	}

	public function hello() 
	{
		$this->nome = "Nome";
	}


	public function move($dir) 
	{
		move_uploaded_file($this->file, $dir);
	}

    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file)
    {
        $this->file = $file;
        return $this;
    }
}