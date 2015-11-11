<?php
require_once '../banco_de_dados/bancofuncionario.php';

$bf = new BancoFuncionario();
$id = $_GET["id"];

$bf->apagarfuncionario($id);
echo "<script type='text/javascript' language='javascript'> 
                 alert ('Funcionario apagado com sucesso!!');
                 window.location.href='../telas/telafuncionario.php';
                 </script>";


?>