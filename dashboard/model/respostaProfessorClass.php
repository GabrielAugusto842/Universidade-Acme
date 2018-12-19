<?php
class RespostaProfessor {
	private $idRespostaProfessor;
	private $matriculaProfessor;
	private $resposta;
	
	public function __construct(){
		require_once("dao/respostaProfessorDAO.php");
	}

	public function getIdRespostaProfessor(){
		return $this->idRespostaProfessor;
	}

	public function setIdRespostaProfessor($idRespostaProfessor){
		$this->idRespostaProfessor = $idRespostaProfessor;
	}

	public function getMatriculaProfessor(){
		return $this->matriculaProfessor;
	}

	public function setMatriculaProfessor($matriculaProfessor){
		$this->matriculaProfessor = $matriculaProfessor;
	}

	public function getResposta(){
		return $this->resposta;
	}

	public function setResposta($resposta){
		$this->resposta = $resposta;
	}

}
?>
