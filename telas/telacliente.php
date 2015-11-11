<?php
session_start();
if (!isset($_SESSION["usuarioatual"])) {
  header("Location: login.html");
  die();
}
?>
<?php

require_once '../classes/cliente.php';

?>

<html land="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Pagina Cliente</title>
	<link rel="stylesheet" href="../css/os.css" />
</head>
<body>
  <a class="sair" href=login.html>Sair</a>
	<div id= "loginadm">
      <h2>Cliente</h2>

	</div>
  <div align="center">
        <nav role="navigation">
          <ul>
            <li><a class="fun" href="cadastrarcliente.php">Click aqui para cadastrar um cliente</a></li>
          </ul>
        </nav>
      </div>  
  <?php  
    
     $bc =  new BancoCliente();
    $cl = new Cliente();
     
  ?>
  <div align="center">

    <h2>Clientes cadastrados</h2>

	<table border=5 id="tablecliente">
      
      <thead>
        <tr>
        	<th>#</th>
        	<th>Nome:</th>
        	<th>Telefone:</th>
        	<th>Cpf:</th>
        	<th>Email:</th>
        	<th>Endereço:</th>
          <th>Ações:</th>
        </tr>
      </thead>

    <?php
       $dados = $bc->buscartabelacliente();
       foreach ($dados as $linha) {
         $id = $linha["id"];
         $nome = $linha["nome"];
         $telefone = $linha["telefone"];
         $cpf = $linha["cpf"];
         $email = $linha["email"];
         $endereco = $linha["endereco"];


         echo "        <tr>
            <td>$id</td>
            <td>$nome</td>
            <td>$telefone</td>
            <td>$cpf</td>
            <td>$email</td>
            <td>$endereco</td>
            <td>
              <a href='../classes/apagarcliente.php?id=$id' onclick='return confirm(\"Deseja realmente apagar?\")'>Apagar</a>
              <a href='../telas/vercliente.php?id=$id' onclick='return confirm(\"Deseja realmente visualizar?\")'>Visualizar</a>
            </td>
        </tr>";
       }
    ?>
	</table>
</div>

</body>
</html>