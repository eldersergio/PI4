<?php
$nome= @_POST['nome'];
$descricao= @_POST['descricao'];
$valor= @_POST['valor'];

if(empty($nome)){
	echo "<script>alert('Preencha todos os campos'); history.back(); </script>";
}else if(empty($descricao)){
	echo "<script>alert('Preencha todos os campos'); history.back(); </script>";
}else if(empty($valor)){
	echo "<script>alert('Preencha todos os campos'); history.back(); </script>";
}else{
	include("connectionfactory.php");
	$query_select = "SELECT itens FROM nome_itens WHERE nome = '$nome'";
    $select = mysql_query($query_select,$db);
    	$query = "INSERT INTO itens (nome_itens, descricao_os, valor) VALUES ('$nome', '$descricao', '$valor')";
		$insert = mysql_query($query,$db);
		echo $nome;
		 
		if($insert){
			echo "<script>alert('sucesso'); history.back(); </script>";
		}else{
			echo "<script>alert('Erro de conexão, tente novamente mais tarde'); history.back(); </script>";
		}
	
}
?>