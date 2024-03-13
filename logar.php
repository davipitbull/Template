<?php
include_once"./config/conexao.php";
include_once"./config/constantes.php";
include_once"./func/func.php";

$return = conectar();



$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


$email = $dados['email'];
$pass = $dados['password'];

$validar = ValidarSenha('nome, senha, email, idadm, foto, cadastro, alteracao, ativo', 'adm', 'senha', 'email', $pass, $email, 'ativo', '1');
if ($validar != 'Vazio') {
    foreach($validar as $validaritem)
    $_SESSION['idadm'] = $validaritem->idadm;
    $_SESSION['email'] = $validaritem->email;
    $_SESSION['nome'] = $validaritem->nome;
    echo json_encode(['success' => true, 'message' => "Logado com sucesso"]);
    header("location: adm.php");
} else {
    echo json_encode(['success' => false, 'message' => 'Usuário ou senha errado']);
} 