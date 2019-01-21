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
		$id = isset($_GET['id'])?$_GET['id']:false;
		if ($id) {
			$query = $db->prepare('DELETE FROM ator WHERE ator_id = :id');
			$query->bindValue(':id', $id, PDO::PARAM_INT);
			$query->execute();

		}
		header('Location:indexale.php');
	} catch (PDOException $Exception) {
		//Aqui declaramos o que fazer em caso de erro, nesse caso, exibe a mensagem de erro
		echo $Exception->getMessage();
	}
 ?>