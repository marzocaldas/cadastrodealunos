<br>
<?php

$date = substr($date, 6, 4) . '-' . substr($date, 3, 2) . '-' . substr($date, 0, 2);
$sql="INSERT INTO aluno (nomealuno, dcendereco, celular, dtinicio, motivo, txcomentario, dtcadastro) VALUES (\"$nome\", \"$endereco\", \"$celular\", \"$date\", \"$motivo\", \"$comentario\", NOW())";
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

