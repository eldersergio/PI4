<?php

require_once '../banco_de_dados/bancocliente.php';

  class Cliente{
     
     private $idclinte;
     private $nomecliente;
     private $telefonecliente;
     private $cpfcliente;
     private $emailcliente;
     private $enderecocliente;

     public function setIdCliente($idclinte){
         $this->idclinte = $idclinte;
      }

      public function getIdCliente(){
         return $this->idclinte;
      }

   	public function setNomeCliente($nomecliente){
   		$this->nomecliente = $nomecliente;
   	}

      public function getNomeCliente(){
         return $this->nomecliente;
      }

   	public function setTelefoneCliente($telefonecliente){
   		$this->telefonecliente = $telefonecliente;
   	}

      public function getTelefoneCliente(){
         return $this->telefonecliente;
      }

    public function setCpfCliente($cpfclinte){
         $this->cpfclinte = $cpfclinte;
      }

      public function getCpfCliente(){
         return $this->cpfclinte;
      }

    public function setEmailCliente($emailcliente){
         $this->emailcliente = $emailcliente;
      }

      public function getEmailCliente(){
         return $this->emailcliente;
      }  

    public function setEnderecoCliente($enderecocliente){
         $this->enderecocliente = $enderecocliente;
      }

      public function getEnderecoCliente(){
         return $this->enderecocliente;
      }  


  }


?>