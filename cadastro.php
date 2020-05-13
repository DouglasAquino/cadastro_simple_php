<?php 
 
$login = $_POST['login'];
$senha = MD5($_POST['senha']);
$connect = mysqli_connect('localhost','root','');
$db = mysqli_select_db($connect,'db');
$query_select = "SELECT username FROM usuarios WHERE username = '$login'";
$select = mysqli_query($connect,$query_select);
$array = mysqli_fetch_array($select);
$logarray = $array['username'];
 
  if($login == "" || $login == null){
    echo"<script language='javascript' type='text/javascript'>
    alert('O campo login deve ser preenchido');window.location.href='
    cadastro.html';</script>";
 
    }else{
      if($logarray == $login){
 
        echo"<script language='javascript' type='text/javascript'>
          alert('Usuário já cadastrado!');window.location.
          href='login.html'</script>";
        die();
 
      }else{
        $query = "CALL insereUsuario(?,?);";
		$stmt = $connect->prepare($query);
		$stmt->bind_param('ss',$login,$senha);
		$stmt->execute();
        if($stmt){
          echo"<script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');window.location.
          href='login.html'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse usuário');window.location
          .href='cadastro.html'</script>";
        }
		$stmt->close();
      }
    }
?>
