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
 
 $inicio = $_POST["txt_inicio"];
 
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

	



	if (isset($_POST["rdo_sexo"])) {

	?>

	<?php echo ($_POST['rdo_sexo'] == 'M' ? 'Sexo: Masculino' : 'Sexo: Feminino'); ?><br/><br/>

	<?php

	} else {

		echo "Por favor informar o Sexo.<br><br>\n";

	}



		$estadoCivil = $aEstadoCivil[ $civil ];

		echo "Estado Civil: ", $estadoCivil, "<br><br>";

		

//inicio valida data

function isValidDate($date){

      if (preg_match('/^(\d{2})\/(\d{2})\/(\d{4})/', $date, $matches) > 0) {

              if(checkdate($matches[2], $matches[1], $matches[3])){

                      return true;

		}

	}
}


if(isValidDate($date)){



	echo "Idade: ", $idade, " ", "<br><br>";

} 

else

{

	echo "Data Inválida. Digite: DD/MM/AAAA";

}

//fim valida data

	

	

	if (! isset($_POST["chk_hobbies"]) || (count($_POST["chk_hobbies"]) < 1)) {

		echo "Favor selecionar seus hobbies!<br><br>";

		$erro=true;

	} else {
		$hobbies = $_POST["chk_hobbies"];
		echo "Seus hobbies são:<br/><ul>";
	
		if ($query = mysqli_query($con, 'SELECT * FROM hoobies WHERE idhoobies IN (' . implode(',', $hobbies) . ')')) {
			while($row = mysqli_fetch_assoc($query)) {
				echo "<li><b>${row['nmhoobies']}</b></li>\n";
				$nomes[$row['idhoobies']] = $row['nmhoobies'];
			}
			mysqli_free_result($query);
		}
		
		echo '</ul>';

	}



	if(strlen($comentario) < 1)

{echo "Favor digitar um comentário sobre você!<br><br>"; $erro=true;}

	else 

		{echo "Comentário sobre você:<br>", nl2br($comentario), "<br><br>";}

	

	

	

?>

</DIV>

</body>

</html>
<?php
	include_once('inserecliente.php');
	include_once('geraxml.php');

	mysqli_close($con);
?>

