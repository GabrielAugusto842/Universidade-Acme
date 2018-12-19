<?php
class Aula {
    private $idAula;
    private $idTurma;
    private $idDisciplina;
    private $disciplina;
    private $data;
    private $matriculaAluno;
    private $presenca;
    private $matriculaProfessor;

    public function __construct() {
        require_once('dao/aulaDAO.php');
    }

    public function getIdAula(){
		return $this->idAula;
	}

	public function setIdAula($idAula){
		$this->idAula = $idAula;
	}

	public function getIdTurma(){
		return $this->idTurma;
	}

	public function setIdTurma($idTurma){
		$this->idTurma = $idTurma;
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

	public function getData(){
		return $this->data;
	}

	public function setData($data){
		$this->data = $data;
	}

    public function getMatriculaAluno(){
		return $this->matriculaAluno;
	}

	public function setMatriculaAluno($matriculaAluno){
		$this->matriculaAluno = $matriculaAluno;
	}

	public function getPresenca(){
		return $this->presenca;
	}

	public function setPresenca($presenca){
		$this->presenca = $presenca;
	}

    public function getMatriculaProfessor(){
		return $this->matriculaProfessor;
	}

	public function setMatriculaProfessor($matriculaProfessor){
		$this->matriculaProfessor = $matriculaProfessor;
	}

}
?>
