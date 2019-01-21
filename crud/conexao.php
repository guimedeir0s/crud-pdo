<?php 
	$dsn = 'mysql:host=localhost;dbname=aulapdo;charset=utf8;port:3306';
	$db_user = 'root';
	$db_pass = '';

	try 
	{
		//Aqui dentro realizamos tudo que precisamos fazer no banco de dados.
		$db = new PDO($dsn, $db_user, $db_pass);
	}
	catch (PDOException $Exception) 
	{
		//Aqui declaramos o que fazer em caso de erro, nesse caso, exibe a mensagem de erro
		echo $Exception->getMessage();
	}
 ?>