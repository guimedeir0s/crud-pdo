<?php 
	include 'conexao.php';

	// Recebendo os POST's e armazenando em variáveis
	$nome = $_POST['nome'];
	$email = $_POST['email'];

	// Criando a query para efetuar o INSERT INTO 
	$inserir = $db->prepare('INSERT INTO user (nome, email) VALUES (:nome, :email)');

	// Definindo parâmetros para passar para o Banco
	$inserir->bindParam(':nome', $nome, PDO::PARAM_STR);
	$inserir->bindParam(':email', $email, PDO::PARAM_STR);
	
	// Instanciando execute() para inserir os registros
	$inserir->execute();

	// if ($inserir) {
	// 	echo "Dados enviados com sucesso";
	// }

	include 'formulario.html'
	// header('location: formulario.html');
	// exit;

 ?>