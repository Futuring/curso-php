<?php
namespace App\Model;

use App\DataBase\Db;

class Pessoa extends AbstractModel
{
	private $id;

	private $nome;

	private $email;

	private $login;

	private $password;

	private $isAdmin;

	private $salt;

	public function __construct(Db $db) 
	{
		$this->connection = $db->getConnection();
		$this->table = "pessoa";			
	} 

	public function save()
	{
        
        $sql = "INSERT INTO {$this->table}". 
               "(nome, email, login, password, isAdmin, salt)". 
               "VALUES (:nome, :email, :login, :password, :isAdmin, :salt);";

        $statment = $this->connection->prepare($sql);
        $statment->bindParam("nome", $this->getNome());
        $statment->bindParam("isAdmin", $this->getIsAdmin());
        $statment->bindParam("password", $this->getPassword());
        $statment->bindParam("email", $this->getEmail());
        $statment->bindParam("login", $this->getLogin());
        $statment->bindParam("salt", $this->getSalt());
        
        try {
		  $statment->execute();

	       $this->id = $this->connection->lastInsertId();

	       return  $this;
        }catch (\Exception $e) {
            print_r($e);die;
        }
	}

	public function update($id)
	{

	}

    /**
     * Gets the value of salt.
     *
     * @return mixed
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Sets the value of salt.
     *
     * @param mixed $salt the salt
     *
     * @return self
     */
    private function setSalt()
    {

        $this->salt = md5(uniqid(rand(), true));
        return $this;
    }

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Gets the value of nome.
     *
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Sets the value of nome.
     *
     * @param mixed $nome the nome
     *
     * @return self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Gets the value of email.
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the value of email.
     *
     * @param mixed $email the email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Gets the value of login.
     *
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Sets the value of login.
     *
     * @param mixed $login the login
     *
     * @return self
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Gets the value of password.
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function encryptPassword($password) 
    {
    	$this->setSalt();

	   	$options = [
	    	'cost' => 12,
	    	'salt' => $this->getSalt()
		];

		return password_hash($password, PASSWORD_BCRYPT, $options)."\n";
    }

    /**
     * Sets the value of password.
     *
     * @param mixed $password the password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $this->encryptPassword($password);
        return $this;
    }

    /**
     * Gets the value of isAdmin.
     *
     * @return mixed
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * Sets the value of isAdmin.
     *
     * @param mixed $isAdmin the is admin
     *
     * @return self
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }
}