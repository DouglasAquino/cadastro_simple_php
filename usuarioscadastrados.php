<?php
  $connect = mysqli_connect('localhost','root','');
  $db = mysqli_select_db($connect,'db');
  $query = "select * from usuariocadastrado;";
  $view = mysqli_query($connect,$query);
  $total = mysqli_num_rows($view);
  echo "<h3><center>USUARIO CADASTRADOS</h3>";
  echo "<table border=1 align='center'>";
  while($exibe = mysqli_fetch_assoc($view)){
	  echo "<tr><td>".$exibe['username']."</td></tr>";
  }
  echo "</center></table>"; 
  echo "<a href=index.php>VOLTAR</a>";
?>