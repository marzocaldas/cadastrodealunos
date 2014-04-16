<?php


if (!isset($_SESSION)) session_start();

$nivel_necessario = 1;


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
<p>Segue abaixo os links para download dos materiais disponíveis para você:</p>
<br/>
<a href="https://drive.google.com/uc?export=download&confirm=Gi0j&id=0B6AlAoNcQOW_UmloR1lFRmk0OTQ">The Simpsons S02E01</a>
<br/>
<a href="https://docs.google.com/uc?export=download&confirm=qY9K&id=0B6AlAoNcQOW_UWRQcFhNS2lOeE0">Earthquakes</a>



<html/>
