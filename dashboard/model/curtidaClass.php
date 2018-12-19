<?php
class Curtida {
    private $idCurtida;
    private $matriculaAluno;
    private $idPost;
	private $qtd_curtida;

    public function __construct() {
        require_once('dao/curtidaDAO.php');
    }

    public function getIdCurtida(){
		return $this->idCurtida;
	}

	public function setIdCurtida($idCurtida){
		$this->idCurtida = $idCurtida;
	}

	public function getMatriculaAluno(){
		return $this->matriculaAluno;
	}

	public function setMatriculaAluno($matriculaAluno){
		$this->matriculaAluno = $matriculaAluno;
	}

	public function getIdPost(){
		return $this->idPost;
	}

	public function setIdPost($idPost){
		$this->idPost = $idPost;
	}
	
	public function getQtdCurtida(){
		return $this->qtdCurtida;
	}

	public function setQtdCurtida($qtdCurtida){
		$this->qtdCurtida = $qtdCurtida;
	}

}
?>
