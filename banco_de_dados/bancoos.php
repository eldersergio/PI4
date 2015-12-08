<?php

  require_once '../classes/os.php';

    class BancoOs{

    	public function inserir_os($o){

           $id_os = $o->getIdOs();
    	     $nomecliente = $o->getNomeCli();
           $telefonecliente = $o->getTelefoneCli();
           $cpfcliente = $o->getCpfCli();
           $emailcliente = $o->getEmailCli(); 
           $enderecocliente = $o->getEnderecoCli();
           $nomefuncionario = $o->getNomeFun();
           $telefonefuncionario = $o->getTelefoneFun();
           $datacriacao = $o->getDataCri();
           $datafinal = $o->getDataFinal();
           $marca = $o->getMarca();
           $modelo = $o->getModelo();
           $descricao_os = $o->getDescricao_Os();
           $valor_os = $o->getValor_Os();
           $status = $o->getStatus();

           $conexao = mysqli_connect("localhost", "root", "", "bancoos") or die(mysql_error());
           
           $id_os = mysqli_real_escape_string($conexao, $id_os);
           $nomecliente = mysqli_real_escape_string($conexao, $nomecliente);
           $telefonecliente = mysqli_real_escape_string($conexao, $telefonecliente);
           $cpfcliente = mysqli_real_escape_string($conexao, $cpfcliente);
           $emailcliente = mysqli_real_escape_string($conexao, $emailcliente);
           $enderecocliente = mysqli_real_escape_string($conexao, $enderecocliente);
           $nomefuncionario = mysqli_real_escape_string($conexao, $nomefuncionario);
           $telefonefuncionario = mysqli_real_escape_string($conexao, $telefonefuncionario);
           $datacriacao = mysqli_real_escape_string($conexao, $datacriacao);
           $datafinal = mysqli_real_escape_string($conexao, $datafinal);
           $marca = mysqli_real_escape_string($conexao, $marca);
           $modelo = mysqli_real_escape_string($conexao, $modelo);
           $descricao_os = mysqli_real_escape_string($conexao, $descricao_os);
           $valor_os = mysqli_real_escape_string($conexao, $valor_os);
           $status = mysqli_real_escape_string($conexao, $status);  

           $comando = "insert into os (id_os, nomecli, telefonecli, cpfcli, emailcli, enderecocli, nomefun, telefonefun, datacri, datafinal, marca, modelo, descricao_os, valor, status)
                       values ('$id_os', '$nomecliente', '$telefonecliente', '$cpfcliente', '$emailcliente', '$enderecocliente', '$nomefuncionario', '$telefonefuncionario', '$datacriacao', 'datafinal', '$marca', '$modelo', '$descricao_os', '$valor_os', '$status')";

           mysqli_query($conexao, $comando);   
           mysqli_close($conexao);
           
    	}


      public function editar_os($o){
           $id_os = $o->getIdOs();
           $nomecliente = $o->getNomeCli();
           $telefonecliente = $o->getTelefoneCli();
           $cpfcliente = $o->getCpfCli();
           $emailcliente = $o->getEmailCli(); 
           $enderecocliente = $o->getEnderecoCli();
           $nomefuncionario = $o->getNomeFun();
           $telefonefuncionario = $o->getTelefoneFun();
           $datacriacao = $o->getDataCri();
           $datafinal = $o->getDataFinal();
           $marca = $o->getMarca();
           $modelo = $o->getModelo();
           $descricao_os = $o->getDescricao_Os();
           $valor_os = $o->getValor_Os();
           $status = $o->getStatus();

           $conexao = mysqli_connect("localhost", "root", "", "bancoos") or die(mysql_error());

           $id_os = mysqli_real_escape_string($conexao, $id_os);
           $nomecliente = mysqli_real_escape_string($conexao, $nomecliente);
           $telefonecliente = mysqli_real_escape_string($conexao, $telefonecliente);
           $cpfcliente = mysqli_real_escape_string($conexao, $cpfcliente);
           $emailcliente = mysqli_real_escape_string($conexao, $emailcliente);
           $enderecocliente = mysqli_real_escape_string($conexao, $enderecocliente);
           $nomefuncionario = mysqli_real_escape_string($conexao, $nomefuncionario);
           $telefonefuncionario = mysqli_real_escape_string($conexao, $telefonefuncionario);
           $datacriacao = mysqli_real_escape_string($conexao, $datacriacao);
           $datafinal = mysqli_real_escape_string($conexao, $datafinal);
           $marca = mysqli_real_escape_string($conexao, $marca);
           $modelo = mysqli_real_escape_string($conexao, $modelo);
           $descricao_os = mysqli_real_escape_string($conexao, $descricao_os);
           $valor_os = mysqli_real_escape_string($conexao, $valor_os);
           $status = mysqli_real_escape_string($conexao, $status);
             

           $comando = "update os set nomecli='$nomecliente', telefonecli='$telefonecliente', cpfcli='$cpfcliente', emailcli='$emailcliente', enderecocli='$enderecocliente', nomefun='$nomefuncionario', telefonefun='$telefonefuncionario', datafinal='now()', marca='$marca', modelo='$modelo', descricao_os='$descricao_os', valor='$valor_os', status='$status' where id_os='$id_os'";

           mysqli_query($conexao, $comando);   
           mysqli_close($conexao);
        }

        public function buscar_os($id){
         $conexao = mysqli_connect("localhost", "root", "", "bancoos") or die(mysql_error());
        
         $id = mysqli_real_escape_string($conexao, $id);
         $sql = "select id_os, nomecli, telefonecli, cpfcli, emailcli, enderecocli, nomefun, telefonefun, datacri, datafinal, marca, modelo, descricao_os, valor, status from os where id_os = $id";
         $consulta = mysqli_query($conexao, $sql);

         $linha = mysqli_fetch_array($consulta);
         if ($linha) {
         $resposta = array();
         $resposta["id_os"] = $linha["id_os"];
         $resposta["nomecliente"] = $linha["nomecli"];
         $resposta["telefonecliente"] = $linha["telefonecli"];
         $resposta["cpfcliente"] = $linha["cpfcli"];
         $resposta["emailcliente"] = $linha["emailcli"];
         $resposta["enderecocliente"] = $linha["enderecocli"];
         $resposta["nomefuncionario"] = $linha["nomefun"];
         $resposta["telefonefuncionario"] = $linha["telefonefun"];
         $resposta["datacriacao"] = $linha["datacri"];
         $resposta["datafinal"] = $linha["datafinal"];
         $resposta["marca"] = $linha["marca"];
         $resposta["modelo"] = $linha["modelo"];
         $resposta["descricao_os"] = $linha["descricao_os"];
         $resposta["valor_os"] = $linha["valor"];
         $resposta["status"] = $linha["status"];
         return $resposta;
         }
          
       }

       public function buscartabela_os(){
        $conexao = mysqli_connect("localhost", "root", "", "bancoos") or die(mysql_error());
        $sql = "SELECT * FROM os";
        $resposta = array();
        $consulta = mysqli_query($conexao, $sql);
        while ($linha = mysqli_fetch_array($consulta)) {
            $registro = array();
            $resposta = array();
            $resposta["id_os"] = $linha["id_os"];
            $resposta["nomecliente"] = $linha["nomecli"];
            $resposta["telefonecliente"] = $linha["telefonecli"];
            $resposta["cpfcliente"] = $linha["cpfcli"];
            $resposta["emailcliente"] = $linha["emailcli"];
            $resposta["enderecocliente"] = $linha["enderecocli"];
            $resposta["nomefuncionario"] = $linha["nomefun"];
            $resposta["telefonefuncionario"] = $linha["telefonefun"];
            $resposta["datacriacao"] = $linha["datacri"];
            $resposta["datafinal"] = $linha["datafinal"];
            $resposta["marca"] = $linha["marca"];
            $resposta["modelo"] = $linha["modelo"];
            $resposta["descricao_os"] = $linha["descricao_os"];
            $resposta["valor_os"] = $linha["valor"];
            $resposta["status"] = $linha["status"];
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
          header("Location: ../telas/tela_os.php");
           die();
           }
           $id = mysqli_real_escape_string($conexao, $id);
           $sql = "delete from os where id_os = $id";
           mysqli_query($conexao, $sql);
           
      }

    }





?>