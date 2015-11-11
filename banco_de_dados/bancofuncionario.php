<?php

    require_once '../classes/funcionario.php';

    class BancoFuncionario{

    	public function inserirfuncionario($fn){

    	   $nome = $fn->getNomeFuncionario();
           $telefone = $fn->getTelefoneFuncionario();
           $cpf = $fn->getCpfFuncionario();
           $email = $fn->getEmailFuncionario(); 
           $endereco = $fn->getEnderecoFuncionario();

           $conexao = mysqli_connect("localhost", "root", "", "bancoos") or die(mysql_error());

           $nome = mysqli_real_escape_string($conexao, $nome);
           $telefone = mysqli_real_escape_string($conexao, $telefone);
           $cpf = mysqli_real_escape_string($conexao, $cpf);
           $email = mysqli_real_escape_string($conexao, $email);
           $endereco = mysqli_real_escape_string($conexao, $endereco);  

           $comando = "insert into funcionario (nome, telefone, cpf, email, endereco)
                       values ('$nome', '$telefone', '$cpf', '$email', '$endereco')";

           mysqli_query($conexao, $comando);   
           mysqli_close($conexao);
           
    	}

    	public function editarfuncionario($fn){
           $id = $fn->getIdFuncionario();
           $nome = $fn->getNomeFuncionario();
           $telefone = $fn->getTelefoneFuncionario();
           $cpf = $fn->getCpfFuncionario();
           $email = $fn->getEmailFuncionario(); 
           $endereco = $fn->getEnderecoFuncionario();

           $conexao = mysqli_connect("localhost", "root", "", "bancoos") or die(mysql_error());

           $nome = mysqli_real_escape_string($conexao, $nome);
           $telefone = mysqli_real_escape_string($conexao, $telefone);
           $cpf = mysqli_real_escape_string($conexao, $cpf);
           $email = mysqli_real_escape_string($conexao, $email);
           $endereco = mysqli_real_escape_string($conexao, $endereco);  

           $comando = "update funcionario set nome='$nome', telefone='$telefone', cpf='$cpf', email='$email', endereco='$endereco' where id_funcionario='$id'";

           mysqli_query($conexao, $comando);   
           mysqli_close($conexao);
           
        }

        public function buscarfuncionario($id){
         $conexao = mysqli_connect("localhost", "root", "", "bancoos") or die(mysql_error());
         $id = mysqli_real_escape_string($conexao, $id);
         $sql = "select id_funcionario, nome, telefone, cpf, email, endereco from funcionario where id_funcionario = $id";
         $consulta = mysqli_query($conexao, $sql);

         $linha = mysqli_fetch_array($consulta);
         if ($linha) {
         $resposta = array();
         $resposta["id"] = $linha["id_funcionario"];
         $resposta["nome"] = $linha["nome"];
         $resposta["telefone"] = $linha["telefone"];
         $resposta["cpf"] = $linha["cpf"];
         $resposta["email"] = $linha["email"];
         $resposta["endereco"] = $linha["endereco"];
         return $resposta;
         }
          
        }

        public function buscartabelafuncionario(){
         $conexao = mysqli_connect("localhost", "root", "", "bancoos") or die(mysql_error());
         $sql = "SELECT * FROM funcionario";
         $resposta = array();
         $consulta = mysqli_query($conexao, $sql);
         while ($linha = mysqli_fetch_array($consulta)) {
              $registro = array();
              $registro["id"] = $linha["id_funcionario"];
              $registro["nome"] = $linha["nome"];
              $registro["telefone"] = $linha["telefone"];
              $registro["cpf"] = $linha["cpf"];
              $registro["email"] = $linha["email"];
              $registro["endereco"] =$linha["endereco"];
              $resposta[] = $registro;
            }
           return $resposta;
        } 

        public function apagarfuncionario($id){
          $conexao = mysqli_connect("localhost", "root", "", "bancoos");
          if (isset($_GET["id"])) {
             $id = $_GET["id"];
            }
          else {
          header("Location: ../telas/telafuncionario.php");
           die();
           }
           $id = mysqli_real_escape_string($conexao, $id);
           $sql = "delete from funcionario where id_funcionario = $id";
           mysqli_query($conexao, $sql);
           
      } 


    }


?>