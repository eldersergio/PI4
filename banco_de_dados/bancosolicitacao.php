<?php

    require_once '../classes/solicitacao.php';

    class Bancosoli {

	protected $table;
	public function insert($Solis){

      $nome = $Solis->getNome();
      $telefone = $Solis->getTelefone();
      $endereco = $Solis->getEndereco();
      $email = $Solis->getEmail();
      $descri = $Solis->getDescri();

      $conexao = mysqli_connect("localhost", "root", "", "bancoos") or die(mysql_error());

      $nome = mysqli_real_escape_string($conexao, $nome);
      $telefone = mysqli_real_escape_string($conexao, $telefone);
      $endereco = mysqli_real_escape_string($conexao, $endereco);
      $email = mysqli_real_escape_string($conexao, $email);
      $descri = mysqli_real_escape_string($conexao, $descri);

      $comando = "insert into soli (nomesoli, telsoli, enderecosoli, emailsoli, descrisoli)
            values ('$nome', '$telefone', '$endereco', '$email', '$descri')";

      mysqli_query($conexao, $comando);   

      mysqli_close($conexao);

	}
	public function update($id){

	}

  public function buscar1($id){
    $Solis = new Soli();
    $conexao = mysqli_connect("localhost", "root", "", "bancoos") or die(mysql_error());
    $id = mysqli_real_escape_string($conexao, $id);
    $sql = "select idsoli, nomesoli, telsoli, enderecosoli, emailsoli, descrisoli from soli where idsoli = $id";
    $consulta = mysqli_query($conexao, $sql);

    $linha = mysqli_fetch_array($consulta);
    if ($linha) {
     $resposta = array();
     $resposta["id"] = $linha["idsoli"];
     $resposta["nome"] = $linha["nomesoli"];
     $resposta["telefone"] = $linha["telsoli"];
     $resposta["endereco"] = $linha["enderecosoli"];
     $resposta["email"] = $linha["emailsoli"];
     $resposta["descri"] = $linha["descrisoli"];
     return $resposta;
          
    }  

  }


  public function buscartabela(){
    $conexao = mysqli_connect("localhost", "root", "", "bancoos") or die(mysql_error());
    $sql = "SELECT * FROM soli";
    $resposta = array();
    $consulta = mysqli_query($conexao, $sql);
    while ($linha = mysqli_fetch_array($consulta)) {
           $registro = array();
           $registro["id"] = $linha["idsoli"];
           $registro["nome"] = $linha["nomesoli"];
           $registro["telefone"] = $linha["telsoli"];
           $registro["endereco"] = $linha["enderecosoli"];
           $registro["email"] = $linha["emailsoli"];
           $registro["descri"] =$linha["descrisoli"];
           $resposta[] = $registro;
    }
    return $resposta;
  }

	public function delete($id){
          $conexao = mysqli_connect("localhost", "root", "", "bancoos");
          if (isset($_GET["id"])) {
             $id = $_GET["id"];
            }
          else {
          header("Location: ../telas/adm.php");
           die();
           }
           $id = mysqli_real_escape_string($conexao, $id);
           $sql = "delete from soli where idsoli = $id";
           mysqli_query($conexao, $sql);
           echo "<script type='text/javascript' language='javascript'> 
                 alert ('Solicitação apagada com sucesso!!');
                 window.location.href='../telas/adm.php';
                 </script>";
	}
}