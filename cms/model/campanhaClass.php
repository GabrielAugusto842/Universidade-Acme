<?php
/*
    Projeto: Universidade ACME cms
    Autor: Alcateck
    Data: 01/10/2018
    Objetivo: class de campanha

    Editado por:
    Data  da alteração:
    Conteudo alterado:
*/

class Campanha{

	private $idCampanha;
	private $foto;
	
	
	public function getIdCampanha(){
		return $this->idCampanha;
	}

	public function setIdCampanha($idCampanha){
		$this->idCampanha = $idCampanha;
	}

	public function getFoto(){
		return $this->foto;
	}

	public function setFoto($foto){
		$this->foto = $foto;
	}
	
}
?>