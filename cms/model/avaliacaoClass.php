<?php

class Avaliacao {

    private $idAvaliacao;
    private $nome;
    private $email;
    private $comentario;
    private $avaliacao;
    private $data;
	private $status;

    function __construct(){
        require_once("dao/avaliacaoDAO.php");
    }

    public function getIdAvaliacao(){
		return $this->idAvaliacao;
	}

	public function setIdAvaliacao($idAvaliacao){
		$this->idAvaliacao = $idAvaliacao;
	}

    public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

    public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

    public function getComentario(){
		return $this->comentario;
	}

	public function setComentario($comentario){
		$this->comentario = $comentario;
	}

    public function getAvaliacao(){
		return $this->avaliacao;
	}

	public function setAvaliacao($avaliacao){
		$this->avaliacao = $avaliacao;
	}

    public function getData(){
		return $this->data;
	}

	public function setData($data){
		$this->data = $data;
	}
	
	public function getStatus(){
		return $this->status;
	}

	public function setStatus($status){
		$this->status = $status;
	}

}

?>
