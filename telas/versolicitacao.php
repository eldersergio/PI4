<?php
session_start();
if (!isset($_SESSION["usuarioatual"])) {
  header("Location: login.html");
  die();
}

require_once '../banco_de_dados/bancosolicitacao.php';
require_once '../classes/solicitacao.php';
?>
<html>
 <head>
 <meta charset='UTF-8'>
 <title>Nome da empresa</title>
 <link rel='stylesheet' href='../css/os.css' />
 </head>
 <body>
  <a class='sair' href=login.html>Sair</a><br><br> 
<?php
  $bd = new Bancosoli();
  $id = $_GET["id"];
  $linha = $bd->buscar1($id);

  $id = $linha["id"];
  $nome = $linha["nome"];
  $telefone = $linha["telefone"];
  $endereco = $linha["endereco"];
  $email = $linha["email"];
  $descri = $linha["descri"];
  

  echo " 
     <p class='versoli'>Nome: $nome<br><br>
     Telefone: $telefone<br><br>
     Endereço: $endereco<br><br>
     Email: $email<br><br>
     Descriçao: $descri</p>

     <div id='btn'>
      <a href='cadastrarcliente.php?id=$id'>Cadastrar solicitante</a>
     </div>";
?>
 </body>
</html>
