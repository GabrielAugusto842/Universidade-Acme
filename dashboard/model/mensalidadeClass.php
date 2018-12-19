<?php
class Mensalidade {
	private $idMensalidade;
	private $matriculaAluno;
	private $aluno;
	private $cpf;
	private $valor;
	private $dtVencimento;
	private $idCurso;
	private $valorCurso;
	
	public function __construct() {
        require_once('dao/mensalidadeDAO.php');
    }
	
	public function getIdMensalidade(){
		return $this->idMensalidade;
	}

	public function setIdMensalidade($idMensalidade){
		$this->idMensalidade = $idMensalidade;
	}

	public function getMatriculaAluno(){
		return $this->matriculaAluno;
	}

	public function setMatriculaAluno($matriculaAluno){
		$this->matriculaAluno = $matriculaAluno;
	}

	public function getAluno(){
		return $this->aluno;
	}

	public function setAluno($aluno){
		$this->aluno = $aluno;
	}

	public function getCpf(){
		return $this->cpf;
	}

	public function setCpf($cpf){
		$this->cpf = $cpf;
	}

	public function getValor(){
		return $this->valor;
	}

	public function setValor($valor){
		$this->valor = $valor;
	}

	public function getDtVencimento(){
		return $this->dtVencimento;
	}

	public function setDtVencimento($dtVencimento){
		$this->dtVencimento = $dtVencimento;
	}

	public function getIdCurso(){
		return $this->idCurso;
	}

	public function setIdCurso($idCurso){
		$this->idCurso = $idCurso;
	}

	public function getValorCurso(){
		return $this->valorCurso;
	}

	public function setValorCurso($valorCurso){
		$this->valorCurso = $valorCurso;
	}
	
}
?>