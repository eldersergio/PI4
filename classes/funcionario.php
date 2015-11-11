<?php

require_once '../banco_de_dados/bancofuncionario.php';

  class Funcionario{
     
     private $idfuncionario;
     private $nomefuncionario;
     private $telefonefuncionario;
     private $cpffuncionario;
     private $emailfuncionario;
     private $enderecofuncionario;

     public function setIdFuncionario($idfuncionario){
         $this->idfuncionario = $idfuncionario;
      }

      public function getIdFuncionario(){
         return $this->idfuncionario;
      }

   	public function setNomeFuncionario($nomefuncionario){
   		$this->nomefuncionario = $nomefuncionario;
   	}

      public function getNomeFuncionario(){
         return $this->nomefuncionario;
      }

   	public function setTelefoneFuncionario($telefonefuncionario){
   		$this->telefonefuncionario = $telefonefuncionario;
   	}

      public function getTelefoneFuncionario(){
         return $this->telefonefuncionario;
      }

    public function setCpfFuncionario($cpffuncionario){
         $this->cpffuncionario = $cpffuncionario;
      }

      public function getCpfFuncionario(){
         return $this->cpffuncionario;
      }

    public function setEmailFuncionario($emailfuncionario){
         $this->emailfuncionario = $emailfuncionario;
      }

      public function getEmailFuncionario(){
         return $this->emailfuncionario;
      }  

    public function setEnderecoFuncionario($enderecofuncionario){
         $this->enderecofuncionario = $enderecofuncionario;
      }

      public function getEnderecoFuncionario(){
         return $this->enderecofuncionario;
      }  


  }


?>