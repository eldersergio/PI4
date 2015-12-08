<?php

    require_once '../classes/itens.php';

    class BancoItens{

      
    	public function inseriritens($it){

    	   $nomeitens = $it->getNomeItens();
           $valoritens = $it->getValorItens();
           $descricaoitens = $it->getDescricaoItens();
           $qtd = $it->getQtd();
           

           $conexao = mysqli_connect("localhost", "root", "", "bancoos") or die(mysql_error());

           $nomeitens = mysqli_real_escape_string($conexao, $nomeitens);
           $valoritens = mysqli_real_escape_string($conexao, $valoritens);
           $descricaoitens = mysqli_real_escape_string($conexao, $descricaoitens);
           $qtd = mysqli_real_escape_string($conexao, $qtd);  

           $comando = "insert into itens (nome, valor, descricao, qtd_estoque)
                       values ('$nomeitens', '$valoritens', '$descricaoitens', '$qtd')";

           mysqli_query($conexao, $comando);   
           mysqli_close($conexao);
           
    	}

    	public function editaritens($it){
           $iditens = $it->getIdItens();
           $nomeitens = $it->getNomeItens();
           $valoritens = $it->getValorItens();
           $descricaoitens = $it->getDescricaoItens();
           $qtd = $it->getQtd();
           

           $conexao = mysqli_connect("localhost", "root", "", "bancoos") or die(mysql_error());

           $nomeitens = mysqli_real_escape_string($conexao, $nomeitens);
           $valoritens = mysqli_real_escape_string($conexao, $valoritens);
           $descricaoitens = mysqli_real_escape_string($conexao, $descricaoitens);
           $qtd = mysqli_real_escape_string($conexao, $qtd);  

           $comando = "update itens set nome='$nomeitens', valor='$valoritens', descricao='$descricaoitens', qtd_estoque='$qtd' where id_itens = '$iditens'";

           mysqli_query($conexao, $comando);   
           mysqli_close($conexao);
           
        }

        public function buscaritens($id){
         $conexao = mysqli_connect("localhost", "root", "", "bancoos") or die(mysql_error());
         $id = mysqli_real_escape_string($conexao, $id);
         $sql = "select id_itens, nome, valor, descricao, qtd_estoque from itens where id_itens = $id";
         $consulta = mysqli_query($conexao, $sql);

         $linha = mysqli_fetch_array($consulta);
         if ($linha) {
         $resposta = array();
         $resposta["id"] = $linha["id_itens"];
         $resposta["nome"] = $linha["nome"];
         $resposta["valor"] = $linha["valor"];
         $resposta["descricao"] = $linha["descricao"];
         $resposta["qtd"] = $linha["qtd_estoque"];
         
         return $resposta;
         }

        } 

         public function buscartabelaitens(){
         $conexao = mysqli_connect("localhost", "root", "", "bancoos") or die(mysql_error());
         $sql = "SELECT * FROM itens";
         $resposta = array();
         $consulta = mysqli_query($conexao, $sql);
         
         while ($linha = mysqli_fetch_array($consulta)) {
              $registro = array();
              $registro["id"] = $linha["id_itens"];
              $registro["nome"] = $linha["nome"];
              $registro["valor"] = $linha["valor"];
              $registro["descricao"] = $linha["descricao"];
              $registro["qtd"] = $linha["qtd_estoque"];
              $resposta[] = $registro;
            }
           return $resposta;
        }

          public function apagaritens($id){
          $conexao = mysqli_connect("localhost", "root", "", "bancoos");
          if (isset($_GET["id"])) {
             $id = $_GET["id"];
            }
          else {
          header("Location: ../telas/telaitens.php");
           die();
           }
           $id = mysqli_real_escape_string($conexao, $id);
           $sql = "delete from itens where id_itens = $id";
           mysqli_query($conexao, $sql);
           
      }

    }


?>