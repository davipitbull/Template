<?php
include_once "./config/conexao.php";
include_once "./config/constantes.php";
include_once "./func/func.php";

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = $_POST["nome"]; // Substitua "nome" pelo nome do campo no formulário

    // Valide os dados conforme necessário

    try {
        // Conecta ao banco de dados usando PDO
        $conexao = conectar();

        // Prepara a consulta SQL para inserir um novo registro na tabela teste1
        $query = "INSERT INTO teste3 (nome, cadastro) VALUES (:nome, NOW())"; // Insere a data atual como cadastro
        $stmt = $conexao->prepare($query);

        // Substitui os parâmetros da consulta pelos valores dos dados do formulário
        $stmt->bindParam(":nome", $nome);

        // Executa a consulta
        $stmt->execute();

        // Redireciona de volta para a página principal ou para onde desejar após a inserção
        header("Location: adm.php?page=teste3");
        exit();
    } catch (PDOException $e) {
        // Em caso de erro, você pode tratar de acordo com suas necessidades
        echo "Erro ao inserir registro: " . $e->getMessage();
    }
} else {
    // Se o formulário não foi submetido, redireciona de volta para a página principal
    header("Location: adm.php");
    exit();
}
?>
