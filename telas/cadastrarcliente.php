<?php

require_once '../banco_de_dados/bancosolicitacao.php';
require_once '../banco_de_dados/bancocliente.php';
require_once '../classes/cliente.php';

$bd = new Bancosoli();
$bc = new BancoCliente();
$cl = new Cliente();

if(isset($_POST['salvar'])):

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];

    $cl->setNomeCliente($nome);
    $cl->setTelefoneCliente($telefone);
    $cl->setCpfCliente($cpf);
    $cl->setEmailCliente($email);
    $cl->setEnderecoCliente($endereco);

    $bc->inserircliente($cl);

    echo "<script type='text/javascript' language='javascript'> 
                 alert ('Cliente cadastrado com sucesso!!');
                 window.location.href='../telas/telacliente.php';
                 </script>";

  endif;  

if (isset($_GET["id"])) {
  $id = $_GET["id"];

  $linha = $bd->buscar1($id);

  $id = $linha["id"];
  $nome = $linha["nome"];
  $telefone = $linha["telefone"];
  $endereco = $linha["endereco"];
  $email = $linha["email"];
  $descri = $linha["descri"];

  echo "<html>
 <head>
 <meta charset='UTF-8'>
 <title>Nome da empresa</title>
 <link rel='stylesheet' href='../css/os.css' />
 </head>
 <body>
<form method='post' action=''>
<input type='hidden' name='id' value='$id;' />
Nome: <input type='text' name='nome' value ='$nome;' /><br>
Telefone: <input type='text' name='telefone' value='$telefone;' /><br>
Cpf: <input type='text' name='cpf' id='cpf'><br>
Email: <input type='text' name='email' value ='$email;' /><br>
Endereço: <input type='text' name='endereco' value ='$endereco;' /><br>
<input type='submit' value='Salvar' id='salvar' name='salvar'/>
</form>
 </body>
</html>";
die();
}
    
?>
<html>
 <head>
 <meta charset='UTF-8'>
 <title>Nome da empresa</title>
 <link rel="stylesheet" href="../css/bootstrap.css"/>
  <link rel="stylesheet" href="../css/bootstrap-theme.css"/>
  <script src="../js/bootstrap.js"></script>
 </head>
 <body>
<form method="post" action="">
<div class="table-responsive" align="center">
   <form method="post" action="">
    <h2>Cadastrar Cliente</h2>
    <div class="input-group">
      <div class="form-group">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" aria-describedby="basic-addon1">
    </div>
<div class="input-group">
      <div class="form-group">
      <label for="nome">Telefone:</label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Telefone" aria-describedby="basic-addon1">
    </div>
<div class="input-group">
      <div class="form-group">
      <label for="nome">CPF:</label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="CPF" aria-describedby="basic-addon1">
    </div>
<div class="input-group">
      <div class="form-group">
      <label for="nome">Email:</label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Email" aria-describedby="basic-addon1">
    </div>
<div class="input-group">
      <div class="form-group">
      <label for="nome">Endereço:</label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Endereço" aria-describedby="basic-addon1">
    </div>
<input style="margin-top:5px;" type="submit"value="Salvar" id="salvar" name="salvar" class="btn btn-primary">
</form>
 </body>
</html>