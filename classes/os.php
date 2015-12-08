<?php

require_once '../banco_de_dados/bancoos.php';

  class Os{
     
     private $idos;
     private $nomecli;
     private $telefonecli;
     private $cpfcli;
     private $emailcli;
     private $enderecocli;
     private $nomefun;
     private $telefonefun;
     private $datacri;
     private $datafinal;
     private $marca;
     private $modelo;
     private $descricao_os;
     private $valor_os;
     private $status;

     public function setIdOs($idos){
         $this->idos = $idos;
      }

      public function getIdOs(){
         return $this->idos;
      }

   	public function setNomeCli($nomecli){
   		$this->nomecli = $nomecli;
   	}

      public function getNomeCli(){
         return $this->nomecli;
      }

   	public function setTelefoneCli($telefonecli){
   		$this->telefonecli = $telefonecli;
   	}

      public function getTelefoneCli(){
         return $this->telefonecli;
      }

    public function setCpfCli($cpfcli){
         $this->cpfcli = $cpfcli;
      }

      public function getCpfCli(){
         return $this->cpfcli;
      }

    public function setEmailCli($emailcli){
         $this->emailcli = $emailcli;
      }

      public function getEmailCli(){
         return $this->emailcli;
      }  

    public function setEnderecoCli($enderecocli){
         $this->enderecocli = $enderecocli;
      }

      public function getEnderecoCli(){
         return $this->enderecocli;
      }  

      public function setNomeFun($nomefun){
      $this->nomefun = $nomefun;
      }

      public function getNomeFun(){
         return $this->nomefun;
      }

    public function setTelefoneFun($telefonefun){
      $this->telefonefun = $telefonefun;
      }

      public function getTelefoneFun(){
         return $this->telefonefun;
      }

      public function setDataCri($datacri){
         $this->datacri = $datacri;
      }

      public function getDatCri(){
         return $this->datacri;
      }

      public function setDataFinal($datafinal){
         $this->datafinal = $datafinal;
      }

      public function getDataFinal(){
         return $this->datafinal;
      }

      public function setMarca($marca){
         $this->marca = $marca;
      }

      public function getMarca(){
         return $this->marca;
      }

      public function setModelo($modelo){
         $this->modelo = $modelo;
      }

      public function getModelo(){
         return $this->modelo;
      }

      public function setDescricao_Os($descricao_os){
         $this->descricao_os = $descricao_os;
      }

      public function getDescricao_Os(){
         return $this->descricao_os;
      }

      public function setValor_Os($valor_os){
         $this->valor_os = $valor_os;
      }

      public function getValor_Os(){
         return $this->valor_os;
      }

      public function setStatus($status){
         $this->status = $status;
      }

      public function getStatus(){
         return $this->status;
      }


  }


?>