<?php
require_once 'ProjetoTelaLogin/CLASSES/usuarios.php';
$u = new Usuario;
?>
<html>
<head>
	<title>Tela de Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="ProjetoTelaLogin/CSS/estilo2.css">
	<div id="image"><img src="ProjetoTelaLogin/IMAGES/logoSistema2.jpg"></div>
</head>
<body>
 <div id="form-body1">
	<h1><strong>Login</strong></h1>
	<form method="POST">
		<input type="email" placeholder="email" name="email">
		<input type="password" placeholder="senha" name="senha">
		<input type="submit" value="Entrar">
		<a href="ProjetoTelaLogin/cadastro.php"> Não é inscrito? <strong>Cadastre-se!</strong></a>
	</form>
 </div>
<?php
if (isset($_POST['email']))
{
	
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);
	
	if (!empty($email) && !empty($senha))
	{
		$u->conectar_BD("db_projetologin","localhost","root","");
		if ($u->mensagemErro == "")
		{
			if ($u->logar($email, $senha))
			{
				header("location: home.php");			
			}
			else 
			{
				
				echo "Email ou Senha incorretos!";
				
			}
			
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

?>
</body>
</html>