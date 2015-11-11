<?php

    require_once '../classes/cliente.php';

    class BancoCliente{

    	public function inserircliente($cl){

    	     $nome = $cl->getNomeCliente();
           $telefone = $cl->getTelefoneCliente();
           $cpf = $cl->getCpfCliente();
           $email = $cl->getEmailCliente(); 
           $endereco = $cl->getEnderecoCliente();

           $conexao = mysqli_connect("localhost", "root", "", "bancoos") or die(mysql_error());

           $nome = mysqli_real_escape_string($conexao, $nome);
           $telefone = mysqli_real_escape_string($conexao, $telefone);
           $cpf = mysqli_real_escape_string($conexao, $cpf);
           $email = mysqli_real_escape_string($conexao, $email);
           $endereco = mysqli_real_escape_string($conexao, $endereco);  

           $comando = "insert into cliente (nome, telefone, cpf, email, endereco)
                       values ('$nome', '$telefone', '$cpf', '$email', '$endereco')";

           mysqli_query($conexao, $comando);   
           mysqli_close($conexao);
           
    	}

      public function editarcliente($cl){
           $id = $cl->getIdCliente();
           $nome = $cl->getNomeCliente();
           $telefone = $cl->getTelefoneCliente();
           $cpf = $cl->getCpfCliente();
           $email = $cl->getEmailCliente(); 
           $endereco = $cl->getEnderecoCliente();

           $conexao = mysqli_connect("localhost", "root", "", "bancoos") or die(mysql_error());

           $nome = mysqli_real_escape_string($conexao, $nome);
           $telefone = mysqli_real_escape_string($conexao, $telefone);
           $cpf = mysqli_real_escape_string($conexao, $cpf);
           $email = mysqli_real_escape_string($conexao, $email);
           $endereco = mysqli_real_escape_string($conexao, $endereco);  

           $comando = "update cliente set nome='$nome', telefone='$telefone', cpf='$cpf', email='$email', endereco='$endereco' where id_cliente='$id'";

           mysqli_query($conexao, $comando);   
           mysqli_close($conexao);
           
      }      

      public function buscarcliente($id){
         $cl = new Cliente();
         $conexao = mysqli_connect("localhost", "root", "", "bancoos") or die(mysql_error());
         $id = mysqli_real_escape_string($conexao, $id);
         $sql = "select id_cliente, nome, telefone, cpf, email, endereco from cliente where id_cliente = $id";
         $consulta = mysqli_query($conexao, $sql);

         $linha = mysqli_fetch_array($consulta);
         if ($linha) {
         $resposta = array();
         $resposta["id"] = $linha["id_cliente"];
         $resposta["nome"] = $linha["nome"];
         $resposta["telefone"] = $linha["telefone"];
         $resposta["cpf"] = $linha["cpf"];
         $resposta["email"] = $linha["email"];
         $resposta["endereco"] = $linha["endereco"];
         return $resposta;
         }
          
      }

      public function buscartabelacliente(){
        $conexao = mysqli_connect("localhost", "root", "", "bancoos") or die(mysql_error());
        $sql = "SELECT * FROM cliente";
        $resposta = array();
        $consulta = mysqli_query($conexao, $sql);
        while ($linha = mysqli_fetch_array($consulta)) {
              $registro = array();
              $registro["id"] = $linha["id_cliente"];
              $registro["nome"] = $linha["nome"];
              $registro["telefone"] = $linha["telefone"];
              $registro["cpf"] = $linha["cpf"];
              $registro["email"] = $linha["email"];
              $registro["endereco"] =$linha["endereco"];
              $resposta[] = $registro;
        }
         return $resposta;
      }

      public function apagarcliente($id){
          $conexao = mysqli_connect("localhost", "root", "", "bancoos");
          if (isset($_GET["id"])) {
             $id = $_GET["id"];
            }
          else {
          header("Location: ../telas/telacliente.php");
           die();
           }
           $id = mysqli_real_escape_string($conexao, $id);
           $sql = "delete from cliente where id_cliente = $id";
           mysqli_query($conexao, $sql);
           
      }
   





    }


?>