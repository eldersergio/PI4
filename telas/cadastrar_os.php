<?php
session_start("guardar_os");

if (isset($_GET["id"])) {
    $idteste = $_GET["id"];
}
else{

	$idteste = "";
}
require_once '../banco_de_dados/bancoos.php';
require_once '../banco_de_dados/bancocliente.php';
require_once '../banco_de_dados/bancofuncionario.php';
require_once '../banco_de_dados/bancoitens.php';
require_once '../classes/cliente.php';
require_once '../classes/funcionario.php';
require_once '../classes/itens.php';
require_once '../classes/os.php';
 $bo = new BancoOs();
 $bc = new BancoCliente();
 $bf = new BancoFuncionario();
 $bi = new BancoItens();
 $cl = new Cliente();
 $fn = new Funcionario();
 $it = new Itens();
 $o = new Os();

if (isset($_SESSION["valorcarrinho"]) == null) {
  $valortotal = 0;
}
else{

  $valortotal = $_SESSION["valorcarrinho"];

}

if (isset($_SESSION['conta']) == null){
     
     $itens = 0;

}
else{

  $itens = $_SESSION["conta"];
} 

if (isset($_SESSION['id']) == null){

 $nomecli= "Você precisa adicionar acima.";
 $telefonecli="Você precisa adicionar acima.";
 $cpfcli="Você precisa adicionar acima.";
 $emailcli="Você precisa adicionar acima.";
 $enderecocli="Você precisa adicionar acima.";
}
else{
   
   $nomecli = $_SESSION['nome'];
   $telefonecli = $_SESSION['telefone'];
   $cpfcli = $_SESSION['cpf'];
   $emailcli = $_SESSION['email'];
   $enderecocli = $_SESSION['endereco'];

}

if (isset($_SESSION['idfun']) == null){
    
    $nomefun="Você precisa adicionar acima.";
    $telefonefun="Você precisa adicionar acima.";
   
}
else{

   $nomefun = $_SESSION['nomefun'];
   $telefonefun = $_SESSION['telefonefun'];
} 
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Criar O.S</title>
  <link rel="stylesheet" href="../css/bootstrap.css"/>
  <link rel="stylesheet" href="../css/bootstrap-theme.css"/>
  <script src="../js/bootstrap.js"></script>
</head>
<body>
<p align="center">Adicione aqui</p>


<form method="get" action="../classes/guardar_os.php">

  <ul>

   <li class="titulo" id="tit01">Cliente

     <div style="display:none" id="oculto01">
	    <?php

        $dados = $bc->buscartabelacliente();
        foreach ($dados as $linha) {
          $id = $linha["id"];
          $nome = $linha["nome"];
          $cpf = $linha["cpf"];
         


          echo " 
           ID: $id Nome: $nome Cpf: $cpf <input type='radio' name='cliente' value='$id'><br><br>";
        }

        echo "<input type='submit' value='Guardar' id='salvar1' name='salvar1'/>";
      ?>
       <p id='f1'>Voltar</p>
     </div>
    </li>


  </ul> 
   
  <ul>

   <li class="titulo" id="tit02">Funcionario

     <div style="display:none" id="oculto02">

    <?php

       $dados = $bf->buscartabelafuncionario();
       foreach ($dados as $linha) {
         $id = $linha["id"];
         $nome = $linha["nome"];
         $telefone = $linha["telefone"];
         


         echo "ID: $id Nome: $nome Telefone: $telefone <input type='radio' name='funcionario' value='$id'><br><br>";
       }

        echo "<input type='submit' value='Guardar' id='salvar2' name='salvar2'/>
              <p id='f2'>Voltar</p>";
     ?> 
      </div>
    </li>
  </ul>

  <ul>

   <li class="titulo" id="tit03">Itens

     <div style="display:none" id="oculto03">

        <?php

        $dados = $bi->buscartabelaitens();
        foreach ($dados as $linha) {
         $iditens = $linha["id"];
         $nomeitens = $linha["nome"];
         $valoritens = $linha["valor"];
         $descricaoitens = $linha["descricao"];


         echo "ID: $iditens Nome: $nomeitens Valor:R$ $valoritens Descrição: $descricaoitens <input type='checkbox' name='itens[]' value='$iditens'>Digite a quantidade aqui:<input type='text' name='qtd[]' id='id_os'><br><br>";
       }

       echo "<input type='submit' value='Guardar' id='salvar' name='salvar3'/>
             <p id='f3'>Voltar</p><br><br>";

  ?>

     </div>
    </li>
  </ul>    

</form>
   <form method="post" action="">
   	  Id_Os: <input type="text" name="id_os" id="id_os"><br>
   	  Nome do Cliente: <?php echo "$nomecli";?><br>
   	  Telefone do Cliente: <?php echo "$telefonecli";?><br>
   	  Cpf do Cliente: <?php echo "$cpfcli";?><br>
   	  Email do Cliente: <?php echo "$emailcli";?><br>
   	  Endereço do Cliente: <?php echo "$enderecocli";?><br>
   	  Nome do Funcionario: <?php echo "$nomefun";?><br>
   	  Telefone do Funcionario: <?php echo "$telefonefun";?><br>
      Marca: <input type="text" name="mara" id="marca"><br>
      Modelo: <input type="text" name="modelo" id="modelo"><br>
      Valor do Serviço: <input type="text" name="vs" id="vs"><br>
      <p>Descrição:</p>
      <textarea type="text" name="descricao" id="descricao"> </textarea><br>
      <p class="titulo" id="itens">Itens selecionados:<?php echo "$itens";?>
        <div style="display:none" id="oculto1">
          <thead>
          <tr>
            <th>#</th>
            <th>Nome:</th>
            <th>Valor:</th>
            <th>Descrição:</th>
            <th>Quantidade:</th>
          </tr>
          </thead><br>
          <?php
            
            if (isset($_SESSION['carrinho']) == null) {
              
              echo "Você precisa selecionar pelomenos um item!!";
            }
            else{

               foreach ($_SESSION['carrinho'] as $linha1) {
                $iditem = $linha1["id"];
                $nomeitem = $linha1["nome"];
                $valoritem = $linha1["valor"];
                $descricaoitem = $linha1["descricao"];
                $qtditem = $linha1["qtd"];

                   echo "<tr>
                          <td>$iditem</td>
                          <td>$nomeitem</td>
                          <td>$valoritem</td>
                          <td>$descricaoitem</td>
                          <td>$qtditem</td>
                        </tr><br>";
              }

            }


          ?>
          <p id='tit05'>Voltar</p>
        </div>
      </p><br>

      Valor total da O.S: <?php echo "R$ $valortotal";?><br>
      Status: <input type="text" name="status" id="status"><br>
      <input type="submit" value="Salvar" id="salvar" name="salvar"/>
    </form>
    <a href="../classes/limpar.php">Limpar cadastro.</a>
    <script type='text/javascript' language='javascript'> 
                  
              var tit01 = document.getElementById("tit01");
              var oculto01 = document.getElementById("oculto01");
              console.log(oculto01);
              tit01.addEventListener("click", function(){
              oculto01.setAttribute("style", "display:block; font-size:20px")
              fechar1();
              });

              var tit02 = document.getElementById("tit02");
              var oculto02 = document.getElementById("oculto02");
              console.log(oculto02);

              tit02.addEventListener("click", function(){
              oculto02.setAttribute("style", "display:block; font-size:20px")
              fechar2();
              });

              var tit03 = document.getElementById("tit03");
              var oculto03 = document.getElementById("oculto03");
              console.log(oculto03);

              tit03.addEventListener("click", function(){
                oculto03.setAttribute("style", "display:block; font-size:20px");
                fechar3();
              });

              var itens = document.getElementById("itens");
              var oculto1 = document.getElementById("oculto1");
              console.log(oculto1);
              itens.addEventListener("click", function(){
                oculto1.setAttribute("style", "display:block; font-size:15px");
              });

              var tit05 = document.getElementById("tit05");

              tit05.addEventListener("click", function(){
                fecharitens();
              });

              var f1 = document.getElementById("f1");

              f1.addEventListener("click", function(event){
               fechar();
               event.stopPropagation();
              });

              var f2 = document.getElementById("f2");

              f2.addEventListener("click", function(event){
               fechar();
               event.stopPropagation();
              });

              var f3 = document.getElementById("f3");

              f3.addEventListener("click", function(event){
               fechar();
               event.stopPropagation();
              });

              function fechar(){

               oculto01.setAttribute("style","display: none"); 
  
               oculto02.setAttribute("style","display: none");
  
               oculto03.setAttribute("style","display: none");
              }

              function fechar1(){
  
               oculto02.setAttribute("style","display: none");
  
               oculto03.setAttribute("style","display: none");
              }

              function fechar2(){
  
               oculto01.setAttribute("style","display: none");
  
               oculto03.setAttribute("style","display: none");
              }
              function fechar3(){
  
               oculto01.setAttribute("style","display: none");
  
               oculto02.setAttribute("style","display: none");
              }
              function fecharitens(){

                oculto1.setAttribute("style","display: none");

              }        
     </script> 
</body>
</html>