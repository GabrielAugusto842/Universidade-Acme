<?php
/*
    Projeto: Universidade ACME cms
    Autor: Alcateck
    Data: 09/10/2018
    Objetivo: class de formação

    Editado por:
    Data  da alteração:
    Conteudo alterado:

*/

class Formacao{
    
   private $idFormacao;
   private $nome;
   private $desc;

   public function __construct(){
     require_once('dao/formacaoDAO.php');
   }

   public function getIdFormacao(){
		return $this->idFormacao;
	}

	public function setIdFormacao($idFormacao){
		$this->idFormacao = $idFormacao;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getDesc(){
		return $this->desc;
	}

	public function setDesc($desc){
		$this->desc = $desc;
	}

}
?>
