<?php
if (isset($_GET["id"])) {
  $id = $_GET["id"];
}

require_once '../banco_de_dados/bancoitens.php';
require_once '../classes/itens.php';
 $bi = new BancoItens();
 $it = new Itens();

 $linha = $bi->buscaritens($id);

   $id = $linha["id"];
   $nome = $linha["nome"];
   $valor = $linha["valor"];
   $descricao = $linha["descricao"];
   $qtd = $linha["qtd"];

  if(isset($_POST['salvar'])):
    
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];
    $qtd = $_POST['qtd'];

    $it->setIdItens($id);
    $it->setNomeItens($nome);
    $it->setValorItens($valor);
    $it->setDescricaoItens($descricao);
    $it->setQtd($qtd);

    $bi->editaritens($it);

    echo "<script type='text/javascript' language='javascript'> 
                 alert ('Item editado com sucesso!!');
                 window.location.href='../telas/telaitens.php';
                 </script>";

  endif;  
    
?>
<html>
 <head>
 <meta charset='UTF-8'>
 <title>Editar funcionario</title>
 <link rel='stylesheet' href='../css/os.css' />
 </head>
 <body>
<form method="post" action="">
<input type="hidden" name="id" value="<?php echo $id; ?>" />
Nome: <input type="text" name="nome" value ="<?php echo $nome; ?>" /><br>
Valor: <input type="text" name="valor" value="<?php echo $valor; ?>" /><br>
Descrição: <input type="text" name="descricao" value="<?php echo $descricao; ?>" /><br>
Quantidade: <input type="text" name="qtd" value="<?php echo $qtd; ?>" /><br>
<input type="submit" value="Salvar" id="salvar" name="salvar"/>
</form>
 </body>
</html>