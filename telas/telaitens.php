<?php
session_start();
if (!isset($_SESSION["usuarioatual"])) {
  header("Location: login.html");
  die();
}
?>
<?php

require_once '../classes/itens.php';

?>

<html land="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Pagina Itens</title>
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
        <li><a href="telacliente.php">Clientes</a></li>
        <li class="active"><a href="telaitens.php">Itens</a></li>
        <li><a href="tela_os.php">Ordens de Serviço</a></li>
        <li class="pull-right"><a class="sair" href=login.html>Sair</a></li>
        <li class="pull-right fun"><a href="cadastraritens.php">Click aqui para cadastrar um item</a></li>        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>  
 
	<div id= "loginadm">
  </div>
  <?php  
    
    $bi =  new BancoItens();
     
  ?>
  <div class="table-responsive" align="center">


    <h2>Itens cadastrados</h2>

	<table id="tablecliente" class="table" style="width:90%;">
      
      <thead>
        <tr>
        	<th>#</th>
        	<th>Nome:</th>
        	<th>Valor:</th>
        	<th>Descrição:</th>
          <th>Quantidade:</th>
          <th>Ações:</th>
        </tr>
      </thead>

    <?php
       $dados = $bi->buscartabelaitens();
       $valor = 0;
       foreach ($dados as $linha) {
         $iditens = $linha["id"];
         $nomeitens = $linha["nome"];
         $valoritens = $linha["valor"];
         $descricaoitens = $linha["descricao"];
         $qtd = $linha["qtd"];
         $valor = $valor+$valoritens;

           echo "<tr>
            <td>$iditens</td>
            <td>$nomeitens</td>
            <td>$valoritens</td>
            <td>$descricaoitens</td>
            <td>$qtd</td>
            <td>
              <a href='../classes/apagaritem.php?id=$iditens' onclick='return confirm(\"Deseja realmente apagar?\")'>Apagar</a>
              <a href='../telas/veritem.php?id=$iditens' onclick='return confirm(\"Deseja realmente visualizar?\")'>Visualizar</a>
            </td>
        </tr>";
         
       }
    ?>
	</table>
</div>
  <?php echo " <p align='center'>O valor de todos os itens no estoque são: R$ $valor</p>"?>
</body>
</html>