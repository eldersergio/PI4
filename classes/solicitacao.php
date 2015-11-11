<?php

require_once '../banco_de_dados/bancosolicitacao.php';

    class Soli {

   	private $id;
   	private $nome;
   	private $telefone;
   	private $endereco;
   	private $email;
   	private $descri;

      public function setId($id){
         $this->id = $id;
      }

      public function getId(){
         return $this->id;
      }

   	public function setNome($nome){
   		$this->nome = $nome;
   	}

      public function getNome(){
         return $this->nome;
      }

   	public function setTelefone($telefone){
   		$this->telefone = $telefone;
   	}

      public function getTelefone(){
         return $this->telefone;
      }

   	public function setEndereco($endereco){
   		$this->endereco = $endereco;
   	}

      public function getEndereco(){
         return $this->endereco;
      }

   	public function setEmail($email){
   		$this->email = $email;
   	}

      public function getEmail(){
         return $this->email;
      }

   	public function setDescri($descri){
   		$this->descri = $descri;
   	}

      public function getDescri(){
         return $this->descri;
      }

   	public function insert(){
   		$sql = "INSERT INTO $this->table (nomesoli, telefonesoli, enderecosoli, emailsoli, descrisoli) VALUES (:nome, :telefone, :endereco, :email, :descri)";
   		$stmt = DB::prepare($sql);
   		$stmt->bindParam(':nome', $this->nome);
   		$stmt->bindParam(':telefone', $this->telefone);
   		$stmt->bindParam(':endereco', $this->endereco);
   		$stmt->bindParam(':email', $this->email);
   		$stmt->bindParam(':descri', $this->descri);
   		return $stmt->execute();
   	}

   	public function update($id){
   		$sql = "UPDATE $THIS->table SET nomesoli = :nome, telefonesoli = :telefonesoli, endereco = :enderecosoli, email = :emailsoli, descrisoli = :descri WHERE idsoli = :id";
   		$stmt = DB::prepare($sql);
   		$stmt->bindParam(':nome', $this->nome);
   		$stmt->bindParam(':telefone', $this->telefone);
   		$stmt->bindParam(':endereco', $this->endereco);
   		$stmt->bindParam(':email', $this->email);
   		$stmt->bindParam(':descri', $this->descri);
   		$stmt->bindParam(':id', $id);
   		return $stmt->execute();
   	}
   }
  ?>