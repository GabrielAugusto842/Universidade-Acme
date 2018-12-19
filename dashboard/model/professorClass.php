<?php

class professor{
	private $matriculaProfessor;
	private $nome;
	private $cpf;
	private $dtNasc;
	private $senha;
	private $foto;
	private $endereco;
	private $email;
	private $telefone;
	private $celular;
	private $sexo;
	private $primeiroAcesso;
	
	public function __construct(){
        require_once('dao/professorDAO.php');
    }
	
	public function getMatriculaProfessor(){
		return $this->matriculaProfessor;
	}

	public function setMatriculaProfessor($matriculaProfessor){
		$this->matriculaProfessor = $matriculaProfessor;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getCpf(){
		return $this->cpf;
	}

	public function setCpf($cpf){
		$this->cpf = $cpf;
	}
	
	public function getDtNasc(){
		return $this->dtNasc;
	}

	public function setDtNasc($dtNasc){
		$this->dtNasc = $dtNasc;
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

	public function getEndereco(){
		return $this->endereco;
	}

	public function setEndereco($endereco){
		$this->endereco = $endereco;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getTelefone(){
		return $this->telefone;
	}

	public function setTelefone($telefone){
		$this->telefone = $telefone;
	}

	public function getCelular(){
		return $this->celular;
	}

	public function setCelular($celular){
		$this->celular = $celular;
	}
	
	public function getSexo(){
		return $this->sexo;
	}

	public function setSexo($sexo){
		$this->sexo = $sexo;
	}

	public function getPrimeiroAcesso(){
		return $this->primeiroAcesso;
	}

	public function setPrimeiroAcesso($primeiroAcesso){
		$this->primeiroAcesso = $primeiroAcesso;
	}
	
}
?>