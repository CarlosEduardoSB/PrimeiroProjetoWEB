<?php

Class Consulta
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
	public function registrar($tipo, $dataConsulta, $horario, $nomePaciente, $nomeDoutor, $endereco, $valorConsulta)
	{
		global $pdo;
		$consultaSQL = $pdo->prepare("SELECT idConsulta FROM consulta WHERE dataConsulta = :d AND nomeDoutor = :nd AND horario = :h");
		$consultaSQL->bindValue(":d", $dataConsulta);
		$consultaSQL->bindValue(":nd", $nomeDoutor);
		$consultaSQL->bindValue(":h", $horario);
		$consultaSQL->execute(); 
		if ($consultaSQL->rowCount() > 0)
		{
			return false;
		} 
		else
		{
			$consultaSQL = $pdo->prepare("INSERT INTO consulta (tipo, dataConsulta, horario, nomePaciente, nomeDoutor, endereco, valorConsulta) VALUES (:t, :d, :h, :np, :nd, :e, :v)");
			$consultaSQL->bindValue(":t", $tipo);
			$consultaSQL->bindValue(":d", $dataConsulta);
			$consultaSQL->bindValue(":h", $horario);
			$consultaSQL->bindValue(":np", $nomePaciente);
			$consultaSQL->bindValue(":nd", $nomeDoutor);
			$consultaSQL->bindValue(":e", $endereco);
			$consultaSQL->bindValue(":v", $valorConsulta);
			$consultaSQL->execute();
			return true;

		}
}


}

?>