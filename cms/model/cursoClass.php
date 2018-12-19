<?php
class Curso{
    private $idCurso;
    private $idCatCurso;
    private $idFormacao;
    private $nome;
    private $cargaHoraria;
    private $grade;
    private $objetivo;
    private $descTecnico;
    private $foto;
    
    public function getIdCurso(){
		return $this->idCurso;
	}

	public function setIdCurso($idCurso){
		$this->idCurso = $idCurso;
	}

	public function getIdCatCurso(){
		return $this->idCatCurso;
	}

	public function setIdCatCurso($idCatCurso){
		$this->idCatCurso = $idCatCurso;
	}

	public function getIdFormacao(){
		return $this->idFormacao;
	}

	public function setIdFormacao($idFormacao){
		$this->idFormacao = $idFormacao;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getCargaHoraria(){
		return $this->cargaHoraria;
	}

	public function setCargaHoraria($cargaHoraria){
		$this->cargaHoraria = $cargaHoraria;
	}

	public function getGrade(){
		return $this->grade;
	}

	public function setGrade($grade){
		$this->grade = $grade;
	}

	public function getObjetivo(){
		return $this->objetivo;
	}

	public function setObjetivo($objetivo){
		$this->objetivo = $objetivo;
	}

	public function getDescTecnico(){
		return $this->descTecnico;
	}

	public function setDescTecnico($descTecnico){
		$this->descTecnico = $descTecnico;
	}

	public function getFoto(){
		return $this->foto;
	}

	public function setFoto($foto){
		$this->foto = $foto;
	}
    
}


?>