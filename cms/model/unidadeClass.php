<?php
/*
    Projeto: Universidade ACME cms
    Autor: Alcateck
    Data: 01/10/2018
    Objetivo: class de unidade

    Editado por:
    Data  da alteração:
    Conteudo alterado:

*/

class Unidade{

  private $foto;
  private $idUnidade;
  private $nome;
  private $endereco;
  private $desc;

  public function __construct(){
    require_once('dao/noticiaDAO.php');
  }

  public function getIdUnidade(){
  return $this->idUnidade;
}

public function setIdUnidade($idUnidade){
  $this->idUnidade = $idUnidade;
}

  public function getFoto(){
    return $this->foto;
}

public function setFoto($foto){
  $this->foto = $foto ;
}

public function getNome(){
  return $this->nome;
}

public function setNome($nome){
  $this->nome = $nome;
}

public function getEndereco(){
  return $this->endereco;
}

public function setEndereco($endereco){
  $this->endereco = $endereco;
}

public function getDesc(){
  return $this->desc;
}

public function setDesc($desc){
  $this->desc = $desc;

}
}
?>
