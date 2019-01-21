
<?php 
	$dsn = 'mysql:host=localhost;dbname=test;charset=utf8;port:3306';
	$db_user = 'root';
	$db_pass = '';
	//Conectando com o banco de Dados com o try/catch:
	//O try tenta rodas um codigo e caso der algum erro, roda o catch.

	try 
	{
		//Aqui dentro realizamos tudo que precisamos fazer no banco de dados.
		$db = new PDO($dsn, $db_user, $db_pass);
		$query = $db->query('SELECT * FROM ator');
		$atores = $query->fetchALL(PDO::FETCH_ASSOC);
	}
	catch (PDOException $Exception) 
	{
		//Aqui declaramos o que fazer em caso de erro, nesse caso, exibe a mensagem de erro
		echo $Exception->getMessage();
	}
 ?>

 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<a href="create.php">NOVO ATOR</a>
 <table>
 	<caption>TABELA ATOR CRUD</caption>
 	<thead>
 		<tr>
 			<th>ID</th>
 			<th>Primeiro Nome</th>
 			<th>Sobre Nome</th>
 			<th>Ultima atualizacao</th>
 		</tr>
 	</thead>
 	<?php foreach ($atores as $key => $value) { ?>
 	<tbody>
 		<tr>
 			<td><?php echo $value['ator_id'] ?></td>
 			<td><?php echo $value['primeiro_nome'] ?></td>
 			<td><?php echo $value['ultimo_nome'] ?></td>
 			<td><?php echo $value['ultima_atualizacao'] ?></td>
 			<td>
 				<a href="update.php?id=<?php echo $value['ator_id'] ?>">Editar</a>
 				<a href="delete.php?id=<?php echo $value['ator_id'] ?>">Deletar</a>
 			</td>
 		</tr>
 	</tbody>
 	<?php } ?>
 </table>

 </body>
 </html>