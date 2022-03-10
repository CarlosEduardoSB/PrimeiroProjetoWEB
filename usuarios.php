<?php

Class Usuario
{
	private $pdo;
	public $mensagemErro = "";

	public function conectar_BD($nome, $host, $usuario, $senha)
	{
		global $pdo;
		try
		{
			$pdo = new PDO("mysql:dbname=".$nome.";host=".$host, $usuario, $senha);
		} catch (PDOException $e) {
			 $mensagemErro=$e->getMessage();
		}

	}
	public function cadastrar($nome, $telefone, $email, $senha)
	{
		global $pdo;
		$consultaSQL = $pdo->prepare("SELECT idUser FROM usuario WHERE email = :e");
		$consultaSQL->bindValue(":e", $email);
		$consultaSQL->execute(); 
		if ($consultaSQL->rowCount() > 0)
		{
			return false;
		} 
		else
		{
			$consultaSQL = $pdo->prepare("INSERT INTO usuario (nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");
			$consultaSQL->bindValue(":n", $nome);
			$consultaSQL->bindValue(":t", $telefone);
			$consultaSQL->bindValue(":e", $email);
			$consultaSQL->bindValue(":s", md5($senha));
			$consultaSQL->execute();
			return true;

		}

	}
	public function logar($email, $senha)
	{
		global $pdo;
		$consultaSQL = $pdo->prepare("SELECT idUser FROM usuario WHERE email = :e AND senha = :s");
		$consultaSQL->bindValue(":e", $email);
		$consultaSQL->bindValue(":s",md5($senha));
		$consultaSQL->execute();
		if ($consultaSQL->rowCount() > 0)
		{
			$dado = $consultaSQL->fetch();
			session_start();
			$_SESSION['idUser'] = $dado['idUser'];
			return true;

		}
		else 
		{
			return false;
		}




	}

}

?>