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
	<link rel="stylesheet" href="../css/bootstrap.css"/>
  <link rel="stylesheet" href="../css/bootstrap-theme.css"/>
  <script src="../js/bootstrap.js"></script>
</head>
<body>
  <nav class="navbar navbar-inverse" style="border-radius:0px;width:100%">
  <div class="container-fluid">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div id="loginadm" class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav" style="width:100%;">
        <li><a href="telafuncionario.php">Funcionarios <span class="sr-only">(current)</span></a></li>
        <li class="active"><a href="telacliente.php">Clientes</a></li>
        <li><a href="telaitens.php">Itens</a></li>
        <li><a href="tela_os.php">Ordens de Serviço</a></li>
        <li class="pull-right"><a class="sair" href=login.html>Sair</a></li>
        <li class="pull-right fun"><a href="cadastrarcliente.php">Click aqui para cadastrar um cliente</a></li>        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>  
	<div id= "loginadm">

	</div>
  <?php  
    
     $bc =  new BancoCliente();
    $cl = new Cliente();
     
  ?>
  <div class="table-responsive" align="center">

    <h2>Clientes cadastrados</h2>

	<table id="tablecliente" class="table" style="width:90%;">
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