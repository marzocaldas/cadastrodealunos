<?php


if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
	header("Location: login.php"); exit;
}


mysql_connect('localhost', 'root', '') or trigger_error(mysql_error());

mysql_select_db('cadastro_alunos') or trigger_error(mysql_error());

$usuario = mysql_real_escape_string($_POST['usuario']);
$senha = mysql_real_escape_string($_POST['senha']);


$sql = "SELECT `id`, `nome`, `nivel` FROM `usuarios` WHERE (`usuario` = '". $usuario ."') AND (`senha` = '". sha1($senha) ."') AND (`ativo` = 1) LIMIT 1";
$query = mysql_query($sql);
if (mysql_num_rows($query) != 1) {

	echo "Login inválido!"; exit;
} else {

	$resultado = mysql_fetch_assoc($query);

	if (!isset($_SESSION)) session_start();

	$_SESSION['UsuarioID'] = $resultado['id'];
	$_SESSION['UsuarioNome'] = $resultado['nome'];
	$_SESSION['UsuarioNivel'] = $resultado['nivel'];
	
	if ($_SESSION['UsuarioNivel'] == 2) {
	header("Location: arquivoaluno.php"); exit;
	}
	else{
		header("Location: restrito.php"); exit;
	}
}

?>
