<?php
  $login_cookie = $_COOKIE['login'];
  $connect = mysqli_connect('localhost','root','');
  $db = mysqli_select_db($connect,'db');
    if(isset($login_cookie)){
	  echo"<center>";
      echo"Bem-Vindo, $login_cookie <br>";
      echo"Essas informações <font color='red'>PODEM</font> ser acessadas por você";
	  echo"<br><a href='login.html'>Fazer logout</a>";
	  echo"<br><a href='usuarioscadastrados.php'>Usuarios Cadastrados</a>";
	  //#select * from usuarioCadastrado
	  //call contLogin
	  //select usuariosAtivos()
	  //SELECT * FROM quantidadecadastrados
	  $query = "select usuariosAtivos()";
	  $qtd = mysqli_query($connect,$query);
	  $total = mysqli_num_rows($qtd);
	  $mostra = mysqli_fetch_assoc($qtd);
	  echo "<h4 align=Rigth>Usuários Ativos: ".$mostra['usuariosAtivos()']."</h4>";
    }else{
      echo"Bem-Vindo, convidado <br>";
      echo"Essas informações <font color='red'>NÃO PODEM</font> ser acessadas por você";
      echo"<br><a href='login.html'>Faça Login</a> Para ler o conteúdo";
    }
?>