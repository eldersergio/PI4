<?php
session_start();
if (!isset($_SESSION["usuarioatual"])) {
  header("Location: login.html");
  die();
}

require_once '../banco_de_dados/bancocliente.php';
require_once '../classes/cliente.php';
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
  $bc = new BancoCliente();
  $id = $_GET["id"];
  $linha = $bc->buscarcliente($id);

  $id = $linha["id"];
  $nome = $linha["nome"];
  $telefone = $linha["telefone"];
  $cpf = $linha["cpf"];
  $email = $linha["email"];
  $endereco = $linha["endereco"];
  

  echo " 
     <p class='versoli'>Nome: $nome<br><br>
     Telefone: $telefone<br><br>
     Cpf: $cpf<br><br>
     Email: $email<br><br>
     Endereço: $endereco</p>

     <div id='btn'>
      <a href='editarcliente.php?id=$id'>Editar Cliente</a>
     </div>";
?>
 </body>
</html>
