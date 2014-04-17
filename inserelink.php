<?php
$con=mysqli_connect("localhost","root","","cadastro_alunos");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="INSERT INTO link(link) VALUES ('https://www.dropbox.com/sh/jk0cbfmnjdz042u/g-CumQYDuy/Learn%20Real%20English%20Conversations/01.%20earthquakes/Earthquakes%20Conversation.mp3')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }

mysqli_close($con);

echo "link adicionado com sucesso! ";

?>
