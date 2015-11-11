<?php
require_once '../banco_de_dados/bancosolicitacao.php';

$bd = new Bancosoli();
$id = $_GET["id"];

$bd->delete($id);


?>