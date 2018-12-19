<?php
class Trabalho {
    private $idTrabalho;
    private $arquivo;
    private $idEntrega;
    private $data;
    private $matriculaAluno;
	private $titulo;
	private $disciplina;
	private $matriculaProfessor;
	private $instrucoes;
	private $dataFinal;
	private $aluno;

    public function __construct() {
        require_once('dao/trabalhoDAO.php');
    }

    public function getIdTrabalho(){
		return $this->idTrabalho;
	}

	public function setIdTrabalho($idTrabalho){
		$this->idTrabalho = $idTrabalho;
	}

	public function getArquivo(){
		return $this->arquivo;
	}

	public function setArquivo($arquivo){
		$this->arquivo = $arquivo;
	}

	public function getIdEntrega(){
		return $this->idEntrega;
	}

	public function setIdEntrega($idEntrega){
		$this->idEntrega = $idEntrega;
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
	
	public function getTitulo(){
		return $this->titulo;
	}

	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}

	public function getDisciplina(){
		return $this->disciplina;
	}

	public function setDisciplina($disciplina){
		$this->disciplina = $disciplina;
	}

	public function getMatriculaProfessor(){
		return $this->matriculaProfessor;
	}

	public function setMatriculaProfessor($matriculaProfessor){
		$this->matriculaProfessor = $matriculaProfessor;
	}

	public function getInstrucoes(){
		return $this->instrucoes;
	}

	public function setInstrucoes($instrucoes){
		$this->instrucoes = $instrucoes;
	}

	public function getDataFinal(){
		return $this->dataFinal;
	}

	public function setDataFinal($dataFinal){
		$this->dataFinal = $dataFinal;
	}

	public function getAluno(){
		return $this->aluno;
	}

	public function setAluno($aluno){
		$this->aluno = $aluno;
	}

}
?>
