<?php
session_start();
if (!isset($_SESSION["usuarioatual"])) {
  header("Location: login.html");
  die();
}
?>
<?php

require_once '../classes/os.php';

?>

<html land="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Pagina de Ordem de Serviço</title>
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
        <li><a href="telaitens.php">Itens</a></li>
        <li class="active"><a href="tela_os.php">Ordens de Serviço</a></li>
        <li class="pull-right"><a class="sair" href=login.html>Sair</a></li>
        <li class="pull-right fun"><a href="cadastrar_os.php">Click aqui para cadastrar uma O.S</a></li>        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>  
  
	<div id= "loginadm">
  </div>
  <?php  
    
     $bo =  new BancoOs();
    $o = new Os();
     
  ?>
  <div class="table-responsive" align="center">

    <h2>Ordem de Serviço criadas</h2>

	<table id="tableos"class="table" style="width:90%">
      
      <thead>
        <tr>
        	<th>#</th>
        	<th>Cliente:</th>
        	<th>Telefone do Cliente:</th>
          <th>Funcionario:</th>
          <th>Telefone do Funionario:</th>
          <th>Data criação:</th>
          <th>última alteração:</th>
          <th>Total da O.S:</th>
          <th>Status:</th>
          <th>Ações:</th>
        </tr>
      </thead>

    <?php
       $dados = $bo->buscartabela_os();
         foreach ($dados as $linha) {
           $id = $linha["id_os"];
           $nomecli = $linha["nomeciente"];
           $telefonecli = $linha["telefonecliente"];
           $nomefun = $linha["nomefuncionario"];
           $telefonefun = $linha["telefonefuncionario"];
           $datacri = $linha["datacriacao"];
           $datafinal = $linha["datafinal"];
           $valor = $linha["valor_os"];
           $status = $linha["status"];


           echo "        <tr>
            <td>$id</td>
            <td>$nomecli</td>
            <td>$telefonecli</td>
            <td>$nomefun</td>
            <td>$telefonefun</td>
            <td>$datacri</td>
            <td>$datafinal</td>
            <td>$valor</td>
            <td>$status</td>
            <td>
              <a href='../classes/apagaros.php?id=$id' onclick='return confirm(\"Deseja realmente apagar?\")'>Apagar</a>
              <a href='../telas/veros.php?id=$id' onclick='return confirm(\"Deseja realmente visualizar?\")'>Visualizar</a>
            </td>
            </tr>";
          }

    ?>
	</table>
</div>

</body>
</html>