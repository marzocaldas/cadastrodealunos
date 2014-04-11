<?php
	$con = mysqli_connect("localhost","root","");
	mysqli_select_db($con, "cadastro_alunos");
	
	if (mysqli_connect_errno())
   {
  		die("Failed to connect to MySQL: " . mysqli_connect_error());
   }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Validação formulário</title>

</head>



<body>



<DIV align="left">

<?php



//print_r( $_POST ); die();

 $nome = $_POST['txt_nome'];

 $endereco = $_POST["txt_endereco"];

 $celular = $_POST["txt_celular"];
 
 $date = $_POST["txt_inicio"];
  
 $motivo = $_POST["txa_motivo"];
 
 $comentario = $_POST["txa_comentario"];
 
 $erro = false;

 $importa = false;

 

 

   

    if(empty($_POST['txt_nome']) OR strstr ($_POST['txt_nome'], ' ')==false)

	{echo "Favor digitar seu nome completo.<br><br>"; $erro=true;}

	else {echo "Nome: ", $_POST['txt_nome'], "<br><br>";}



    if(empty($endereco) OR strstr ($endereco, ' ')==false)

	{echo "Favor digitar seu endereço completo.<br><br>"; $erro=true;}

	else {echo "Endereço: ", $endereco, "<br><br>";}

		
//inicio valida data

function isValidDate($date){

      if (preg_match('/^(\d{2})\/(\d{2})\/(\d{4})/', $date, $matches) > 0) {

              if(checkdate($matches[2], $matches[1], $matches[3])){

                      return true;
		}

	}
}

if(isValidDate($date)){



	echo "Data de início: ", $date, " ", "<br><br>";

} 

else

{

	echo "Data Inválida. Digite: DD/MM/AAAA";

}

//fim valida data

	if (! isset($_POST["chk_atividades"]) || (count($_POST["chk_atividades"]) < 1)) {

		echo "Favor selecionar suas atividades!<br><br>";

		$erro=true;

	} else {
		$atividades = $_POST["chk_atividades"];
		echo "Suas atividades de praferência são:<br/><ul>";
	
		if ($query = mysqli_query($con, 'SELECT * FROM atividade WHERE idatividade IN (' . implode(',', $atividades) . ')')) {
			while($row = mysqli_fetch_assoc($query)) {
				echo "<li><b>${row['nomeatividade']}</b></li>\n";
				$nomes[$row['idatividade']] = $row['nomeatividade'];
			}
			mysqli_free_result($query);
		}
		
		echo '</ul>';

	}

	if(strlen($comentario) < 1)

{echo "Favor digitar um comentário suas experiências com Inglês!<br><br>"; $erro=true;}

	else 

		{echo "Comentário sobre suas experiências com Inglês:<br>", nl2br($comentario), "<br><br>";}

?>

</DIV>

</body>

</html>
<?php
	include_once('inserealuno.php');

	mysqli_close($con);
?>

