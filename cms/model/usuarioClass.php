<?php
class Usuario{

    private $idUsuario;
    private $nome;
    private $usuario;
    private $email;
    private $senha;
    private $foto;
    private $idNivel;
	private $ativo;
	
	public function __construct(){
		require_once('dao/usuarioDAO.php');
	}
    
	public function getIdUsuario(){
		return $this->idUsuario;
	}

	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getUsuario(){
		return $this->usuario;
	}

	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}
    
    public function getFoto(){
		return $this->foto;
	}

	public function setFoto($foto){
		$this->foto = $foto;
	}

	public function getIdNivel(){
		return $this->idNivel;
	}

	public function setIdNivel($idNivel){
		$this->idNivel = $idNivel;
	}
	
    public function getAtivo(){
		return $this->ativo;
	}

	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}
    
    
}



?>