<?php
class ProcessoSeletivo {
	private $idPSeletivo;
	private $arquivo;
	
	public function __construct(){
		require_once('dao/processoSeletivoDAO.php');
	}
	
	public function getIdPSeletivo(){
		return $this->idPSeletivo;
	}

	public function setIdPSeletivo($idPSeletivo){
		$this->idPSeletivo = $idPSeletivo;
	}

	public function getArquivo(){
		return $this->arquivo;
	}

	public function setArquivo($arquivo){
		$this->arquivo = $arquivo;
	}
	
}
?>