<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Hello!</title>
</head>

<body>

<form action="validacao.php" method="post">
<fieldset>
<legend>Dados de Login</legend>
	<label for="txUsuario">Usuário</label>
	<input type="text" name="usuario" id="txUsuario" maxlength="25" />
	<label for="txSenha">Senha</label>
	<input type="password" name="senha" id="txSenha" />

	<input type="submit" value="Entrar" />
</fieldset>
</form>

</body>

</html>
