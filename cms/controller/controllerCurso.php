<?php
class controllerCurso{
    
    public function __construct(){
          @session_start();
        require_once($_SESSION['require']."cms/model/cursoClass.php");
        require_once($_SESSION['require']."cms/model/dao/cursoDAO.php");
    }
    
    public function inserirCurso(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $cursoClass = new Curso();
            $cursoClass->setIdCatCurso($_POST['txtCategoria']);
            $cursoClass->setIdFormacao($_POST['txtFormacao']);
            $cursoClass->setNome($_POST['txtNome']);
            $cursoClass->setCargaHoraria($_POST['txtCargaHoraria']);
            $cursoClass->setGrade($_POST['txtGrade']);
            $cursoClass->setObjetivo($_POST['txtObjetivo']);
            $cursoClass->setDescTecnico($_POST['txtDescTecnico']);
            $cursoClass->setFoto($_POST['txtFoto']);
            
            $cursoDAO = new CursoDAO();
            $cursoDAO::Insert($cursoClass);
        }
    }
    
    public function atualizarCurso($id){
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            $cursoClass = new Curso();
            
            $cursoClass->setIdCurso($id);
            $cursoClass->setIdCatCurso($_POST['txtCategoria']);
            $cursoClass->setIdFormacao($_POST['txtFormacao']);
            $cursoClass->setNome($_POST['txtNome']);
            $cursoClass->setCargaHoraria($_POST['txtCargaHoraria']);
            $cursoClass->setGrade($_POST['txtGrade']);
            $cursoClass->setObjetivo($_POST['txtObjetivo']);
            $cursoClass->setDescTecnico($_POST['txtDescTecnico']);
            $cursoClass->setFoto($_POST['txtFoto']);
            
            
            $cursoDAO = new CursoDAO();
            $cursoDAO::Update($cursoClass);
        }
    }
    
    public function excluirCurso($id){
        $cursoDAO = new CursoDAO();
        $cursoDAO::Delete($id);
    }
    
     public function buscarCurso($id){
        $cursoDAO = new CursoDAO();
        $list = $cursoDAO::SelectById($id);
        return $list;
    }
    
    public function listarCurso(){
        $cursoDAO = new CursoDAO();
        $listCurso = $cursoDAO::selectAll();
        
        return $listCurso;
    }
	
	public function listarPorFormacao($idFormacao){
		$cursoDAO = new CursoDAO();
		$listCurso = $cursoDAO::selectByFormacao($idFormacao);
		
		return $listCurso;
	}
    
    
}

?>