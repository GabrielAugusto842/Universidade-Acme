<?php
class Nivel{
    
    private $idNivel;
    private $nome;
	private $idUsuario;
	private $pagina;
	
	public function __construct(){
		require_once('dao/nivelDAO.php');
	}

    public function getIdNivel(){
		return $this->idNivel;
	}

	public function setIdNivel($idNivel){
		$this->idNivel = $idNivel;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}
	
	public function getIdUsuario(){
		return $this->idUsuario;
	}

	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	public function getPagina(){
		return $this->pagina;
	}

	public function setPagina($pagina){
		$this->pagina = $pagina;
	}
	
}


?>