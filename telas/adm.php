<html land="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Administrador</title>
	<link rel="stylesheet" href="../css/bootstrap.css"/>
	<link rel="stylesheet" href="../css/bootstrap-theme.css"/>
	<script src="../js/bootstrap.js"></script>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Bootstrap 101 Template</title>
  <!-- Bootstrap -->
  <link href="http:https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <title>Administrador</title>
  <link rel="stylesheet" href="../css/os.css" />
</head>

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
<body>
<nav class="navbar navbar-inverse" style="border-radius:0px;width:100%">
  <div class="container-fluid">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div id="loginadm" class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav" style="width:100%;">
        <li><a href="telafuncionario.php">Funcionários <span class="sr-only">(current)</span></a></li>
        <li><a href="telacliente.php">Clientes</a></li>
    		<li><a href="telaitens.php">Itens</a></li>
    		<li><a href="tela_os.php">Ordens de Serviço</a></li>
        <li class="pull-right"><a class="sair" href=login.html>Sair</a></li>
    		<li class="pull-right"><a href="log.php">Login</a></li>        
	    </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="table-responsive" align="center">
<h2 style="margin-left:10px;">Espaço do Administrador - Solicitações</h2>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
</html>
  <?php  
    
     $Bdsoli =  new Bancosoli();
    $Solis = new Soli();
     
  ?>
  <div class="table-responsive"  align="center">
  <table class="table" style="width:90%">
      
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
