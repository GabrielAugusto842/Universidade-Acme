<?php
class RespostaAluno {
	private $idRespostaAluno;
	private $idPerguntaAluno;
	private $idPostador;
	private $matriculaAluno;
	private $resposta;
	private $aluno;
	private $foto;
	
	public function __construct(){
		require_once("dao/respostaAlunoDAO.php");
	}

	public function getIdRespostaAluno(){
		return $this->idRespostaAluno;
	}

	public function setIdRespostaAluno($idRespostaAluno){
		$this->idRespostaAluno = $idRespostaAluno;
	}

	public function getIdPerguntaAluno(){
		return $this->idPerguntaAluno;
	}

	public function setIdPerguntaAluno($idPerguntaAluno){
		$this->idPerguntaAluno = $idPerguntaAluno;
	}

	public function getIdPostador(){
		return $this->idPostador;
	}

	public function setIdPostador($idPostador){
		$this->idPostador = $idPostador;
	}

	public function getMatriculaAluno(){
		return $this->matriculaAluno;
	}

	public function setMatriculaAluno($matriculaAluno){
		$this->matriculaAluno = $matriculaAluno;
	}

	public function getResposta(){
		return $this->resposta;
	}

	public function setResposta($resposta){
		$this->resposta = $resposta;
	}

	public function getAluno(){
		return $this->aluno;
	}

	public function setAluno($aluno){
		$this->aluno = $aluno;
	}
	
	public function getFoto(){
		return $this->foto;
	}

	public function setFoto($foto){
		$this->foto = $foto;
	}

}
?>
