<?php
session_start();
if (!isset($_SESSION["usuarioatual"])) {
  header("Location: login.html");
  die();
}
?>
<?php

require_once '../classes/solicitacao.php';

?>

<html land="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Login do administrador</title>
	<link rel="stylesheet" href="../css/os.css" />
</head>
<body>
  <a class="sair" href=login.html>Sair</a>
	<div id= "loginadm">
      <h2>Login do administrador</h2>

	</div>
  <div align="center">
        <nav role="navigation">
          <ul>
            <li><a href="telafuncionario.php">Funcionario</a></li>
            <li><a href="telacliente.php">Cliente</a></li>
            <li><a href="itens.php">Itens</a></li>
            <li><a href="os.php">Os</a></li>
            <li><a href="log.php">Login</a></li>
          </ul>
        </nav>
      </div>  
  <?php  
    
     $Bdsoli =  new Bancosoli();
    $Solis = new Soli();
     
  ?>
  <div align="center">

    <h2>Solicitações</h2>

	<table border=5 id="tableadm">
      
      <thead>
        <tr>
        	<th>#</th>
        	<th>Nome:</th>
        	<th>Telefone:</th>
        	<th>Endereço:</th>
        	<th>Email:</th>
        	<th>Descrição:</th>
          <th>Ações:</th>
        </tr>
      </thead>

    <?php
       $dados = $Bdsoli->buscartabela();
       foreach ($dados as $linha) {
         $id = $linha["id"];
         $nome = $linha["nome"];
         $telefone = $linha["telefone"];
         $endereco = $linha["endereco"];
         $email = $linha["email"];
         $descri = $linha["descri"];


         echo "        <tr>
            <td>$id</td>
            <td>$nome</td>
            <td>$telefone</td>
            <td>$endereco</td>
            <td>$email</td>
            <td>$descri</td>
            <td>
              <a href='../classes/apagar.php?id=$id' onclick='return confirm(\"Deseja realmente deletar?\")'>Apagar</a>
              <a href='../telas/versolicitacao.php?id=$id' onclick='return confirm(\"Deseja realmente visualizar?\")'>Visualizar</a>
            </td>
        </tr>";
       }
    ?>
	</table>
</div>

</body>
</html>