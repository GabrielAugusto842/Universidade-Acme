<?php
class Presenca {
    private $idPresenca;
    private $matriculaAluno;
    private $presenca;

    public function __construct(){
        require_once('dao/presencaDAO.php');
    }

    public function getIdPresenca(){
		return $this->idPresenca;
	}

	public function setIdPresenca($idPresenca){
		$this->idPresenca = $idPresenca;
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
}
?>
