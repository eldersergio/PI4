<?php
require_once '../banco_de_dados/bancocliente.php';
require_once '../banco_de_dados/bancofuncionario.php';
require_once '../banco_de_dados/bancoitens.php';

 $bc = new BancoCliente();
 $bf = new BancoFuncionario();
 $bi = new BancoItens();
 
 session_start("guardar_os");
  if ($_SESSION['id'] == null && $_SESSION['idfun'] == null ) {
  $_SESSION['id'] = "";
  $_SESSION['nome'] = "";
  $_SESSION['telefone'] = "";
  $_SESSION['cpf'] = "";
  $_SESSION['email'] = "";
  $_SESSION['endereco'] = "";
  $_SESSION['idfun'] = "";
  $_SESSION['nomefun'] = "";
  $_SESSION['telefonefun'] = "";
  }
  $_SESSION['carrinho'] = array();
  $_SESSION["conta"] = 0;
  $_SESSION["valorcarrinho"] = 0;

  if(isset($_GET['salvar1'])){
  

  $id = $_GET["cliente"];
  $linha = $bc->buscarcliente($id);

  $_SESSION['id'] = $linha["id"];
  $_SESSION['nome'] = $linha["nome"];
  $_SESSION['telefone'] = $linha["telefone"];
  $_SESSION['cpf'] = $linha["cpf"];
  $_SESSION['email'] = $linha["email"];
  $_SESSION['endereco'] = $linha["endereco"];

  echo "<script type='text/javascript' language='javascript'> 
                  alert ('Cliente guardado com sucesso!!');
                  window.location.href='../telas/cadastrar_os.php';
                </script>";

}

  if(isset($_GET['salvar2'])){

  $id = $_GET["funcionario"];
  $linha = $bf->buscarfuncionario($id);

  $_SESSION['idfun'] = $linha["id"];
  $_SESSION['nomefun'] = $linha["nome"];
  $_SESSION['telefonefun'] = $linha["telefone"];

  echo "<script type='text/javascript' language='javascript'> 
                  alert ('Funcionario guardado com sucesso!!');
                  window.location.href='../telas/cadastrar_os.php';
                </script>";
}
  if(isset($_GET['itens'])){
  $itens = $_GET['itens'];
  $qtd = $_GET['qtd'];
  $produto = array();
  $i = 0;
  foreach ($itens as $valor) {

    $linha = $bi->buscaritens($valor);
    $produto["id"] = $linha["id"];
    $produto["nome"] = $linha["nome"];
    $produto["valor"] = $linha["valor"];
    $produto["descricao"] = $linha["descricao"];
    if ($qtd[$i]>0) {
    $produto["qtd"] = $qtd[$i];
    }
    $_SESSION["valorcarrinho"] = $_SESSION["valorcarrinho"]+$produto["valor"]*$produto["qtd"];
    $_SESSION['carrinho'][] = $produto; 
    $i++; 
    $_SESSION["conta"]++;
}

echo "<script type='text/javascript' language='javascript'> 
                  alert ('Itens guardado com sucesso!!');
                  window.location.href='../telas/cadastrar_os.php';
                </script>";
}
?>