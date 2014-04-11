<?php
$con=mysqli_connect("localhost","root","","cadastro_alunos");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="INSERT INTO atividade (nomeatividade) VALUES ('${_GET['atividade']}')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }

$json = json_encode(array('id'=>mysqli_insert_id($con),'atividade'=>$_GET['atividade']));
echo $json;

mysqli_close($con);
?>
