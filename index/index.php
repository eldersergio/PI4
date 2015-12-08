<?php
     require_once'../classes/solicitacao.php';
     require_once'../banco_de_dados/bancosolicitacao.php'
?>
<html land="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Nome da empresa</title>
 <link rel="stylesheet" href="../css/bootstrap.css"/>
  <link rel="stylesheet" href="../css/bootstrap-theme.css"/>
  <script src="../js/bootstrap.js"></script>
</head>
<body>

<?php

    $Bdsoli =  new Bancosoli();
    $Solis = new Soli();

  if(isset($_POST['cadastrar'])):

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];
    $descricao = $_POST['descricao'];

    $Solis->setNome($nome);
    $Solis->setTelefone($telefone);
    $Solis->setEndereco($endereco);
    $Solis->setEmail($email);
    $Solis->setDescri($descricao);

    if($Bdsoli->insert($Solis)){
        echo "inserido com sucesso!";
    }
  endif;  
?>
    <form method="POST" action="">
      <div class="table-responsive" align="center">
      <h1>Solicite aqui um visita, é só preencher os dados que entremos em contato com você.</h1>
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
      <label for="nome">Endereço:</label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Endereço" aria-describedby="basic-addon1">
    </div>
<div class="input-group">
      <div class="form-group">
      <label for="nome">Email:</label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Email" aria-describedby="basic-addon1">
</div>

<div class="input-group">
      <div class="form-group">
      <label for="nome">Descreva o problema do seu equipamento:</label><br>
      <textarea type="text" name="descricao" id="descricao" cols="60" rows="8"> </textarea><br>
    </div>
      <input style="margin-top:5px;" type="submit"value="Enviar" id="logar" name="cadastrar" class="btn btn-primary">
    </form>
</body>
</html>
<style type="text/css">
body{
    background-image:url("../imagens/Fundo.png");
    background-repeat: no-repeat;
    background-color:#5f5f5f;
    background-size: 100% 100%;
  }
  