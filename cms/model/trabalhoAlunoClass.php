<?php

class trabalhoAluno{
	
	private $idTrabalho;
	private $titulo;
	private $matricula;
	private $idEntrega;
	private $diaEntrega;
		
	public function __construct(){
		require_once('dao/trabalhoAlunoDAO.php');
	}
	
	public function getIdTrabalho(){
		return $this->idTrabalho;
	}

	public function setIdTrabalho($idTrabalho){
		$this->idTrabalho = $idTrabalho;
	}

	public function getTitulo(){
		return $this->titulo;
	}

	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}

	public function getMatricula(){
		return $this->matricula;
	}

	public function setMatricula($matricula){
		$this->matricula = $matricula;
	}

	public function getIdEntrega(){
		return $this->idEntrega;
	}

	public function setIdEntrega($idEntrega){
		$this->idEntrega = $idEntrega;
	}

	public function getDiaEntrega(){
		return $this->diaEntrega;
	}

	public function setDiaEntrega($diaEntrega){
		$this->diaEntrega = $diaEntrega;
	}
}
?>