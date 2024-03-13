<?php
include_once "./config/conexao.php";
include_once "./config/constantes.php";
include_once "./func/func.php";

// Conecta ao banco de dados usando PDO
$conexao = conectar();

// Verifica se o ID foi enviado via POST
if (isset($_POST['id'])) {
    try {
        // Obtém os dados do formulário
        $id = $_POST['id'];
        $editNome = $_POST['editNome'];
        $editCadastro = $_POST['editCadastro'];
        $editAlteracao = $_POST['editAlteracao'];
        $editAtivo = $_POST['editAtivo'];

        // Prepara a consulta SQL para atualização
        $query = "UPDATE teste2 SET nome = ?, cadastro = ?, alteracao = ?, ativo = ? WHERE id = ?";
        $stmt = $conexao->prepare($query);
        $stmt->execute([$editNome, $editCadastro, $editAlteracao, $editAtivo, $id]);

        // Redireciona para a página anterior ou exibe uma mensagem de sucesso
        header("Location: adm.php?page=teste2");
        exit();
    } catch (PDOException $e) {
        // Em caso de erro, redireciona com uma mensagem de erro
        header("Location: adm.php?erro=2");
        exit();
    }
} else {
    // Se o ID não foi enviado, redireciona para a página anterior
    header("Location: adm.php");
    exit();
}
?>
