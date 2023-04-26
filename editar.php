<?php include_once 'include/header.php'; ?>

<?php 
	include_once 'php_action/db_connect.php';
	//Select
	if($_GET['id']):
		$id = mysqli_escape_string($connect, $_GET['id']);

		$sql = "SELECT * FROM clientes WHERE id= '$id'";
		$resultado = mysqli_query($connect, $sql);
		$dados = mysqli_fetch_array($resultado);
	endif;
?>

<div class="row">
	<div class="col s12 m6 push-m3">
		<h3 class="light">Editar Cliente</h3>
		<form action="php_action/update.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
			<div class="input-field col s12">
				<input type="text" name="nome" id="nome" value="<?php echo $dados['nome']; ?>">
				<label for="nome">Nome</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="sobrenome" id="sobrenome" value="<?php echo $dados['sobrenome']; ?>" required>
				<label for="sobrenome">Sobrenome</label>
			</div>

			<div class="input-field col s12">
				<input type="email" name="email" id="email" value="<?php echo $dados['email']; ?>" required>
				<label for="email">Email</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="idade" id="idade" value="<?php echo $dados['idade']; ?>" required>
				<label for="idade">Idade</label>
			</div>

			<button type="submit" name="btn-atualizar" class="btn">Atualizar</button>
			<a href="index.php" class="btn green">Lista de clientes</a>
		</form>
	</div>
</div>

<?php include_once 'include/footer.php'; ?>