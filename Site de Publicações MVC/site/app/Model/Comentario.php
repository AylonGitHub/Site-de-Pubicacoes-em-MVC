<?php

 require_once 'Conexao.php';

  class Comentario
  {
  	public static function selecionarComentarios($idPost)
  	{
  		$con = Conexao::getConexao();
  		$sql = "SELECT *  FROM comentario WHERE id_postagem = :id";
  		$sql = $con->prepare($sql);
  		$sql->bindvalue(':id', $idPost, PDO::PARAM_INT);
  		$sql->execute();

  		$resultado = array();

  		while($row = $sql->fetchObject('Comentario')){
            $resultado[] = $row;
  		}

  		return $resultado;
  	}

  	public static function inserir ($reqPost)
  	{

  		 $con = Conexao::getConexao();
  		$sql = "INSERT INTO comentario (nome, mensagem, id_postagem) VALUES (:nom, :msg, :idp)";
  		$sql = $con->prepare($sql);
  		$sql->bindvalue(':nom', $reqPost['nome']);
  		$sql->bindvalue(':msg', $reqPost['msg']);
  		$sql->bindvalue(':idp', $reqPost['id']);
  		$sql->execute();

  		if ($sql-> rowCount()){
  			return true;
  		}

  		throw new Exception("Falha na inserção");
  		

  	}
  }