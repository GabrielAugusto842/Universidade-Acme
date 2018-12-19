<?php
class perguntaAluno {
	private $idPerguntaProfessor;
	private $texto;
	private $matriculaProfessor;
	private $idForum;

	public function __construct(){
		require_once("dao/perguntaProfessorDAO.php");
	}
	
	public function getIdPerguntaProfessor(){
		return $this->idPerguntaProfessor;
	}

	public function setIdPerguntaProfessor($idPerguntaProfessor){
		$this->idPerguntaProfessor = $idPerguntaProfessor;
	}

	public function getTexto(){
		return $this->texto;
	}

	public function setTexto($texto){
		$this->texto = $texto;
	}

	public function getMatriculaProfessor(){
		return $this->matriculaProfessor;
	}

	public function setMatriculaProfessor($matriculaProfessor){
		$this->matriculaProfessor = $matriculaProfessor;
	}

	public function getIdForum(){
		return $this->idForum;
	}

	public function setIdForum($idForum){
		$this->idForum = $idForum;
	}

}
?>
