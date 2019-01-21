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

		$query = $db->prepare('SELECT titulo
			FROM filme
			WHERE titulo
			LIKE ?
			');

		//Executa a query com o valor
		$query->execute(['AC%']);
		$results = $query->fetchAll(PDO::FETCH_ASSOC);

		$html = '<ul>';
		
		foreach ($results as $key => $value) {
			$html .= '<li class="asd">'.$value['titulo'].'</li>';
		}
		$html .= '</ul>';

		//INICIO SELECT COM OPTIONS
		$queryV = $db->prepare('SELECT idioma_id, nome
			FROM idioma
			');

		$queryV->execute();
		$resultados = $queryV->fetchAll(PDO::FETCH_ASSOC);

		$select = '<select>';

		foreach ($resultados as $key => $value) {
			$select .='<option value="'.$value['idioma_id'].'">'.$value['nome'].'</option>';
		}

		$select .= '</select>';

		//var_dump($results);

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
 <?php 
 	echo "$html";
 	echo "</ br>";
  ?>

 <?php 
 	echo "$select";
  ?>
 </body>
 </html>