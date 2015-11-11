<?php
if (isset($_GET["id"])) {
  $id = $_GET["id"];
}

require_once '../banco_de_dados/bancocliente.php';
require_once '../classes/cliente.php';
 $bc = new BancoCliente();
 $cl = new Cliente();

 $linha = $bc->buscarcliente($id);

  $id = $linha["id"];
  $nome = $linha["nome"];
  $telefone = $linha["telefone"];
  $cpf = $linha["cpf"];
  $email = $linha["email"];
  $endereco = $linha["endereco"];

  if(isset($_POST['salvar'])):
    
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];

    $cl->setIdCliente($id);
    $cl->setNomeCliente($nome);
    $cl->setTelefoneCliente($telefone);
    $cl->setCpfCliente($cpf);
    $cl->setEmailCliente($email);
    $cl->setEnderecoCliente($endereco);

    $bc->editarcliente($cl);

    echo "<script type='text/javascript' language='javascript'> 
                 alert ('Cliente editado com sucesso!!');
                 window.location.href='../telas/telacliente.php';
                 </script>";

  endif;  
    
?>
<html>
 <head>
 <meta charset='UTF-8'>
 <title>Nome da empresa</title>
 <link rel='stylesheet' href='../css/os.css' />
 </head>
 <body>
<form method="post" action="">
<input type="hidden" name="id" value="<?php echo $id; ?>" />
Nome: <input type="text" name="nome" value ="<?php echo $nome; ?>" /><br>
Telefone: <input type="text" name="telefone" value="<?php echo $telefone; ?>" /><br>
Cpf: <input type="text" name="cpf" value="<?php echo $cpf; ?>" /><br>
Email: <input type="text" name="email" value ="<?php echo $email; ?>" /><br>
Endereço: <input type="text" name="endereco" value ="<?php echo $endereco; ?>" /><br>
<input type="submit" value="Salvar" id="salvar" name="salvar"/>
</form>
 </body>
</html>