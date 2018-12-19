<?php

@session_start();
/*Classe de funções*/

class functions{
    
    public function uploadFotoAjax($form,$nomeFt,$local,$input = "txtFoto"){
        
		
		
        $nomeArquivo = $_FILES[$nomeFt]['name'];
        $tamanhoArquivo =  round($_FILES[$nomeFt]['size']/1024);
        // Usar basenemae quando não retornar apenas o nome (versão PHP)
        //$nomeArquivo = basename($_FILES['frmFoto']['name']);

        // strchr busca ultima aparição do caracter informado
        //Pega a extensão do arquivo
        $ext = strchr($nomeArquivo,'.');

        //Nome da pasta de arquivos criada
        $upload_dir = $_SESSION['require'].$local;

        //Guarda apenas o nome do arquivo sem sua extensão
        $nomeFoto = pathinfo($nomeArquivo, PATHINFO_FILENAME);

        //MD5 criptografa o nome do arquivo
		if($nomeFt == "flFotoSlide1"){
			$nome_arquivo = "bg 1".$ext;
			unlink($_SESSION['require'].$local."bg 1.jpg");
		}else if($nomeFt == "flFotoSlide2"){
			$nome_arquivo = "bg 2".$ext;
			unlink($_SESSION['require'].$local."bg 2.jpg");
		}else if($nomeFt == "flFotoSlide3"){
			$nome_arquivo = "bg 3".$ext;
			unlink($_SESSION['require'].$local."bg 3.jpg");
		}else if($nomeFt == "flFotoSlide4"){
			$nome_arquivo = "bg 4".$ext;
			unlink($_SESSION['require'].$local."bg 4.jpg");
		}else{
			$nome_arquivo = md5(uniqid(time()).$nomeArquivo).$ext;
		} 

        //Extensões de arquivos permitidos
        $extensoes = array('.jpg','.png','.gif','.svg','.jpeg');

        if(in_array($ext,$extensoes)){
            if($tamanhoArquivo <= 5120){

                $arquivo_tmp = $_FILES[$nomeFt]['tmp_name'];

                
                if(move_uploaded_file($arquivo_tmp,$upload_dir.$nome_arquivo)){

                        echo("<img src='".$_SESSION['requireUrl'].$local.$nome_arquivo."' height='95px' aling='center'>");
					    echo("<script> ".$form.".".$input.".value='".$local.$nome_arquivo."' </script>");
                        //Importante que o formulario tenha um campo input chamadao txtFoto para receber o caminho da foto
                }

            }else{
                echo('<script> alert("Erro: Tamanho do aquivo Excedido."); </script>');
            }
        }else{	
            echo('<script> alert("Erro: Formato do aquivo INVALIDO."); </script>');
        }
    }
    
     public function uploadArquivoAjax($form,$nomeArq,$local){ //efetua upload de pdf e docx
        
		
		
        $nomeArquivo = $_FILES[$nomeArq]['name'];
        $tamanhoArquivo =  round($_FILES[$nomeArq]['size']/1024);
        // Usar basenemae quando não retornar apenas o nome (versão PHP)
        //$nomeArquivo = basename($_FILES['frmFoto']['name']);

        // strchr busca ultima aparição do caracter informado
        //Pega a extensão do arquivo
        $ext = strchr($nomeArquivo,'.');

        //Nome da pasta de arquivos criada
        $upload_dir = $_SESSION['require'].$local;

        //Guarda apenas o nome do arquivo sem sua extensão
        $nomeArquivo = pathinfo($nomeArquivo, PATHINFO_FILENAME);

        //MD5 criptografa o nome do arquivo
        $nome_arquivo = md5(uniqid(time()).$nomeArquivo).$ext;

        //Extensões de arquivos permitidos
        $extensoes = array('.pdf','.doc','.docx');

        if(in_array($ext,$extensoes)){
            if($tamanhoArquivo <= 5120){

                $arquivo_tmp = $_FILES[$nomeArq]['tmp_name'];

                
                if(move_uploaded_file($arquivo_tmp,$upload_dir.$nome_arquivo)){

                        if($ext == $extensoes[0]){
                            echo("<img src='".$_SESSION['requireUrl']."cms/view/img/icons/pdf.png' height='100px' aling='center'>");
                        }else{
                            echo("<img src='".$_SESSION['requireUrl']."cms/view/img/icons/word.png' height='100px' aling='center'>");
                        }
					    echo("<script> ".$form.".txtArquivo.value='".$local.$nome_arquivo."' </script>");
                        //Importante que o formulario tenha um campo input chamadao txtFoto para receber o caminho da foto
                }

            }else{
                echo('<script> alert("Erro: Tamanho do aquivo Excedido."); </script>');
            }
        }else{	
            echo('<script> alert("Erro: Formato do aquivo INVALIDO."); </script>');
        }
    }
    
    public function pegarNavegador(){
    
    
        $useragent = $_SERVER['HTTP_USER_AGENT'];

        if (preg_match('|MSIE ([0-9].[0-9]{1,2})|',$useragent,$matched)) {
            $browser_version=$matched[1];
            $browser = 'IE';
        } elseif (preg_match( '|Opera/([0-9].[0-9]{1,2})|',$useragent,$matched)) {
            $browser_version=$matched[1];
            $browser = 'Opera';
        } elseif(preg_match('|Firefox/([0-9\.]+)|',$useragent,$matched)) {
            $browser_version=$matched[1];
            $browser = 'Firefox';
        } elseif(preg_match('|Chrome/([0-9\.]+)|',$useragent,$matched)) {
            $browser_version=$matched[1];
            $browser = 'Chrome';
        } elseif(preg_match('|Safari/([0-9\.]+)|',$useragent,$matched)) {
            $browser_version=$matched[1];
            $browser = 'Safari';
        } else {

        // Navegador não reconhecido
        $browser_version = 0;
        $browser= 'outro';
        }

        return $browser;
    
    }
    
    //Deleta arquivo
    public function deletarArquivo($aquivo){
        unlink($aquivo);
    }
    
    //Gravar permissão de nivel
    public function gravarPermissao($idPagina){
        
        session_start();
        require_once($_SESSION['require'].'model/DAO/nivelDAO.php');
		
        $nivelDAO = new NivelDAO();
        $nivelDAO->insertPermissao($idPagina);
        
	}

	public function atualizarPermissao($idPagina,$idNivel){

		}

	public function escreverPontuacao ($ref,$tamanhoArray){
		if($ref == $tamanhoArray -1){
			echo(' e ');
		}elseif($ref < $tamanhoArray){
			echo(', ');
		}else{
			echo('');
		}
	}
	public function VerificarPermissão($permissao,$idPagina, $idNivel){
        
        global $mysqli;
		
		$ref = null;
		if($permissao == 1){
			$sql = "select *from vw_nivel where idPagina = $idPagina and idNivel = $idNivel";
		}
		if($permissao == 2){
			$sql = "select *from vw_nivel where idPagina = $idPagina and idNivel = $idNivel and inserir = 1";
		}
		if($permissao == 3){
			$sql = "select *from vw_nivel where idPagina = $idPagina and idNivel = $idNivel and atualizar = 1";
		}
		if($permissao == 4){
			$sql = "select *from vw_nivel where idPagina = $idPagina and idNivel = $idNivel and deletar = 1";
		}
		
	 	$resultado = mysqli_query($mysqli,$sql);
		
		if(mysqli_num_rows($resultado) != null){
			$ref = 1;
		}else{
			$ref = 0;
		}
		
		return $ref;
	}
    
    public function enviarEmail($remetente,$destinatario,$assunto,$nome,$email,$mensagem){
        
        mail();
        
    }
    
}


/*Instanciamento via GET*/

//Instanciar uploadFotoAjax via GET
if(isset($_GET['uploadFotoAjax'])){
    
    // Verifica parametros 
    if(isset($_GET['form']) and isset($_GET['nomeFt']) and isset($_GET['local'])){
        
        //Resgata parametros 
        $form = $_GET['form'];
        $foto = $_GET['nomeFt'];
        $input;
        if(isset($_GET["input"])){
            
            $input = $_GET["input"];
        }
        $local = urldecode($_GET['local']);
        
        //echo("<script>alert('".$form."  ".$foto."  ".$local."')</script>");
        
        //Instancia Classe
        $function = new functions();
        $function->uploadFotoAjax($form,$foto,$local,isset($_GET["input"]) ? $input : "txtFoto");
        
    }else{ // Mostra erro caso não seja passado os parametros desejados 
        
        echo("<script>alert('Erro nos parametros GET.')</script>");
        
    }
    
}
//Instanciar uploadArquivoAjax via GET
if(isset($_GET['uploadArquivoAjax'])){
    
    // Verifica parametros 
    if(isset($_GET['form']) and isset($_GET['nomeArq']) and isset($_GET['local'])){
        
        //Resgata parametros 
        $form = $_GET['form'];
        $foto = $_GET['nomeArq'];
        $input;
        $local = urldecode($_GET['local']);
        
        //echo("<script>alert('".$form."  ".$foto."  ".$local."')</script>");
        
        //Instancia Classe
        $function = new functions();
        $function->uploadArquivoAjax($form,$foto,$local);
        
    }else{ // Mostra erro caso não seja passado os parametros desejados 
        
        echo("<script>alert('Erro nos parametros GET.')</script>");
        
    }
    
}

//Instanciar deletarArquivo via GET
if(isset($_GET['deletarArquivo'])){
    
    // Verifica parametros 
    if(isset($_GET['arquivo'])){
        
        //Resgata parametros 
        $arquivo = urldecode($_GET['arquivo']);
        $arquivo = str_replace("http://www.alcateck.tk/", "/var/www/html/", $arquivo);
        
        //Instancia Classe
        $function = new functions();
        $function->deletarArquivo($arquivo);
        
    }else{ // Mostra erro caso não seja passado os parametros desejados 
        
        echo("<script>alert('Erro nos parametros GET.')</script>");
        
    }
    
}

?>