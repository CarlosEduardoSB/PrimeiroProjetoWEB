<?php
	require_once 'ProjetoTelaLogin/CLASSES/consultas.php';
	$u = new Consulta;
?>
<html>
<head>
	<title>Marcar Consulta</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="ProjetoTelaLogin/CSS/estilo2.css">
	<div id="image"><img src="ProjetoTelaLogin/IMAGES/logoSistema2.jpg"></div> 
	<a href="home.php"> Home</a>
	/
	<a href=""> Marcar Consultas</a>
	/
	<a href="visualizarConsulta.php"> Visualizar Consultas</a>
</head>
<body>
<div id="introducao">
<h1>Seção de Marcação de Consultas</h1>
<p>- Olá, seja bem-vindo á área de marcação de consultas do sistema, preencha o <strong>Formulário</strong> abaixo e após isso clique em <strong>Marcar</strong> para registrar uma consulta no sistema, após isso, a consulta poderá ser visualizada na seção de <strong>Visualizar Consultas</strong></p>
</div>

<div id="form-body1">
	<h1><strong>Marcar Consultas</strong></h1>
	<form method="POST">
		<input type="text" name="tipo" placeholder="Tipo da Consulta" maxlength="50">
		<input type="text" name="dataConsulta"  placeholder="dd/mm/aa">
		<input type="text" name="horario"  placeholder="horário" maxlength="10">
		<input type="text" name="nomeDoutor"  placeholder="Nome do Doutor" maxlength="30" >
		<input type="text" name="nomePaciente"  placeholder="Nome do Paciente" maxlength="30">
		<input type="text" name="endereco"  placeholder="Endereço do Local" maxlength="30">
		<input type="text" name="valorConsulta"  placeholder="Valor em R$ da Consulta" maxlength="30">
		<input type="submit" value="registrar">		
	</form>
 </div>
 <?php
 if (isset($_POST['tipo']))
{
	$tipo = addslashes($_POST['tipo']);
	$dataConsulta = addslashes($_POST['dataConsulta']);
	$horario = addslashes($_POST['horario']);
	$nomeDoutor = addslashes($_POST['nomeDoutor']);
	$nomePaciente = addslashes($_POST['nomePaciente']);
	$endereco = addslashes($_POST['endereco']);
	$valorConsulta = addslashes($_POST['valorConsulta']);
	if (!empty($tipo) && !empty($dataConsulta) && !empty($horario) && !empty($nomeDoutor) && !empty($nomePaciente) && !empty($endereco) && !empty($valorConsulta))
	{
		$u->conectar_BD("db_projetologin","localhost","root","");
		if ($u->$mensagemErro == "")
		{
			if ($u->registrar($tipo, $dataConsulta, $horario, $nomeDoutor, $nomePaciente, $endereco, $valorConsulta))
			{
				
				
				echo "Consulta registrada no sistema com sucesso!";
			
		}
		else
		{
			echo "Erro: ".$u->mensagemErro;
		}

	}
	else
	{
		echo "Preencha todos os campos!";
	}
}

}


 ?>
 <br>
 <br>

</body>
</html>