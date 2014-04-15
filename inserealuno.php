<br>
<?php

$date = substr($date, 6, 4) . '-' . substr($date, 3, 2) . '-' . substr($date, 0, 2);
$nome = mysqli_real_escape_string($con, $_POST['txt_nome']);
$usuario = mysqli_real_escape_string($con, $_POST['txt_email']);
$senha = mysqli_real_escape_string($con, $_POST['txt_senha']);
$email = mysqli_real_escape_string($con, $_POST['txt_email']);
$nivel = 1;
$sql="INSERT INTO aluno (nomealuno, dcendereco, celular, dtinicio, motivo, txcomentario, dtcadastro) VALUES (\"$nome\", \"$endereco\", \"$celular\", \"$date\", \"$motivo\", \"$comentario\", NOW())";
$sql="INSERT INTO usuarios (nome, usuario, senha, email, nivel) VALUES (\"$nome\", \"$usuario\", SHA1(\"$senha\"), \"$email\", $nivel)";
if (!mysqli_query($con, $sql))
{
	die('Erro inserindo aluno: ' . mysqli_error($con));
}
  
$alunoId = mysqli_insert_id($con);
$atividades = $_POST["chk_atividades"];

foreach ( $atividades as $atividade ) {
                       
	$sql="INSERT INTO atividade_aluno(idatividade, idaluno) VALUES($alunoId, $atividade)";
   if (!mysqli_query($con, $sql))
   {
   	die('Erro inserindo atividade: ' . mysqli_error($con));
   }
   
}

echo "Aluno adicionado com sucesso!";
?>

