<?php
class Entrega {
    private $idEntrega;
	private $matriculaAluno;
    private $titulo;
    private $arquivo;
    private $idDisciplina;
	private $idProfessor;
	private $disciplina;
	private $professor;
    private $data;

    public function __construct() {
        require_once('dao/entregaDAO.php');
    }

    public function getIdEntrega(){
		return $this->idEntrega;
	}

	public function setIdEntrega($idEntrega){
		$this->idEntrega = $idEntrega;
	}
	
	public function getMatriculaAluno(){
		return $this->matriculaAluno;
	}

	public function setMatriculaAluno($matriculaAluno){
		$this->matriculaAluno = $matriculaAluno;
	}

	public function getTitulo(){
		return $this->titulo;
	}

	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}

	public function getArquivo(){
		return $this->arquivo;
	}

	public function setArquivo($arquivo){
		$this->arquivo = $arquivo;
	}

	public function getIdDisciplina(){
		return $this->idDisciplina;
	}

	public function setIdDisciplina($idDisciplina){
		$this->idDisciplina = $idDisciplina;
	}
	
	public function getIdProfessor(){
		return $this->idProfessor;
	}

	public function setIdProfessor($idProfessor){
		$this->idProfessor = $idProfessor;
	}

	public function getDisciplina(){
		return $this->disciplina;
	}

	public function setDisciplina($disciplina){
		$this->disciplina = $disciplina;
	}

	public function getProfessor(){
		return $this->professor;
	}

	public function setProfessor($professor){
		$this->professor = $professor;
	}

	public function getData(){
		return $this->data;
	}

	public function setData($data){
		$this->data = $data;
	}

}
?>
