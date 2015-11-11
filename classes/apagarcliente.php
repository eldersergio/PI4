<?php
require_once '../banco_de_dados/bancocliente.php';

$bc = new BancoCliente();
$id = $_GET["id"];

$bc->apagarcliente($id);
echo "<script type='text/javascript' language='javascript'> 
                 alert ('Cliente apagado com sucesso!!');
                 window.location.href='../telas/telacliente.php';
                 </script>";


?>