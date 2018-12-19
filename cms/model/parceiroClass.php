<?php
/*
    Projeto: Universidade ACME cms
    Autor: Alcateck
    Data: 17/10/2018
    Objetivo: class de parceiro

    Editado por:  
    Data  da alteração 
    Conteudo alterado:

*/

class parceiro{
	
	private $idParceiro;
	private $nome;
	private $desc;
	private $img;
	
	public function __construct(){
		require_once('dao/parceiroDAO.php');
	}
	
	public function getIdParceiro(){
	return $this->idParceiro;
	}

	public function setIdParceiro($idParceiro){
		$this->idParceiro = $idParceiro;
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

	public function getImg(){
		return $this->img;
	}

	public function setImg($img){
		$this->img = $img;
	}
	
}

?>