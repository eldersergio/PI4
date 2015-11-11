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
 <link rel='stylesheet' href='../css/os.css' />
 </head>
 <body>
   <form method="post" action="">
      Nome: <input type="text" name="nome" id="nome"><br>
      Telefone: <input type="text" name="telefone" id="telefone"><br>
      Cpf: <input type="text" name="cpf" id="cpf"><br>
      Email: <input type="text" name="email" id="email"><br>
      Endereço: <input type="text" name="endereco" id="endereco"/><br>
      <input type="submit" value="Salvar" id="salvar" name="salvar"/>
    </form>
 </body>
</html>