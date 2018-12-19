<?php
class perguntaAluno {
	private $idPerguntaAluno;
	private $texto;
	private $matriculaAluno;
	private $nomeAluno;
	private $idForum;
	private $MatriculaDirecionado;
	private $foto;
	
	public function __construct(){
		require_once("dao/perguntaAlunoDAO.php");
	}

	public function getIdPerguntaAluno(){
		return $this->idPerguntaAluno;
	}

	public function setIdPerguntaAluno($idPerguntaAluno){
		$this->idPerguntaAluno = $idPerguntaAluno;
	}

	public function getTexto(){
		return $this->texto;
	}

	public function setTexto($texto){
		$this->texto = $texto;
	}

	public function getMatriculaAluno(){
		return $this->matriculaAluno;
	}

	public function setMatriculaAluno($matriculaAluno){
		$this->matriculaAluno = $matriculaAluno;
	}

	public function getNomeAluno(){
		return $this->nomeAluno;
	}

	public function setNomeAluno($nomeAluno){
		$this->nomeAluno = $nomeAluno;
	}

	public function getIdForum(){
		return $this->idForum;
	}

	public function setIdForum($idForum){
		$this->idForum = $idForum;
	}
	
	public function getMatriculaDirecionado(){
		return $this->MatriculaDirecionado;
	}

	public function setMatriculaDirecionado($MatriculaDirecionado){
		$this->MatriculaDirecionado = $MatriculaDirecionado;
	}
	
	public function getFoto(){
		return $this->foto;
	}

	public function setFoto($foto){
		$this->foto = $foto;
	}

}
?>
