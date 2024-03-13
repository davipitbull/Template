<?php
include_once "./config/conexao.php";
include_once "./config/constantes.php";
include_once "./func/func.php";
$return = conectar();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Verifique qual botão foi clicado
    if (isset($_POST['editar'])) {
        // Lógica para editar (se necessário)
        // ...
    } elseif (isset($_POST['excluir'])) {
        // Lógica para excluir
        $exclusaoSucesso = deletarTabela('teste3', 'id', $id);

        // Redirecione de volta para a página principal após a exclusão
        header('Location: adm.php?page=teste3');
        exit();
    }
}
?>
