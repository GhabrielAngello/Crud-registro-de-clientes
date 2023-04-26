<?php
// Conexão com o banco de dados
require_once 'db_connect.php';

session_start();

//CLEAR
function clear($input){
	global $connect;
	//sql
	$var = mysqli_escape_string($connect, $input);
	//xss
	$var = htmlspecialchars($var);
	return $var; 
}

if(isset($_POST['btn-atualizar'])):
	$nome = clear($_POST['nome']);
	$sobrenome = clear($_POST['sobrenome']);
	$email = clear($_POST['email']);
	$idade = clear($_POST['idade']);
	$id = mysqli_escape_string($connect, $_POST['id']);

	$sql = "UPDATE clientes SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', idade = '$idade' WHERE id = '$id'";

	if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		header('Location: ../index.php');
	else:
		$_SESSION['mensagem'] = "Erro ao atualizar!";
		header('Location: ../index.php');
	endif;		
endif;