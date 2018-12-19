<?php
class Nota {
    private $idNota;
    private $matriculaAluno;
    private $idDisciplina;
    private $disciplina;
    private $nota;
    private $idProfessor;
    private $professor;

    public function __construct(){
        require_once("dao/notaDAO.php");
    }

    public function getIdNota(){
		return $this->idNota;
	}

	public function setIdNota($idNota){
		$this->idNota = $idNota;
	}

	public function getMatriculaAluno(){
		return $this->matriculaAluno;
	}

	public function setMatriculaAluno($matriculaAluno){
		$this->matriculaAluno = $matriculaAluno;
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

	public function getNota(){
		return $this->nota;
	}

	public function setNota($nota){
		$this->nota = $nota;
	}

	public function getIdProfessor(){
		return $this->idProfessor;
	}

	public function setIdProfessor($idProfessor){
		$this->idProfessor = $idProfessor;
	}

    public function getProfessor(){
		return $this->professor;
	}

	public function setProfessor($professor){
		$this->professor = $professor;
	}

}
?>
