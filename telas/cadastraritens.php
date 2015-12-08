<?php

  require_once '../banco_de_dados/bancoitens.php';
  require_once '../classes/itens.php';

  $bi = new BancoItens();
  $it = new Itens();

  if(isset($_POST['salvar'])):

      $nome = $_POST['nome'];
      $valor = $_POST['valor'];
      $descricao = $_POST['descricao'];

      $it->setNomeItens($nome);
      $it->setValorItens($valor);
      $it->setDescricaoItens($descricao);

      $bi->inseriritens($it);

      echo "<script type='text/javascript' language='javascript'> 
                   alert ('Item cadastrado com sucesso!!');
                   window.location.href='../telas/telaitens.php';
                   </script>";

    endif;

?>

<html>
 <head>
 <meta charset='UTF-8'>
 <title>Cadastro de itens</title>
 <link rel="stylesheet" href="../css/bootstrap.css"/>
  <link rel="stylesheet" href="../css/bootstrap-theme.css"/>
  <script src="../js/bootstrap.js"></script>
 </head>
 <body>
  <div class="table-responsive" align="center">
   <form method="post" action="">
    <h2>Cadastrar Item</h2>
    <div class="input-group">
      <div class="form-group">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" aria-describedby="basic-addon1">
    </div>
    <div class="form-group">
      <label for="valor">Valor:</label>
      <input type="text" class="form-control" id="valor" placeholder="Valor" aria-describedby="basic-addon1">
    </div>        
      <div class="form-group">
      <label for="valor">Descrição:</label><br>
      <textarea type="text" name="descricao" id="descricao" cols="60" rows="8"> </textarea><br>
      <input style="margin-top:5px;" type="submit"value="Salvar" id="salvar" name="salvar" class="btn btn-primary">
    </div>                          
    </form>
  </div>
 </body>
</html>
