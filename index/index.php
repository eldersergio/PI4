<?php
     require_once'../classes/solicitacao.php';
     require_once'../banco_de_dados/bancosolicitacao.php'
?>
<html land="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Nome da empresa</title>
  <link rel="stylesheet" href="../css/os.css" />
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
      <p>Solicite uma visita aqui, é só preencher os dados e enviar que entraremos em contado com você</p>
      Nome: <input type="text" name="nome" id="nome"><br>
      Telefone: <input type="text" name="telefone" id="telefone"><br>
      Endereço: <input type="text" name="endereco" id="endereco"><br>
      Email: <input type="text" name="email" id="email"><br>
      <p>Adicione o problema do seu aparelho aqui abaixo</p>
      <textarea type="text" name="descricao" id="descricao"> </textarea><br>
      <input type="submit"value="Enviar" id="logar" name="cadastrar"><br>
    </form>
</body>
</html>