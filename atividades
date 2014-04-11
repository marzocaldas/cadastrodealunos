<?php
$con=mysqli_connect("localhost","root","","cadastro_alunos");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$result=mysqli_query($con,"SELECT * FROM atividade");

$atividades = array();

while($row = mysqli_fetch_assoc( $result ) )
{
$atividades[] = $row;

}

$json = json_encode($atividades);
echo $json;

mysqli_close($con);
