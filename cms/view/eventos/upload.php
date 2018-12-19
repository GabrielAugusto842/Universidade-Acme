<?php 

    $nomeArquivo = $_FILES['flFoto']['name'];
    $tamanhoArquivo =  round($_FILES['flFoto']['size']/1024);
    // Usar basenemae quando não retornar apenas o nome (versão PHP)
    //$nomeArquivo = basename($_FILES['frmFoto']['name']);

    // strchr busca ultima aparição do caracter informado
    //Pega a extensão do arquivo
    $ext = strchr($nomeArquivo,'.');

    //Nome da pasta de arquivos criada
    $upload_dir = "arquivos/";

    //Guarda apenas o nome do arquivo sem sua extensão
    $nomeFoto = pathinfo($nomeArquivo, PATHINFO_FILENAME);

    //MD5 criptografa o nome do arquivo
    $nome_arquivo = md5(uniqid(time()).$nomeArquivo).$ext;

    //Extensões de arquivos permitidos
    $extensoes = array('.jpg','.png','.gif','.svg','.jpeg');

    if(in_array($ext,$extensoes)){
        if($tamanhoArquivo <= 5120){

            $arquivo_tmp = $_FILES['flFoto']['tmp_name'];
            

            if(move_uploaded_file($arquivo_tmp,$upload_dir.$nome_arquivo)){
                
                    echo("<img src='".$upload_dir.$nome_arquivo."' width='95px' aling='center'>");
					echo("<script>formEvento.txtFoto.value='$upload_dir.$nome_arquivo';</script>");

            }
            
        }else{
            echo('<script> alert("Erro: Tamanho do aquivo Excedido."); </script>');
        }
    }else{	
        echo('<script> alert("Erro: Formato do aquivo INVALIDO."); </script>');
    }

?>