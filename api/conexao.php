<?php
    function getDatabaseConnection() {
        try {
            mysqli_report(MYSQLI_REPORT_STRICT);
            $conexao = new mysqli("52.67.130.114", "lobo", "lobo123", "db_uniacme");
            $conexao->autocommit(true);
            $conexao->set_charset("utf8");
            return $conexao;
        } catch (Exception $e) {
            die(json_encode(array("erro" => "Erro ao connectar com o banco.")));
        }
    }
?>