<?php
    include("conexao.php");
    
    $conexao = getDatabaseConnection();
if (isset($_GET["matricula"])) {
        $rendimento = [];
        $result = $conexao->query("select distinct(disciplina.nome) as materia, nota.nota from tbl_nota as nota inner join tbl_disciplina as disciplina on nota.idDisciplina = disciplina.idDisciplina
        inner join tbl_presenca as presenca on
        nota.matricula = presenca.matricula
        where presenca.matricula = ".$_GET["matricula"]);
        while ($data = $result->fetch_assoc()) {
            $rendimento[] = $data;
        }

        echo json_encode($rendimento); 
    } 


    $conexao->close();

?>