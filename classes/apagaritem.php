<?php
require_once '../banco_de_dados/bancoitens.php';

$bi = new BancoItens();
$id = $_GET["id"];

$bi->apagaritens($id);
echo "<script type='text/javascript' language='javascript'> 
                 alert ('Item apagado com sucesso!!');
                 window.location.href='../telas/telaitens.php';
                 </script>";


?>