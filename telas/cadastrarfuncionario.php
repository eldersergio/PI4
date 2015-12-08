<?php

  require_once '../banco_de_dados/bancofuncionario.php';
  require_once '../classes/funcionario.php';

  $bf = new BancoFuncionario();
  $fn = new Funcionario();

  if(isset($_POST['salvar'])):

      $nome = $_POST['nome'];
      $telefone = $_POST['telefone'];
      $cpf = $_POST['cpf'];
      $email = $_POST['email'];
      $endereco = $_POST['endereco'];

      $fn->setNomeFuncionario($nome);
      $fn->setTelefoneFuncionario($telefone);
      $fn->setCpfFuncionario($cpf);
      $fn->setEmailFuncionario($email);
      $fn->setEnderecoFuncionario($endereco);

      $bf->inserirfuncionario($fn);

      echo "<script type='text/javascript' language='javascript'> 
                   alert ('Funcionario cadastrado com sucesso!!');
                   window.location.href='../telas/telafuncionario.php';
                   </script>";

    endif;

?>

<html>
 <head>
 <meta charset='UTF-8'>
 <title>Cadastro de funcionarios</title>
<link rel="stylesheet" href="../css/bootstrap.css"/>
  <link rel="stylesheet" href="../css/bootstrap-theme.css"/>
  <script src="../js/bootstrap.js"></script>
 </head>
 <body>
   <form method="post" action="">
    <div class="table-responsive" align="center">
      <h2>Cadastrar Funcionário</h2>
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