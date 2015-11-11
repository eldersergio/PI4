<?php
$conexao = mysqli_connect("localhost", "root", "", "bancoos");
$login=$_POST['login'];
$senha=$_POST['senha'];
$sql = "select login, senha from login where login = '$login' and senha = '$senha'";
$consulta = mysqli_query($conexao, $sql);
$cont = 0;
while ($linha = mysqli_fetch_array($consulta))
{
 $login1 = $linha["login"];
 $senha1 = $linha["senha"];
 $cont ++;
}
if($login == "adm" && $senha =="123")
{
  session_start();
  $_SESSION["usuarioatual"] = $login;
   echo "<script type='text/javascript' language='javascript'> 
  alert ('Seja bem vindo administrador');
  window.location.href='../telas/adm.php';
  </script>";
  die();
}
if($cont > 0)
{
  session_start();
  $_SESSION['login']=$_POST['nome'];
  $_SESSION['senha']=$_POST['senha'];
  echo "<script type='text/javascript' language='javascript'> 
  alert ('Você esta logado'); 
  window.location.href='home.html';
  </script>";
}
else
{
  echo "<script type='text/javascript' language='javascript'> 
  alert ('Nome ou senha invalidas');
  window.location.href='login.html';
  </script>"; 
}
?>