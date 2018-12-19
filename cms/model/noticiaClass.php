<?php
/*
    Projeto: Universidade ACME cms
    Autor: Alcateck
    Data: 01/10/2018
    Objetivo: class de noticia

    Editado por:
    Data  da alteração:
    Conteudo alterado:
*/

class Noticia{

	private $idNoticia;
	private $titulo;
	private $desc;
	private $foto;
	private $inicio;
	private $termino;

	public function __construct(){
		require_once('dao/noticiaDAO.php');
	}

	public function getIdNoticia(){
		return $this->idNoticia;
	}

	public function setIdNoticia($idNoticia){
		$this->idNoticia = $idNoticia;
	}

	public function getTitulo(){
		return $this->titulo;
	}

	public function setTitulo($titulo){
		$this->titulo = $titulo;
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
