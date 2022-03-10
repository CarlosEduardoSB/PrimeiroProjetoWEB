<?php
	session_start();
	if(!isset($_SESSION['idUser']))
	{
		header("location: index.php");
		exit;
	}
?>
<html>
<head>
	<title>Pagina Inicial</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="ProjetoTelaLogin/CSS/estilo2.css">
	<div id="image"><img src="ProjetoTelaLogin/IMAGES/logoSistema2.jpg"></div> 
	<br>
	<a href="">Home</a>
	/
	<a href="marcarConsulta.php"> Marcar Consultas</a>
	/
	<a href="visualizarConsulta.php"> Visualizar Consultas</a>
</head>
<body>
<div id="introducao">
<h1>Sistema de Gestão de Consultas HealthTech</h1>
<p>- Seja bem-vindo a página inicial do nosso sistema, aqui você pode encontrar algumas informações pertinentes sobre o software, como versões, propósitos, desenvolvedores, dentre outros. Se deseja ir direto para os recursos de gestão de consultas, navegue por meio do menu acima para acessar.</p>
<br>  
<h2>Sobre o HealthTech:</h2>
<p>- O HealthTech chega inicialmente com um propósito de auxliar a gestão de consultas na área da saúde. Aqui o usuário, seja ele um funcionário administrativo de uma clínica ou um paciente, será capaz de realizar a marcação de consultas, cadastro de pacientes e médicos, visualização de informações de consultas marcadas, como local, data e horário, dentre outros recursos.</p>
<h2>Versão e Informações Técnicas:</h2>
<p>- O HealthTech ainda está em sua primeira versão (1.0 Beta) de protótipo, portanto, ainda faltam recursos, layouts, estilos e possui alguns erros que estão sendo solucionados. O Software foi desenvolvido por meio do Sublime Text 3, com <strong>HTML</strong>, <strong>CSS</strong> e <strong>PHP</strong>. Para completar o desenvolvimento do software, foi utilizado o conjunto de ferramentas <strong>XAMPP</strong>, muito conhecido no desenvolvimento WEB, ele usa o Servidor <strong>APACHE</strong> para hospedar o sistema e suas telas, e o Banco de Dados <strong>MariaDB</strong> para armazenar os dados do sistema.</p>
<h2>Sobre Mim:</h2>
<p>- Eu, Carlos Eduardo Serpa Brito, sou aluno da Faculdade UniFametro em Fortaleza, cursando o Quarto Semestre de Análise e Desenvolvimento de Sistemas. O HealthTech foi uma ideia minha para a atividade de sistema solicitado na cadeira de desenolvimendo web do nosso curso, o software está sendo inteiramente desenvolvido e implementado por mim.</p>
<h3>Mapa do Site (Atualmente):</h3>
	<ol>
		<li>Logar-se ou Cadastrar Nova Conta</li>
		<li>Página Inicial</li>
 		<li>Marcar Consulta</li>
 		<li>Visualizar Consulta</li> 	
	</ol>
</div>


</body>
</html>