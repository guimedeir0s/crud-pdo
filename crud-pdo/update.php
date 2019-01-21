<?php

$id = isset($_GET['id'])?$_GET['id']:false;
$dsn = 'mysql:host=localhost;dbname=test;charset=utf8;port:3306';
$db_user = 'root';
$db_pass = '';

try 
	{
		//Aqui dentro realizamos tudo que precisamos fazer no banco de dados.
		$db = new PDO($dsn, $db_user, $db_pass);
		$query = $db->prepare('SELECT * FROM ator WHERE ator_id = :id');
		$query->execute([':id'=>$id]);
		$ator = $query->fetch(PDO::FETCH_ASSOC);
	}
	catch (PDOException $Exception) 
	{
		//Aqui declaramos o que fazer em caso de erro, nesse caso, exibe a mensagem de erro
		echo $Exception->getMessage();
		die();
	}

if ($_POST) {
	try 
	{
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
 	<input type="hidden" name="id" value="<?php echo $ator['ator_id'] ?>">
 	<input name="primeiro_nome" value="<?php echo $ator['primeiro_nome'] ?>">
 	<input name="ultimo_nome" value="<?php echo $ator['ultimo_nome'] ?>">

 	<input type="submit" value="Enviar">
 </form>
 </body>
 </html>