<?php
class Post {
    private $idPost;
	private $nomeUsuario;
	private $FotoUsuario;
    private $matriculaAluno;
    private $idRede;
    private $texto;
    private $midia;

    public function __construct() {
        require_once('dao/postDAO.php');
    }

    public function getIdPost(){
		return $this->idPost;
	}

	public function setIdPost($idPost){
		$this->idPost = $idPost;
	}
	
	public function getNomeUsuario(){
		return $this->nomeUsuario;
	}

	public function setNomeUsuario($nomeUsuario){
		$this->nomeUsuario = $nomeUsuario;
	}
	
	public function getFotoUsuario(){
		return $this->FotoUsuario;
	}

	public function setFotoUsuario($FotoUsuario){
		$this->FotoUsuario = $FotoUsuario;
	}

	public function getMatriculaAluno(){
		return $this->matriculaAluno;
	}

	public function setMatriculaAluno($matriculaAluno){
		$this->matriculaAluno = $matriculaAluno;
	}

	public function getIdRede(){
		return $this->idRede;
	}

	public function setIdRede($idRede){
		$this->idRede = $idRede;
	}

    public function getTexto(){
		return $this->texto;
	}

	public function setTexto($texto){
		$this->texto = $texto;
	}

	public function getMidia(){
		return $this->midia;
	}

	public function setMidia($midia){
		$this->midia = $midia;
	}

}
?>
