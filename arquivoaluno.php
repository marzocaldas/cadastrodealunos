<?php


if (!isset($_SESSION)) session_start();

$nivel_necessario = 2;


if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] < $nivel_necessario)) {

	session_destroy();

	header("Location: index.php"); exit;
}

?>
<html>
<a href="logout.php">logout</a>
<h1>Página restrita</h1>
<p>Olá, <?php echo $_SESSION['UsuarioNome']; ?>!</p>
<br/>
<p>Essa página deve ser onde o admin habilita links para downloads para os alunos individualmente:</p>




<html/>
