<?php
class TrabConosco {
	private $idTrabConosco;
	private $curriculo;
	private $nome;
	private $email;
	private $dtNasc;
	private $telefone;
	private $desc;
	
	public function __construct(){
		require_once('dao/trabConoscoDAO.php');
	}
	
	public function getIdTrabConosco(){
		return $this->idTrabConosco;
	}

	public function setIdTrabConosco($idTrabConosco){
		$this->idTrabConosco = $idTrabConosco;
	}

	public function getCurriculo(){
		return $this->curriculo;
	}

	public function setCurriculo($curriculo){
		$this->curriculo = $curriculo;
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

	public function getDtNasc(){
		return $this->dtNasc;
	}

	public function setDtNasc($dtNasc){
		$this->dtNasc = $dtNasc;
	}

	public function getTelefone(){
		return $this->telefone;
	}

	public function setTelefone($telefone){
		$this->telefone = $telefone;
	}

	public function getDesc(){
		return $this->desc;
	}

	public function setDesc($desc){
		$this->desc = $desc;
	}

}
?>