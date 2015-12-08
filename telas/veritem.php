<?php
session_start();
if (!isset($_SESSION["usuarioatual"])) {
  header("Location: login.html");
  die();
}

require_once '../banco_de_dados/bancoitens.php';
require_once '../classes/itens.php';
?>
<html>
 <head>
 <meta charset='UTF-8'>
 <title>Visualização do item</title>
 <link rel='stylesheet' href='../css/os.css' />
 </head>
 <body>
  <a class='sair' href=login.html>Sair</a><br><br> 
<?php
  $bi = new BancoItens();
  $id = $_GET["id"];
  $linha = $bi->buscaritens($id);

  $id = $linha["id"];
  $nome = $linha["nome"];
  $valor = $linha["valor"];
  $descricao = $linha["descricao"];
  $qtd = $linha["qtd"];
  

  echo " 
     <p class='versoli'>Nome: $nome<br><br>
     Valor: $valor<br><br>
     Descrição: $descricao<br><br>
     Quantidade: $qtd</p>

     <div id='btn'>
      <a href='editaritem.php?id=$id'>Editar Funcionario</a>
     </div>";
?>
 </body>
</html>
