<?php

class Conexao {
    private $host = "localhost";
    private $dbName = "lista_de_tarefas";
    private $user = "root";
    private $pass = "";

    public function conectar() {
        try {
            $conexao = new PDO(
                "mysql:host=$this->host;dbname=$this->dbName",
                "$this->user",
                "$this->pass"
            );

            return $conexao;
        } catch (PDOExeption $e) {
            echo "<p>".$e->getMessage()."</p>";
        }
    }
}

?>