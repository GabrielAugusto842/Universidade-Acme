<?php
class Turma {
	private $idCurso;
	private $curso;
	private $idTurma;
	private $turma;
	
	public function __construct(){
		require_once("dao/turmaDAO.php");
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

	public function getIdTurma(){
		return $this->idTurma;
	}

	public function setIdTurma($idTurma){
		$this->idTurma = $idTurma;
	}

	public function getTurma(){
		return $this->turma;
	}

	public function setTurma($turma){
		$this->turma = $turma;
	}
	
}
?>