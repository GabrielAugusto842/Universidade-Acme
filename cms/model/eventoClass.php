<?php
/*
    Projeto: Universidade ACME cms
    Autor: Alcateck
    Data: 27/09/2018
    Objetivo: class de evento

    Editado por:
    Data  da alteração:
    Conteudo alterado:

*/

class Evento{

    private $idEvento;
    private $idUnidade;
    private $nome;
    private $desc;
   	private $foto;
    private $inicio;
    private $termino;

	public function __construct(){
		require_once('dao/eventoDAO.php');
	}

	public function getIdEvento(){
		return $this->idEvento;
	}

	public function setIdEvento($idEvento){
		$this->idEvento = $idEvento;
	}
    
    public function getIdUnidade(){
		return $this->idUnidade;
	}

	public function setIdUnidade($idUnidade){
		$this->idUnidade = $idUnidade;
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

	public function getFoto(){
		return $this->foto;
	}

	public function setFoto($foto){
		$this->foto = $foto;
	}

	public function getInicio(){
		return $this->inicio;
	}

	public function setInicio($inicio){
		$this->inicio = $inicio;
	}

	public function getTermino(){
		return $this->termino;
	}

	public function setTermino($termino){
		$this->termino = $termino;
	}
}
?>
