<?php
class Disciplina {
	private $idCurso;
	private $curso;
	private $idDisciplina;
	private $disciplina;
	
	public function __construct(){
		require_once("dao/disciplinaDAO.php");
	}
	
	public function getIdCurso(){
		return $this->idCurso;
	}

	public function setIdCurso($idCurso){
		$this->idCurso = $idCurso;
	}

	public function getCurso(){
		return $this->curso;
	}

	public function setCurso($curso){
		$this->curso = $curso;
	}

	public function getIdDisciplina(){
		return $this->idDisciplina;
	}

	public function setIdDisciplina($idDisciplina){
		$this->idDisciplina = $idDisciplina;
	}

	public function getDisciplina(){
		return $this->disciplina;
	}

	public function setDisciplina($disciplina){
		$this->disciplina = $disciplina;
	}
	
}
?>