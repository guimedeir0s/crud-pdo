<?php 
	$dsn = 'mysql:host=localhost;dbname=test;charset=utf8;port:3306';
	$db_user = 'root';
	$db_pass = '';
	//Conectando com o banco de Dados com o try/catch:
	//O try tenta rodas um codigo e caso der algum erro, roda o catch.

	try {
		//Aqui dentro realizamos tudo que precisamos fazer no banco de dados.
		$db = new PDO($dsn, $db_user, $db_pass);
		//Preparando a quary

		$query = $db->prepare('SELECT ator_id, primeiro_nome, ultimo_nome, ultima_atualizacao
			FROM ator
			');

		//Executa a query com o valor
		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_ASSOC);
		
		foreach ($results as $key => $value) {
			echo 'ID: '.$value['ator_id']; 
			echo "</br>";
			echo 'Primeiro Nome: '.$value['primeiro_nome']; 
			echo "</br>";
			echo 'Ultimo Nome: '.$value['ultimo_nome'];
			echo "</br>";
			echo 'Ultima Atualizacao: '.$value['ultima_atualizacao']; 
			echo "</br>";
			echo "<hr>";
		}

	} catch (PDOException $Exception) {
		//Aqui declaramos o que fazer em caso de erro, nesse caso, exibe a mensagem de erro
		echo $Exception->getMessage();
	}
 ?>

 <html>
 <head>
 	<title></title>
 </head>
 <body>

 </body>
 </html>