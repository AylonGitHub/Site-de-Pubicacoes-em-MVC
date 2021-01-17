<?php

 // use Database\Connection;
require_once 'Conexao.php';

  class User

  {
    private $con;
  	private $id;
  	private $name;
  	private $email; 
  	private $password;
    private $res;


    public function __construct()
    {
        $this->con = Conexao::getConexao();
    }

  	public function validateLogin()
  	{  
  		// conectar no banco de dados
  		$con = Conexao::getConexao();


  		
  		// selecionar o usuario com mesmo email que o informado
  		$sql = 'SELECT * FROM user WHERE email = :email'; 
  		$stmt = $con->prepare($sql);  
  		$stmt->bindValue(':email', $this->email); 
  		$stmt->execute();  



  		if ($stmt->rowCount()) { 
  			$result = $stmt->fetch();

      
            
             // utilizar aqui password Rash para criptografar a senha.
  			if ($result['pass'] === $this->password) {
  				   $_SESSION['usr'] = array(
  				   	'id_user' => $result['id'],
  				   	'name_user'=> $result['name']);

  				   return true;


  				}  
  		}  
            
  		throw new \Exception('Login Inválido');
  		// Conferir a senha do usuário.
  		// Se tiver ok....criar a sessionn e direcionar para dashboard
  		// Se tiver com erro...redirecionar de volta para a tela inicial.

  	}

  	public function setEmail($email)
  	{
  		$this->email = $email;
  	}

  	public function setName($name)
  	{
  		$this->name = $name;
  	}

  	public function setPassword($password)
  	{
  		$this->password = $password;
  	}


  	public function getName()
  	{
  		return $this->name;
  	}

  	public function getEmail()
  	{
  		return $this->email;
  	}
  	public function getPassword()
  	{
  		return $this->password;
  	}
  }