<?php
class Comentario {
	
    private $idComentario;
    private $matriculaAluno;
    private $comentario;
    private $idPost;
	private $postador;
	private $nome;
	private $foto;

    public function __construct() {
		
        require_once('dao/comentarioDAO.php');
    }

    public function getIdComentario(){
		return $this->idComentario;
	}

	public function setIdComentario($idComentario){
		$this->idComentario = $idComentario;
	}

	public function getMatriculaAluno(){
		return $this->matriculaAluno;
	}

	public function setMatriculaAluno($matriculaAluno){
		$this->matriculaAluno = $matriculaAluno;
	}

	public function getComentario(){
		return $this->comentario;
	}

	public function setComentario($comentario){
		$this->comentario = $comentario;
	}

	public function getIdPost(){
		return $this->idPost;
	}

	public function setIdPost($idPost){
		$this->idPost = $idPost;
	}
	
	public function getPostador(){
		return $this->postador;
	}

	public function setPostador($postador){
		$this->postador = $postador;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getFoto(){
		return $this->foto;
	}

	public function setFoto($foto){
		$this->foto = $foto;
	}

}
?>
