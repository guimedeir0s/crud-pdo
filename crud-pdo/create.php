<?php
if ($_POST) {
 
	$dsn = 'mysql:host=localhost;dbname=test;charset=utf8;port:3306';
	$db_user = 'root';
	$db_pass = '';
	//Conectando com o banco de Dados com o try/catch:
	//O try tenta rodas um codigo e caso der algum erro, roda o catch.

	try 
	{
		//Aqui dentro realizamos tudo que precisamos fazer no banco de dados.
		$db = new PDO($dsn, $db_user, $db_pass);
		$query = $db->prepare('INSERT INTO ator(primeiro_nome, ultimo_nome) VALUES(:primeiro_nome, :ultimo_nome)');

		$query->execute([
				':primeiro_nome'=>$_POST['primeiro_nome'],
				':ultimo_nome'=>$_POST['ultimo_nome']
			]);

		
	}
	catch (PDOException $Exception) 
	{
		//Aqui declaramos o que fazer em caso de erro, nesse caso, exibe a mensagem de erro
		echo $Exception->getMessage();
	}
 } 
 ?>

 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <form action="create.php" method="post" accept-charset="utf-8">
 	<input name="primeiro_nome" placeholder="NOME">
 	<input name="ultimo_nome" placeholder="SOBRENOME">

 	<input type="submit" value="Enviar">
 </form>
 </body>
 </html>