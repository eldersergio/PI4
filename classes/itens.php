<?php

require_once '../banco_de_dados/bancoitens.php';

  class Itens{
     
     private $iditens;
     private $nomeitens;
     private $valoritens;
     private $descricaoitens;
     private $qtd;

     public function setIdItens($iditens){
         $this->iditens = $iditens;
      }

      public function getIdItens(){
         return $this->iditens;
      }

   	public function setNomeItens($nomeitens){
   		$this->nomeitens = $nomeitens;
   	}

      public function getNomeItens(){
         return $this->nomeitens;
      }

   	public function setValorItens($valoritens){
   		$this->valoritens = $valoritens;
   	}

      public function getValorItens(){
         return $this->valoritens;
      }

    public function setDescricaoItens($descricaoitens){
         $this->descricaoitens = $descricaoitens;
      }

      public function getDescricaoItens(){
         return $this->descricaoitens;
      }

   public function setQtd($qtd){
         $this->qtd = $qtd;
      }

      public function getQtd(){
         return $this->qtd;
      }
}

?>