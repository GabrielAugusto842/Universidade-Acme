<?php
class Conteudo {
    private $idConteudo;
    private $pagina;
    private $sessao;
    private $conteudo;
    private $foto;

	public function __construct(){
		require_once('dao/conteudoDAO.php');
	}

    public function getIdConteudo(){
		return $this->idConteudo;
	}

	public function setIdConteudo($idConteudo){
		$this->idConteudo = $idConteudo;
	}

	public function getPagina(){
		return $this->pagina;
	}

	public function setPagina($pagina){
		$this->pagina = $pagina;
	}

	public function getSessao(){
		return $this->sessao;
	}

	public function setSessao($sessao){
		$this->sessao = $sessao;
	}

	public function getConteudo(){
		return $this->conteudo;
	}

	public function setConteudo($conteudo){
		$this->conteudo = $conteudo;
	}

	public function getFoto(){
		return $this->foto;
	}

	public function setFoto($foto){
		$this->foto = $foto;
	}
    
}
?>
