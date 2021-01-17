<?php

Class Conexao{

	private static $instancia;

	private function __construct(){}

	public static function getConexao()
	{
		if (!isset(self::$instancia)) 
		{
		
			$dbname = 'serie_criando_site';
			$host = 'localhost';
			$user = 'aylon';
			$senha = '123';

			try{
	             self::$instancia = new PDO('mysql:dbname='.$dbname.';host='.$host,$user,$senha);
			}catch (Exception $e)
			{
	             echo 'Erro:' .$e;
			}
		}

		return self::$instancia;
	}
}

?>